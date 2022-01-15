<?php
namespace App\Http\Controllers\Hospital;
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
use DB;
use App\Bookings;
use Validator;
use Storage;
use App\Cart;
use App\State;
use App\City;
use App\Coupon;
use App\Category;
use App\Post;
use App\Order;
use App\UserOtp;
use App\Hospital;
use Session;
use Hash;




class HomeController extends Controller
{

 public function __construct(){


 }

 public function index(Request $request){
  $data = [];
  
 return view('hospital.home.index',$data);

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






public function profile(Request $request){
  $data = [];
  $data['title'] = 'Profile';
  $hospital_id = Auth::guard('hospital')->user()->id;
  $data['hospital'] = Hospital::where('id',$hospital_id)->first();
  return view('hospital.home.profile',$data);

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













}
