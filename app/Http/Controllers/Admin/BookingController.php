<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Helpers\CustomHelper;
use Auth;
use Validator;
use App\User;
use App\Admin;
use App\Prescription;
use App\Bookings;
use App\State;
use App\City;
use App\HospitalUser;
use App\Speciality;
use App\Hospital;
use App\AssignBookings;
use Yajra\DataTables\DataTables;
use Storage;
use DB;
use Hash;



Class BookingController extends Controller
{


	private $ADMIN_ROUTE_NAME;

	public function __construct(){

		$this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();

	}



	public function index(Request $request){
     if(!(CustomHelper::isAllowedSection('bookings' , Auth::guard('admin')->user()->role_id , $type='show'))){
         return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));

     }


     $data =[];
     return view('admin.bookings.index',$data);
 }

 public function get_bookings(Request $request){

  $role_id = Auth::guard('admin')->user()->role_id;

  $routeName = CustomHelper::getAdminRouteName();



  $datas = Bookings::orderBy('id','desc');

  $datas = $datas->get();



  return Datatables::of($datas)


  ->editColumn('id', function(Bookings $data) {

   return  $data->unique_id;
})
  ->editColumn('name', function(Bookings $data) {

      $user = HospitalUser::where('id',$data->user_id)->first();
      return  $user->name ?? '';
  })
  ->editColumn('hospital_name', function(Bookings $data) {
      $hospital = Hospital::where('id',$data->hospital_id)->first();
      return  $hospital->name ?? '';
  })

  ->editColumn('phone', function(Bookings $data) {
      $user = HospitalUser::where('id',$data->user_id)->first();
      return  $user->phone ?? '';
  })

  ->editColumn('booking_date', function(Bookings $data) {
   return  $data->appointment_date;
})

  ->editColumn('payment_status', function(Bookings $data) {
      return  $data->payment_status;
  })

  ->editColumn('status', function(Bookings $data) {
      return  $data->status;
  })

  ->editColumn('created_at', function(Bookings $data) {
   return  date('d M Y',strtotime($data->created_at));
})

  ->addColumn('action', function(Bookings $data) {
   $routeName = CustomHelper::getAdminRouteName();

   $BackUrl = $routeName.'/bookings';
   $html = '';


   if(CustomHelper::isAllowedSection('bookings' , Auth::guard('admin')->user()->role_id , $type='edit')){
            //$html.='<a title="Edit" class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route($routeName.'.bookings.edit',$data->id.'?back_url='.$BackUrl) . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;';
   }   

        //if(CustomHelper::isAllowedSection('bookings' , Auth::guard('admin')->user()->role_id , $type='delete')){
   $html.='<a title="Edit" class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route($routeName.'.bookings.details',$data->id.'?back_url='.$BackUrl) . '"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;';
       // }  



   return $html;
})

  ->rawColumns(['name', 'status','is_approve', 'action','role_id'])
  ->toJson();
}




public function add(Request $request){
    $data = [];
    $id = (isset($request->id))?$request->id:0;
    if(!(CustomHelper::isAllowedSection('bookings' , Auth::guard('admin')->user()->role_id , $type='add'))){
     return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));

 }





 $bookings = '';
 if(is_numeric($id) && $id > 0){

    if(!(CustomHelper::isAllowedSection('bookings' , Auth::guard('admin')->user()->role_id , $type='edit'))){
        return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));
    }

    $bookings = Bookings::find($id);
    if(empty($bookings)){
        return redirect($this->ADMIN_ROUTE_NAME.'/bookings');
    }
}

if($request->method() == 'POST' || $request->method() == 'post'){

    if(empty($back_url)){
        $back_url = $this->ADMIN_ROUTE_NAME.'/bookings';
    }

    $name = (isset($request->name))?$request->name:'';


    $rules = [];

    $rules['user_id'] = 'required';
     //$rules['hospital_id'] = 'required';
     //$rules['appointment_date'] = 'required';
    $rules['diseases'] = 'required';


    $this->validate($request, $rules);

    $createdCat = $this->save($request, $id);

    if ($createdCat) {
        $alert_msg = 'Appointment has been added successfully.';
        if(is_numeric($id) && $id > 0){
            $alert_msg = 'Appointment has been updated successfully.';
        }
        return redirect(url($back_url))->with('alert-success', $alert_msg);
    } else {
        return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
    }
}


$page_heading = 'Add Appointment';

if(is_numeric($id) && $id > 0){
    $page_heading = 'Update Appointment'.$bookings->unique_id;
}  

$data['page_heading'] = $page_heading;
$data['id'] = $id;
$data['bookings'] = $bookings;

$data['users'] = User::select('id','name')->where('status',1)->where('is_delete',0)->get();
$data['specialities'] = Speciality::select('id','name')->where('status',1)->get();
$data['hospitals'] = Hospital::select('id','name')->where('status',1)->get();

return view('admin.bookings.form', $data);

}


public static function quickRandom($length = 6)
{
    $pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}



public function save(Request $request, $id=0){

    $data = $request->except(['_token', 'back_url', 'image','password']);

   // prd($request->toArray());

    if($id == 0){

        $hospital = Hospital::where('id',$request->hospital_id)->first();

        $booking_count = Bookings::count();
        if($booking_count == 0){
            $count = 1;
        }else{
            $count = $booking_count+1;
        }

        $data['unique_id'] = $this->quickRandom().date('Y').$count; 
    }

    if(!empty($request->password)){
        //$data['password'] = bcrypt($request->password);
    }

    $oldImg = '';

    $booking = new Bookings;

    if(is_numeric($id) && $id > 0){
        $exist = Bookings::find($id);

        if(isset($exist->id) && $exist->id == $id){
            $booking = $exist;

            $oldImg = $exist->image;
        }
    }
        //prd($oldImg);

    foreach($data as $key=>$val){
        $booking->$key = $val;
    }

    $isSaved = $booking->save();

    if($isSaved){
        $this->saveImage($request, $booking, $oldImg);
    }

    return $isSaved;
}


private function saveImage($request, $society, $oldImg=''){

    $file = $request->file('image');
    if ($file) {
        $path = 'society/';
        $thumb_path = 'society/thumb/';
        $storage = Storage::disk('public');
            //prd($storage);
        $IMG_WIDTH = 768;
        $IMG_HEIGHT = 768;
        $THUMB_WIDTH = 336;
        $THUMB_HEIGHT = 336;

        $uploaded_data = CustomHelper::UploadImage($file, $path, $ext='', $IMG_WIDTH, $IMG_HEIGHT, $is_thumb=true, $thumb_path, $THUMB_WIDTH, $THUMB_HEIGHT);

           // prd($uploaded_data);
        if($uploaded_data['success']){

            if(!empty($oldImg)){
                if($storage->exists($path.$oldImg)){
                    $storage->delete($path.$oldImg);
                }
                if($storage->exists($thumb_path.$oldImg)){
                    $storage->delete($thumb_path.$oldImg);
                }
            }
            $image = $uploaded_data['file_name'];
            $society->image = $image;
            $society->save();         
        }

        if(!empty($uploaded_data)){   
            return $uploaded_data;
        }  

    }

}




public function delete(Request $request){

        //prd($request->toArray());

    $id = (isset($request->id))?$request->id:0;

    $is_delete = '';

    if(is_numeric($id) && $id > 0){
        $is_delete = Society::where('id', $id)->update(['is_delete',1]);
    }

    if(!empty($is_delete)){
        return back()->with('alert-success', 'Society has been deleted successfully.');
    }
    else{
        return back()->with('alert-danger', 'something went wrong, please try again...');
    }
}



public function change_admins_status(Request $request){
  $admin_id = isset($request->admin_id) ? $request->admin_id :'';
  $status = isset($request->status) ? $request->status :'';

  $admins = Admin::where('id',$admin_id)->first();
  if(!empty($admins)){

     Admin::where('id',$admin_id)->update(['status'=>$status]);
     $response['success'] = true;
     $response['message'] = 'Status updated';


     return response()->json($response);
 }else{
     $response['success'] = false;
     $response['message'] = 'Not  Found';
     return response()->json($response);  
 }

}



public function change_admins_role(Request $request){
  $admin_id = isset($request->admin_id) ? $request->admin_id :'';
  $role_id = isset($request->role_id) ? $request->role_id :'';

  $admins = Admin::where('id',$admin_id)->first();
  if(!empty($admins)){

     Admin::where('id',$admin_id)->update(['role_id'=>$role_id]);
     $response['success'] = true;
     $response['message'] = 'Role updated';


     return response()->json($response);
 }else{
     $response['success'] = false;
     $response['message'] = 'Not  Found';
     return response()->json($response);  
 }

}





public function change_admins_approve(Request $request){
   $admin_id = isset($request->admin_id) ? $request->admin_id :'';
   $approve = isset($request->approve) ? $request->approve :'';

   $admins = Admin::where('id',$admin_id)->first();
   if(!empty($admins)){

     Admin::where('id',$admin_id)->update(['is_approve'=>$approve]);
     $message ='';
     if($approve == 1){
        $message = 'Approved';
    }else{
        $message = 'Not Approved';

    }

    $response['success'] = true;
    $response['message'] = $message;


    return response()->json($response);
}else{
 $response['success'] = false;
 $response['message'] = 'Not  Found';
 return response()->json($response);  
}

}

public function details(Request $request){
    $data = [];
    $id = isset($request->id) ? $request->id :'';

    $booking = Bookings::where('id',$id)->first();
    $hosIds = [];
    $assigned_hospital = AssignBookings::select('hospital_id','id')->where('booking_id',$id)->get();
    if(!empty($assigned_hospital)){
        foreach($assigned_hospital as $hos){
            $hosIds[] = $hos->hospital_id;
        }
    }

    $hospitals_list = Hospital::orderBy('id','desc')->whereRaw('FIND_IN_SET('.$booking->diseases.',hos_specialities)');
        if(!empty($hosIds)){
            $hospitals_list->whereNotIn('id',$hosIds);
        }
    $hospitals_list = $hospitals_list->get();
    $appointments = Bookings::where('user_id',$booking->user_id)->get();
    $user = User::where('id',$booking->user_id)->first();
    $hospital = Hospital::where('id',$booking->hospital_id)->first();
    $speciality = Speciality::where('id',$booking->diseases)->first();    
    // $data['assign_hospital'] = 
    $data['appointments'] = $appointments;
    $data['speciality'] = $speciality;
    $data['hospital'] = $hospital;
    $data['hospitals_list'] = $hospitals_list;
    $data['user'] = $user;
    $data['assigned_hospital'] = $assigned_hospital;
    $data['booking'] = $booking;
    $data['page_heading'] = 'Booking Details of - '. $booking->unique_id;
    return view('admin.bookings.details', $data);
}

public function prescription(Request $request)
{

   $id = isset($request->booking_id) ? $request->booking_id :0;
   $method = $request->method();
   $data = [];
   if($method == 'post' || $method == 'POST'){
    $id = isset($request->booking_id) ? $request->booking_id : 0;

    // prd($id);
    $rules = [];
    $rules['prescription'] = 'required';
    // $rules['hospital_id'] = 'required';

    $this->validate($request,$rules);

    if($request->hasFile('prescription')) {

        $image_result = $this->saveImageMultiple($request,$id);
        if($image_result){
            return back()->with('alert-success', 'Prescription uploaded successfully.');
        }
    }


}
}
private function saveImageMultiple($request,$id){

    $files = $request->file('prescription');  

     // prd($booking_id);
    $path = 'prescription/';
    $storage = Storage::disk('public');
            //prd($storage);
    $IMG_WIDTH = 768;
    $IMG_HEIGHT = 768;
    $THUMB_WIDTH = 336;
    $THUMB_HEIGHT = 336;
    $dbArray = [];

    if (!empty($files)) {

        foreach($files as $file){
            $uploaded_data = CustomHelper::UploadFile($file, $path, $ext='');
            if($uploaded_data['success']){
                $image = $uploaded_data['file_name'];

                $dbArray['prescription'] = $image;
                $dbArray['booking_id'] = $id;

                $success = Prescription::insert($dbArray);
            }
        }
        return true;
    }else{
        return false;
    }
}


public function assign_hospital(Request $request)
{  

 $method = $request->method();
 if($method == "POST" || $method == "post")
 {

       //prd($request->toArray());
     $rules = [];
     $rules['booking_id'] = 'required';
     $rules['hospital_id'] = 'required';
     $rules['status'] = 'required';


     $this->validate($request ,$rules);
     $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
     if(!empty($hospital_id)){
        foreach ($hospital_id as $key => $value) {
         $dbArray = [];
         $dbArray['booking_id'] = $request->booking_id;
         $dbArray['hospital_id'] = $value;
         AssignBookings::create($dbArray);
     }

 }      

 return back()->with('alerts-success', 'Hospital Assigned Successfulyy');   

}



}

public function transactions(Request $request)
{

}


}