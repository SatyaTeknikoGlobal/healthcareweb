<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\CustomHelper;
use App\Http\Controllers\Controller;
use App\Vendor;
use App\Users;
use App\User;
use App\Country;
use App\Admin;
use App\CouponCategory;
use App\Chatwithuser;
use App\Speciality;
use Auth;
use App\Hospital;
use App\ShortListHospital;
use DB;
use App\UserPrescription;
use App\Bookings;
use Validator;
use Storage;
use App\Cart;
use App\State;
use App\City;
use App\Coupon;
use App\Category;
use App\Post;
use App\AssignBookings;
use App\Order;
use App\UserOtp;
use Session;
use Hash;




class HomeController extends Controller
{

 public function __construct(){


 }



 public function index(Request $request){
  $data = [];


   // $ip = '8.8.8.8';
    //$ip = $request->ip();
   // $api_key = 'at_iiiIQAMuyz3EsrKHPK5FgwTb8jrNJ';

    //$url = "https://geo.ipify.org/api/v1?apiKey=$api_key&ipAddress=$ip";

    //prd(file_get_contents($url));


  $data['title'] = 'Home';
  
  return view('front.home.index',$data);

}

public function get_state(Request $request){
  $country_id = isset($request->country_id) ? $request->country_id :0;

  // prd($country_id);
  $html = '<option value="" selected disabled>Select State</option>';
  if($country_id !=0){
    $states = State::where('country_id',$country_id)->get();

    if(!empty($states)){
      foreach($states as $state){
        $html.='<option value='.$state->id.'>'.$state->name.'</option>';
      }
    }
  } 
  echo $html;
}

public function get_city(Request $request){
  $state_id = isset($request->state_id) ? $request->state_id :0;
  $html = '<option value="" selected disabled>Select City</option>';
  if($state_id !=0){
    $cities = DB::table('cities')->where('state_id',$state_id)->get();


    if(!empty($cities)){
      foreach($cities as $city){
        $html.='<option value='.$city->id.'>'.$city->name.'</option>';
      }
    }
  } 
  echo $html;
}


public function get_locality(Request $request)
{       

  $city_id = isset($request->city_id) ? $request->city_id :0;
  $html = '<option value="" selected disabled>Select Locality</option>';
  if( $city_id != 0)
  { 
    $localities = DB::table('locality')->where('city_id',$city_id)->get();


    if(!empty($localities))
    {
      foreach($localities as $locality)
      {
        $html.='<option value='.$locality->id.'>'.$locality->name.'</option>';
      }
    }
  }
  echo $html;
}




public function profile_update(Request $request){
  $method = $request->method();
  if(!empty(Auth::guard('appusers')->user())){
    $user_id = Auth::guard('appusers')->user()->id;

  }
  if($method == 'POST' || $method == 'post'){
    $rules = [];
    $rules['name'] = 'required';
    $rules['email'] = 'required';
    $rules['mobile'] = 'required';
    $rules['address'] = 'required';

    $this->validate($request,$rules);

    $dbArray = [];
    $dbArray['name'] = $request->name;
    $dbArray['address'] = $request->name;
    $success = Users::where('id',$user_id)->update($dbArray);
    if($success){
      return back()->with('alert-success', 'Profile Update Successfully');

    }else{
      return back()->with('alert-danger', 'something Went Wrong');

    }
  }
}



public function login(Request $request){
  if (auth()->guard('appusers')->user()) return redirect()->route('home.dashboard');
  $data = [];
  $method = $request->method();
  if($method =='post' || $method == 'POST'){
    $rules = [];
    $rules['email'] = 'required';
    $rules['password'] = 'required';
    $this->validate($request,$rules);
    if (auth()->guard('appusers')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
     return redirect()->route('home.dashboard')->with('alert-success', 'Login successfully');
   }
   else{
    return back()->with('alert-danger', 'Email or password wrong');
  }
}

$data['title'] = 'Login';

return view('front.login',$data);

}


public function new_booking(Request $request){
 $data = [];
 $data['title'] = 'New Booking';

 $method = $request->method();

 if($method == "post" ||  $method == "POST")
 {
    // prd($request->toArray());
   $rules =[];

   $rules['name'] = 'required';
   $rules['email'] = 'required';
   $rules['phone'] = 'required';
   $rules['alternate_phone'] = '';
   $rules['description'] = '';
   $rules['diseases'] = 'required';
   $rules['country_id'] = 'required'; 
   $rules['state_id'] = 'required';
   $rules['city_id'] = 'required';
   $rules['address'] = 'required';
   $rules['register_for'] = 'required';
   $rules['medical_record'] = '';


   $this->validate($request,$rules);

    // prd($dd);
   $createdCat = $this->savebookings($request);

   $url = 'https://healthcareweb.appmantra.live/front/booking_success'; 

   if ($createdCat) {

    $alert_msg = 'Booking created successfully.';
    
     echo $url;
  } else {
    return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
  }


}
$countries = Country::where('status','1')->get();

$diseases = DB::table('specialities')->where('status','1')->get();

$user = Auth::guard('appusers')->user();
$data['user'] = $user;
$data['diseases'] = $diseases;
$data['countries'] =  $countries; 

return view('front.new_booking',$data);
}

public function savebookings(Request $request)
{
  $data = $request->except(['back_url','_token','medical_record']);

  $data['user_id'] = $request->user_id;

  $documents = $request->medical_record;

  $slug = CustomHelper::GetSlug('bookings', 'id', '', $request->name.$request->phone);
  $unique_id = strtoupper($slug);


  $old_img = '';
  $user_bookings = new Bookings;
  $user_bookings->user_id = $request->user_id;
  $user_bookings->unique_id = $unique_id;
  $user_bookings->name = $request->name;
  $user_bookings->email = $request->email;
  $user_bookings->phone = $request->phone;
  $user_bookings->alternate_phone = $request->alternate_phone;
  $user_bookings->description = $request->description;
  $user_bookings->diseases = $request->diseases;
  $user_bookings->country_id = $request->country_id;
  $user_bookings->state_id = $request->state_id;
  $user_bookings->city_id = $request->city_id;
  $user_bookings->address = $request->address;
  $user_bookings->register_for = $request->register_for;  
  
  $saved = $user_bookings->save();
  $files = $request->file('medical_record');
  $path = 'userBooking/';
  $storage = Storage::disk('public');
  $dbArray = [];

  if ($files && count($files) > 0) {
    foreach($files as $file){
      $uploaded_data = CustomHelper::UploadFile($file, $path, $ext='');
      if($uploaded_data['success']){
        $image = $uploaded_data['file_name'];
        $dbArray['medical_documents'] = $image;
        $dbArray['user_id'] = $request->user_id;
        $dbArray['type'] = $uploaded_data['extension'];
        $success = DB::table('UsersDocuments')->insert($dbArray);
      }
    }
  }

  $lastinsert = DB::getPdo()->lastInsertId();

   $hospitals_list = Hospital::select('id')->where('priority' ,'<=', '10')->get();

   $assign_details = [];
   foreach($hospitals_list as $hoss)
   {
      $assign_details['hospital_id'] = $hoss->id;
      $assign_details['booking_id'] = $lastinsert; 
      $assigning = DB::table('assign_bookings')->insert($assign_details);
    }  

}

public function booking_success(Request $request)
{
  return view('front.booking_success');
}


public function dashboard(Request $request){
  $data = [];
  $data['title'] = 'Dashboardsd';

  $user = Auth::guard('appusers')->user();
  $total_bookings = Bookings::where('user_id',$user->id)->get();
   $latest_bookings = Bookings::where('user_id',$user->id)->whereDate('created_at', date('Y-m-d'))->get();
   $data['latest_bookings'] = $latest_bookings;
  $data['total_bookings'] = $total_bookings;
  $data['user'] = $user;
  return view('front.dashboard.index',$data);

}

public function get_today_bookings(Request $request)
{  
  $page = $request->page;
  $latest_bookings = Bookings::where('user_id',$request->user_id)->whereDate('created_at', date('Y-m-d'))->get();
  $html = '';

  if(!empty($latest_bookings)){

    //print_r($latest_bookings);
    foreach ($latest_bookings as $key) {

      $disease_name = Speciality::select('id','name')->where('id',$key->diseases)->first();
      $description = mb_strlen(strip_tags($key->description),'utf-8') > 50 ? mb_substr(strip_tags($key->description),0,50,'utf-8').'...' : strip_tags($key->description);
      $phone = isset($key->phone) ? $key->phone :'';
      $disease_name = isset($disease_name->name) ? $disease_name->name :'';
      
      $html.='<li class="cards_item  col-md-4 col-sm-6 col-xs-12">
      <div class="card">
      <div class="card_content">
      <h2 class="card_title desc">#'.$key->unique_id.$key->id.'
      </h2>
      <p class="card_text">Description :'.$description.'</p>
      <p class="card_text">Phone :  '.$phone.'</p>
      <p class="card_text">Disease :'.$disease_name.'</p>

      <a href="https://healthcareweb.appmantra.live/view_booking/'.$key->id.'" class="btn card_btn" style="color:#f97d09;font-size:14px;">View</a>

      
      </div>
      </div>
      </li>';
    }
  }

  echo $html;



}


public function register(Request $request){
  $data = [];
  $data['title'] = 'Register';
  $dbArray= [];
  $method = $request->method();
  if($method =='post' || $method == 'POST'){
    $rules = [];
    $rules['name'] = 'required';
    $rules['email'] = 'required';
    $rules['phone'] = 'required';
    $rules['password'] = 'required';

    $this->validate($request,$rules);

    $setting = DB::table('settings')->where('id',1)->first();

    $referalcode = isset($request->referalcode) ? $request->referalcode :'';
    $dbArray['refer_id'] = 0;
    if(!empty($referalcode)){
      $exist = User::where('refer_code',$referalcode)->first();
      if(!empty($exist)){
        if(!empty($setting)){
          $wallet = $setting->refer_earn_amount + $exist->wallet;
          User::where('refer_code',$referalcode)->update(array('wallet'=>$wallet));
        }


        $dbArray['refer_id'] = isset($exist->id) ? $exist->id :'';
      }else{
        return back()->with('alert-danger', 'Referal Code Not Exist');
      }
    }




    $dbArray['name'] = $request->name;
    $dbArray['email'] = $request->email;
    $dbArray['phone'] = $request->phone;
    $dbArray['password'] = bcrypt($request->phone);
    $referal_code = $this->generateRandomString(8);
    $exist_refer = User::where('refer_code',$referalcode)->first();
    if(empty($exist_refer)){
      $dbArray['refer_code'] = $referal_code;
    }else{
     $dbArray['refer_code'] = $this->generateRandomString(8);
   }

   $user_id = User::create($dbArray)->id;
   if(!empty($user_id)){
    Auth::guard('appusers')->loginUsingId($user_id);
    return redirect()->route('home.dashboard')->with('alert-success', 'Login successfully');
  }else{
    return back()->with('alert-danger', 'Email or password wrong');
  }
}
if(!empty(Auth::guard('appusers')->user())){
  return redirect()->route('home.dashboard');
}
else{
  return view('front.register',$data);
}
}



public function send_sms($mobile,$message){

  $sender = "CITRUS";
  $message = urlencode($message);
  $msg = "sender=".$sender."&route=4&country=91&message=".$message."&mobiles=".$mobile."&authkey=284738AIuEZXRVCDfj5d26feae";

  $ch = curl_init('http://api.msg91.com/api/sendhttp.php?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
                        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $res = curl_exec($ch);
  $result = curl_close($ch);
  return $res;

}








public function validate_form(Request $request)
{

  $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone' => 'required|unique:users,phone',
    'email' => 'required|email|unique:users,email',
    'password' => 'required',
    'confirm_password' => 'required_with:password|same:password'
  ]);

  if ($validator->passes()) {

    //prd($request->toArray());
    //$otp = rand(1111,9999);
    $otp = 1234;

    $mobile = $request->phone;
    $message = $otp." is your authentication Code to register.";
    $time = date("Y-m-d H:i:s",strtotime('15 minutes'));
    UserOtp::updateOrcreate([
     'mobile'=>$mobile],[
      'otp'=>$otp,
      'timestamp'=>$time,
    ]);
    //$this->send_sms($mobile,$message);

    return response()->json(['success'=>'Added new records.']);
  }

  return response()->json(['error'=>$validator->errors()->all()]);
}




public function validate_otp(Request $request){
  $validator = Validator::make($request->all(), [
    'otp' => 'required',
    'phone' => 'required',
  ]);

  if ($validator->passes()) {
   $mobile = $request->phone;
   $otp = $request->otp;
   $verify_otp  = UserOtp::where(['mobile'=>$mobile,'otp'=>$otp])->first();
   if(!empty($verify_otp)){
    return response()->json(['success'=>true]);

  }else{
    return response()->json(['error'=>["Invalid OTP"]]);

  }
}

return response()->json(['error'=>$validator->errors()->all()]);
}


public function logout(Request $request){


  $request->session()->invalidate();

  return redirect()->route('home');

}


public  function generateRandomString($length = 20) {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

/////// CHATS

public function chat_with_admin(Request $request){
  $data = [];
  $data['title'] = 'Chat WIth Admin';

  $userschat = Chatwithuser::select('sender_id','reciever_id')->get();

  $userIds = [];

  if(!empty($userschat))
  {
    foreach($userschat as $users)
    {

      if(!in_array($users->sender_id,$userIds))
      {
        if($users->sender_id != 0)
        {
          $userIds[] = $users->sender_id;
        }
      }

      if(!in_array($users->reciever_id, $userIds))
      {
        if($users->reciever_id != 0)
        {
          $userIds[] = $users->reciever_id;
        }
      }
      
    }
  }

  if(!empty($userIds))
  {
    $data['user_id'] = $userIds[0];
  }



  return view('front.chat_with_admin',$data);

}

public function get_user_name(Request $request){
  $user_id = isset($request->user_id) ? $request->user_id :'';

        // echo $user_id;
        // die;
  $user = User::where('id',$user_id)->first();

        //echo $user;

  echo $user->name.'('.$user->id.')';
}

public function send_message(Request $request){
  $user_id = isset($request->user_id) ? $request->user_id :'';
  $message = isset($request->message) ? $request->message :'';

  $dbArray = [];
  $dbArray['sender_id'] = 0;
  $dbArray['reciever_id'] = $user_id;
  $dbArray['sender_type'] = ' user';
  $dbArray['reciever_type'] = 'admin';
  $dbArray['message'] = $message;
  Chatwithuser::insert($dbArray);
  echo 1;

}


public function get_user_list(Request $request){
  $html = '';
  $search = isset($request->search) ? $request->search :'';
  $user_id = isset($request->user_id) ? $request->user_id :'';
  $chats = Chatwithuser::select('sender_id','reciever_id')->get();
  $userIds = [];
  if(!empty($chats)){
    foreach($chats as $chat){

      if(!in_array($chat->sender_id,$userIds)){
        if($chat->sender_id != 0){
          $userIds[] = $chat->sender_id;

        }
      }
      if(!in_array($chat->reciever_id,$userIds)){
        if($chat->reciever_id != 0){
          $userIds[] = $chat->reciever_id;
          
        }
      }

    }
  }

        // prd($userIds);
  if(!empty($userIds)){
    $users = User::select('id','name')->whereIn('id',$userIds);
    if(!empty($search)){
      $users->where('name', 'like', '%' . $search . '%');
    }
    $users = $users->get();
    if(!empty($users)){
      $i=1;
      foreach($users as $user){
        $active ='';
        if($user->id == $user_id){
          $active = 'active';
        }
        $html.='<li><a href="javascript:void(0)" onclick="get_user_chat('.$user->id.')" class='.$active.'><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>'.$user->name.'</span></a></li>';
        $i++;
      }
    }
  }else{
    $html.='No User Found';
  }

  echo $html;

}

public function get_user_chat(Request $request){
  $page = isset($request->page) ? $request->page :1;

  $user_id = isset($request->user_id) ? $request->user_id :'';
  $html = '';
  $perpage = 10;
  $count = $perpage * $page;
  $chats = Chatwithuser::where('sender_id','=',$user_id)->orWhere('reciever_id','=',$user_id)->skip(0)->take($count)->get();
    //prd($chats);
  if(!empty($chats)){
    foreach($chats as $chat){
      if($chat->sender_id !=0){
        $user = User::where('id',$chat->sender_id);
        $user = $user->first();
      }
      if($chat->reciever_id !=0){
        $user = User::where('id',$chat->reciever_id);
        $user = $user->first();
      }

      $created_at = date('h:i A',strtotime($chat->created_at));
            //prd($hospital);
      if($chat->sender_type == 'user' || $chat->reciever_type == 'admin'){
                /////////Left Side
                //echo "string";
        $html.=' <li><div class="chat-img"><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user"></div><div class="chat-content"><h5>'.$user->name.'</h5>
        <div class="box bg-light-info">'.$chat->message.'</div>
        <div class="chat-time">'.$created_at.'</div>
        </div>
        </li>';

      }

      if($chat->sender_type == 'user' || $chat->reciever_type == 'admin'){
                /////////Right Side
        $html.='<li class="reverse">
        <div class="chat-content">
        <h5>Admin</h5>
        <div class="box bg-light-inverse">'.$chat->message.'</div>
        <div class="chat-time">'.$created_at.'</div>
        </div>
        <div class="chat-img"><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user"></div>
        </li>';
      }


    }

  }

  echo $html;
}

///// BOOKING HISTORY

public function booking_history(Request $request){


  $data = [];
  $data['title'] = 'Booking History';
  $id = Auth::guard('appusers')->user()->id;
  $bookings = Bookings::select('id')->where('user_id',$id)->count();
  $data['count'] = $bookings;
  
  return view('front.booking_history',$data);
}


public function get_bookings(Request $request)
{

  $id = Auth::guard('appusers')->user()->id;
  // $BackUrl = $routeName.'/booking_history';
  $baseurl = url('/');

  $page = $request->page;
  $bookings = Bookings::select('id','unique_id','description','phone','diseases')->where('user_id',$id)->latest()->paginate(9);
  $html = '';

  if(!empty($bookings)){

    //print_r($bookings);
    foreach ($bookings as $key) {



      $disease_name = Speciality::select('id','name')->where('id',$key->diseases)->first();
      $description = mb_strlen(strip_tags($key->description),'utf-8') > 50 ? mb_substr(strip_tags($key->description),0,50,'utf-8').'...' : strip_tags($key->description);
      $phone = isset($key->phone) ? $key->phone :'';
      $disease_name = isset($disease_name->name) ? $disease_name->name :'';
      
      $html.='<li class="cards_item col-md-4 col-sm-6 col-xs-12">
      <div class="card">
      <div class="card_content">
      <h2 class="card_title desc">#'.$key->unique_id.$key->id.'
      </h2>
      <p class="card_text">Description :'.$description.'</p>
      <p class="card_text">Phone :  '.$phone.'</p>
      <p class="card_text">Disease :'.$disease_name.'</p>

      <a href="https://healthcareweb.appmantra.live/view_booking/'.$key->id.'" class="btn card_btn" style="color:#f97d09;font-size:14px;">View</a>

      
      </div>
      </div>
      </li>';
    }
  }

  echo $html;
  
}


public function view_booking(Request $request,$id)
{
   $data = [];

   $method = $request->method();
   if(!empty($id))
   {
     $details =  Bookings::where('id',$id)->first();
     $user = User::where('id', $details->user_id)->first();
     $disease = Speciality::select('id','name')->where('id', $details->diseases)->first();
     $country = Country::select('id','name')->where('id',$details->country_id)->first();
     $state = State::select('id','name')->where('id',$details->state_id)->first();
     $city = City::select('id','name')->where('id',$details->city_id)->first();
     $assign_hospitals = AssignBookings::select('id','booking_id','hospital_id','package_id','description')->where('booking_id',$details->id)->get();
   }  

   $data['assign_hospitals'] = $assign_hospitals;
   $data['disease'] = $disease;
   $data['country'] = $country;
   $data['state'] = $state;
   $data['city'] = $city;
   $data['details'] = $details;
   $data['user'] = $user;
  
  return view('front.booking_detail',$data);
}

public function create_shortlist_hos(Request $request)
{
   //prd($request->toArray());

  $user_id = isset($request->user_id) ? $request->user_id : '';
  $booking_id = isset($request->booking_id) ? $request->booking_id : '';
  $hospital_id = isset($request->hospital_id) ? $request->hospital_id : '';

  if(!empty($hospital_id))
  {   
      $details = [];
      $details['user_id'] = $request->user_id;
      $details['booking_id'] = $request->booking_id;
       $details['hospital_id'] = $hospital_id;      
     $saved =  DB::table('shortlist_hospital')->insert($details);
     if($saved)
     {
        return back()->with('alert-success','Hospital ShortListed Successfully');

     }else{

      return back()->with('alert-danger', 'Somthing Went Wrong');
     }
  }
//return true;


}

// public function hos_detail(Request $request)
// {
//   return view('home.hos_detail');

// }

///// PAYMENT HISTORY

public function payment_history(Request $request){
  $data = [];
  $data['title'] = 'Payment History';



  return view('front.payment_history',$data);
}

public function shortlisted_hospital(Request $request)
{
 $data = [];
 $data['title'] = 'My ShortListed Hospital';

 $user = Auth::guard('appusers')->user();
 $list = ShortListHospital::select('id')->orderBy('hospital_id','desc')->where(['user_id'=>$user->id,'shortlist_status'=>1])->paginate(10);

 $data['list'] = $list->total();
 return view('front.shortlisted_hospital',$data);
}


public function profile(Request $request){
  $data = [];
  $method = $request->method();

  $data['title'] = 'Profile';
  $user = Auth::guard('appusers')->user();

  if($method == 'post' || $method == 'POST')
  {

    $update_data = [];

    // $rules['email'] = $user->email;
    // $rules['phone'] = $user->phone;
    $rules['old_password'] = 'required|max:20';
    $rules['password'] = 'required|max:20';
    $rules['confirm_password'] = 'required|max:20|same:password';
    $this->validate($request,$rules);

    $alt_email = isset($request->alt_email) ? $request->alt_email :'';
    $alt_phone = isset($request->alt_phone) ? $request->alt_phone :'';
    $old_password = isset($request->old_password) ? $request->old_password :'';
    $password = isset($request->password) ? $request->password :'';
    $confirm_password = isset($request->confirm_password) ? $request->confirm_password :'';

    $user = User::where(['id'=>$user->id])->first();

    $path = 'user/';
    $storage = Storage::disk('public');

    $file = $request->file('image');

    if($file) {  
      $uploaded_data = CustomHelper::UploadFile($file, $path, $ext='');
      if($uploaded_data['success']){
        $image = $uploaded_data['file_name'];
        $update_data['image'] = $image; 
      }    
    }

    $update_data['alt_email']= $alt_email;
    $update_data['alt_phone']= $alt_phone;

    $existing_password = (isset($user->password))?$user->password:'';
    $hash_chack = Hash::check($old_password, $existing_password);
    if($hash_chack){      
      $update_data['password']=bcrypt(trim($password));

    }else{
      return back()->with('alert-danger', 'old Password Not Matched.');
    }  
  
    $is_updated = User::where('id', $user->id)->update($update_data);
    if($is_updated){
      return back()->with('alert-success', 'Profile Updated successfully.');
    }
    else{
     return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
   } 

 }

 $data['user'] = $user;
 return view('front.profile',$data);
}


public function profile_img(Request $request)
{
  $file = $request->profile_image;
  $user_id = $request->user_id;

  $update_profile = [];

  $path = 'user/';
  $storage = Storage::disk('public');

  if($file) {  
    $uploaded_data = CustomHelper::UploadFile($file, $path, $ext='');
    if($uploaded_data['success']){
      $image = $uploaded_data['file_name'];
      $update_profile['image'] = $image; 
    }    
  }

  $is_updated = User::where('id', $user_id)->update($update_profile);
  if($is_updated){
    return back()->with('alert-success', 'Profile Image Updated successfully.');
  }
  else{
   return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
 }
}


public function upload_prescriptions(Request $request)
{
  $user_id = isset($request->user_id) ? $request->user_id :'';  
  $success = $this->saveImages($request,$user_id);
}

public function saveImages($request, $user_id, $ext='jpg,jpeg,png,gif,pdf,xls,xlsx'){
  $files = $request->file('files');
  $is_inserted = '';
  if ($files) {   
    $path = 'prescription/';   
    $images_data = [];
    foreach($files as $file){
      $upload_result = CustomHelper::UploadFile($file, $path, $ext);
      if($upload_result['success']){
        $dbArray = [];
        $dbArray['user_id'] = $user_id;
        $dbArray['prescription_docs'] = $upload_result['file_name'];
        $dbArray['type'] = $upload_result['extension'];
        UserPrescription::insert($dbArray);
      }
    }
  }

  return 1;

}


public function prescription_list(Request $request)
{
  $data = [];

  $data['prescription_list'] = 'Prescription List';
  $user = Auth::guard('appusers')->user();
  $lists = UserPrescription::where('user_id',$user->id)->get();
 

  $data['list'] = $lists;
  return view('front.prescription_list',$data);

}

public function about(Request $request){
  $data = [];

  return view('front.home.about',$data);

}

public function terms(Request $request){
  $data = [];

  return view('front.home.terms',$data);

}


public function privacy(Request $request){
  $data = [];

  return view('front.home.privacy',$data);

}

public function news_letter(Request $request){
  $method = $request->method();
  if($method == 'post' || $method == 'POST'){
    $email = $request->email;
    DB::table('news_letter')->insert(array('email'=>$email));
    return back()->with('alert-success', 'Subscribed Successfully.');

  }
}

public function get_shortlist_hos(Request $request)
{
  //prd($request->toArray());
  $user = Auth::guard('appusers')->user();
  $page = isset($request->page) ? $request->page : 1;
  $html = '';
  $perpage = 3;
  $countpage = $perpage * $page;
  $shortlist = ShortListHospital::select('id','booking_id','hospital_id')->where(['user_id'=>$user->id,'shortlist_status'=>1])->paginate(9);

  //print_r($shortlist);

  if(!empty($shortlist))
  {
    foreach($shortlist as $hos_list)
    {
      $hospital = Hospital::where('id', $hos_list->hospital_id)->first();
      $state = State::where('id',$hospital->state_id)->first()->name ?? '';
      $city = City::where('id',$hospital->city_id)->first()->name ?? '';       
        $imgUrl = url('storage/app/public/hospital/'.$hospital->image);

        $html.='<li class="cards_item">
              <div class="card p-0">
                
                <div class="card_image">
                  <div class="edit"><a href="#">                    
                  </a></div>
                  <img src='.$imgUrl.'>                  
                </div>
                <div class="card_content">
                  <h2 class="card_title mb-3">'.$hospital->name.'</h2>
                  <p class="card_text mb-3"><i class="fa fa-map-marker"></i>'.$state.','.$city.'</p>                 
                </div>
              </div>
            </li>';       
      }
       echo $html;
  }
}






}
