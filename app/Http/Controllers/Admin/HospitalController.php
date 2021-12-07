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
use App\Hospital;
use App\HospitalGallery;
use App\Admin;
use App\Society;
use App\Blocks;
use App\State;
use App\City;
use App\Roles;
use App\HospitalUser;
use App\HospitalRole;
use App\SocietyDocument;
use Yajra\DataTables\DataTables;
use Storage;
use DB;
use Hash;



Class HospitalController extends Controller
{


	private $ADMIN_ROUTE_NAME;

	public function __construct(){

		$this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
	}



	public function index(Request $request){
     if(!(CustomHelper::isAllowedSection('hospitals' , Auth::guard('admin')->user()->role_id , $type='show'))){
         return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admin.index'));
     }


     $data =[];
     return view('admin.hospitals.index',$data);
 }
 public function get_hospitals(Request $request){

  $role_id = Auth::guard('admin')->user()->role_id;

  $routeName = CustomHelper::getAdminRouteName();



  $datas = Hospital::where('is_delete',0)->orderBy('id','desc');

  $datas = $datas->get();



  return Datatables::of($datas)


  ->editColumn('id', function(Hospital $data) {

   return  $data->id;
})
  ->editColumn('name', function(Hospital $data) {
   return  $data->name;
})

  ->editColumn('address', function(Hospital $data) {
   return  $data->location;
})
  ->editColumn('is_approve', function(Hospital $data) {

      $sta = '';
      $sta1 ='';
      if($data->is_approve == 1){
          $sta1 = 'selected';
      }else{
          $sta = 'selected';
      }

      $html = "<select id='change_hospital_approve$data->id' onchange='change_hospital_approve($data->id)'>
      <option value='1' ".$sta1.">Approved</option>
      <option value='0' ".$sta.">Not Approved</option>
      </select>";
      return  $html;
  })


  ->editColumn('status', function(Hospital $data) {
   $sta = '';
   $sta1 ='';
   if($data->status == 1){
    $sta1 = 'selected';
}else{
    $sta = 'selected';
}

$html = "<select id='change_hospital_status$data->id' onchange='change_hospital_status($data->id)'>
<option value='1' ".$sta1.">Active</option>
<option value='0' ".$sta.">InActive</option>
</select>";





return  $html;
})

  ->editColumn('created_at', function(Hospital $data) {
   return  date('d M Y',strtotime($data->created_at));
})

  ->addColumn('action', function(Hospital $data) {
   $routeName = CustomHelper::getAdminRouteName();
   $BackUrl = $routeName.'/hospitals';
   $html = '';
   if(CustomHelper::isAllowedSection('hospitals' , Auth::guard('admin')->user()->role_id , $type='edit')){
    $html.='<a title="Edit" class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route($routeName.'.hospitals.edit',$data->id.'?back_url='.$BackUrl) . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;';
}   

if(CustomHelper::isAllowedSection('hospitals' , Auth::guard('admin')->user()->role_id , $type='Details')){
    $html.='<a title="Details" class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route($routeName.'.hospitals.details',$data->id.'?back_url='.$BackUrl) . '"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;';
}  



return $html;
})

  ->rawColumns(['name', 'status','is_approve', 'action','role_id'])
  ->toJson();
}


public function add(Request $request){
    $data = [];
    $id = (isset($request->id))?$request->id:0;
    if(!(CustomHelper::isAllowedSection('hospitals' , Auth::guard('admin')->user()->role_id , $type='add'))){
     return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));
 }
 $hospitals = '';
 if(is_numeric($id) && $id > 0){

    if(!(CustomHelper::isAllowedSection('hospitals' , Auth::guard('admin')->user()->role_id , $type='edit'))){
        return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));
    }

    $hospitals = Hospital::find($id);
    if(empty($hospitals)){
        return redirect($this->ADMIN_ROUTE_NAME.'/hospitals');
    }
}

if($request->method() == 'POST' || $request->method() == 'post'){

    if(empty($back_url)){
        $back_url = $this->ADMIN_ROUTE_NAME.'/hospitals';
    }
    $name = (isset($request->name))?$request->name:'';
    $rules = [];
    $rules['name'] = 'required';
    $rules['location'] = 'required';

    $this->validate($request, $rules);

    $createdCat = $this->save($request, $id);

    if ($createdCat) {
        $alert_msg = 'Hospital has been added successfully.';
        if(is_numeric($id) && $id > 0){
            $alert_msg = 'Hospital has been updated successfully.';
        }
        return redirect(url($back_url))->with('alert-success', $alert_msg);
    } else {
        return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
    }
}


$page_heading = 'Add Hospital';

if(isset($hospitals->name)){
    $hospitals_name = $hospitals->name;
    $page_heading = 'Update Hospital - '.$hospitals_name;
}  

$data['page_heading'] = $page_heading;
$data['id'] = $id;
$data['hospitals'] = $hospitals;
$data['states'] = State::get();
$cities = [];


$data['roles'] = Roles::where('status',1)->get();
$data['cities']= $cities;

return view('admin.hospitals.form', $data);

}






public function save(Request $request, $id=0){

    $data = $request->except(['_token', 'back_url', 'image','password']);

        //prd($request->toArray());

    if($id == 0){
        $data['added_by'] = Auth::guard('admin')->user()->id; 
    }

//    if(!empty($request->password)){
//        $data['password'] = bcrypt($request->password);
//    }

    $oldImg = '';

    $hospitals = new Hospital;

    if(is_numeric($id) && $id > 0){
        $exist = Hospital::find($id);

        if(isset($exist->id) && $exist->id == $id){
            $hospitals = $exist;

            $oldImg = $exist->image;
        }
    }
        //prd($oldImg);

    foreach($data as $key=>$val){
        $hospitals->$key = $val;
    }

    $isSaved = $hospitals->save();

    if($isSaved){
        $this->saveImage($request, $hospitals, $oldImg);
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
        $is_delete = Hospital::where('id', $id)->update(['is_delete'=>1]);
    }

    if(!empty($is_delete)){
        return back()->with('alert-success', 'Society has been deleted successfully.');
    }
    else{
        return back()->with('alert-danger', 'something went wrong, please try again...');
    }
}




public function delete_role(Request $request){

    $id = (isset($request->role_id))?$request->role_id:0;

    $is_delete = '';

    if(is_numeric($id) && $id > 0){
        $is_delete = HospitalRole::where('id', $id)->update(['is_delete'=>1]);
    }

    if(!empty($is_delete)){
        return back()->with('alert-success', 'Role has been deleted successfully.');
    }
    else{
        return back()->with('alert-danger', 'something went wrong, please try again...');
    }
}



public function delete_user(Request $request){

    $id = (isset($request->user_id))?$request->user_id:0;

    $is_delete = '';

    if(is_numeric($id) && $id > 0){
        $is_delete = HospitalUser::where('id', $id)->update(['is_delete'=>1]);
    }

    if(!empty($is_delete)){
        return back()->with('alert-success', 'User has been deleted successfully.');
    }
    else{
        return back()->with('alert-danger', 'something went wrong, please try again...');
    }
}

public function details(Request $request){
    $id = (isset($request->id))?$request->id:0;
    $data = [];








    $hospital = Hospital::where('id',$id)->first();
    $galleries = $hospital->getGalleryImage;
    $roles = $hospital->getRole;
    $users = $hospital->getUser;
    $data['hospital'] = $hospital;
    $data['roles'] = $roles;
    $data['users'] = $users;
    $data['galleries'] = $galleries;

    return view('admin.hospitals.details',$data);

}

public function delete_gallery(Request $request){
    $id = isset($request->id) ? $request->id :'';

    $gallery = HospitalGallery::where('id',$id)->first();
    if(!empty($gallery)){
        $storage = Storage::disk('public');
       $path = 'hospital_gallery/';
            $oldImg = $gallery->image;
            if(!empty($oldImg)){
                if($storage->exists($path.$oldImg)){
                    $storage->delete($path.$oldImg);
                }
            }

        $success = HospitalGallery::where('id',$id)->delete();
        if(!empty($success)){
            return back()->with('alert-success', 'Images Deleted successfully.');
        }
        else{
            return back()->with('alert-danger', 'something went wrong, please try again...');
        }

    }
}



public function add_user(Request $request){
    $method = $request->method();
    if($method == 'post' || $method == 'POST'){
        $rules = [];
        $rules['hospital_id'] = 'required';
        $rules['role_id'] = 'required';
        $rules['name'] = 'required';
        $rules['email'] = 'required';
        $rules['phone'] = 'required';
        $rules['status'] = 'required';
        $this->validate($request,$rules);
        $hospital_id = $request->hospital_id;
        $save = $this->saveHospitalUser($request);
        if(!empty($save)){
            return back()->with('alert-success', 'User Added successfully.');
        }
        else{
            return back()->with('alert-danger', 'something went wrong, please try again...');
        }
    }

}

public function saveHospitalUser($request){
    $dbArray = [];
    $dbArray['hospital_id'] = $request->hospital_id;
    $dbArray['name'] = $request->name;
    $dbArray['email'] = $request->email;
    $dbArray['phone'] = $request->phone;
    $dbArray['status'] = $request->status;
    $dbArray['role_id'] = $request->role_id;
    if(!empty($request->password)){
    $dbArray['password'] = bcrypt($request->password);

    }
    $save = HospitalUser::create($dbArray);
    return $save;



}


public function upload_gallery(Request $request){
    $method = $request->method();
    if($method == 'post' || $method == 'POST'){
        $rules = [];
        $rules['hospital_id'] = 'required';
        $rules['images'] = 'required';
        $this->validate($request,$rules);
        $hospital_id = $request->hospital_id;
        $save = $this->saveImageMultiple($request,$hospital_id);
        if(!empty($save)){
            return back()->with('alert-success', 'Images Uploaded successfully.');
        }
        else{
            return back()->with('alert-danger', 'something went wrong, please try again...');
        }
    }

}

private function saveImageMultiple($request,$hospital_id){

    $files = $request->file('images');
    $path = 'hospital_gallery/';
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
                $dbArray['image'] = $image;
                $dbArray['hospital_id'] = $hospital_id;
                $dbArray['status'] = 1;
                $success = HospitalGallery::create($dbArray);
            }
        }
        return true;
    }else{
        return false;
    }
}






public function change_hospital_status(Request $request){
  $hos_id = isset($request->hos_id) ? $request->hos_id :'';
  $status = isset($request->status) ? $request->status :'';

  $hospital = Hospital::where('id',$hos_id)->first();
  if(!empty($hospital)){

      Hospital::where('id',$hos_id)->update(['status'=>$status]);
      $response['success'] = true;
      $response['message'] = 'Status updated';
      return response()->json($response);
  }else{
     $response['success'] = false;
     $response['message'] = 'Not  Found';
     return response()->json($response);  
 }

}

public function update_role_status(Request $request){
  $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
  $role_id = isset($request->role_id) ? $request->role_id :'';
  $status = isset($request->status) ? $request->status :'';

  $hospital = HospitalRole::where('id',$role_id)->first();
  if(!empty($hospital)){

    HospitalRole::where('hospital_id',$hospital_id)->where('id',$role_id)->update(['status'=>$status]);
    $response['success'] = true;
    $response['message'] = 'Status updated';
    return response()->json($response);
}else{
 $response['success'] = false;
 $response['message'] = 'Not  Found';
 return response()->json($response);  
}   
}


public function update_user_status(Request $request){
  $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
  $user_id = isset($request->user_id) ? $request->user_id :'';
  $status = isset($request->status) ? $request->status :'';

  $user = HospitalUser::where('id',$user_id)->first();
  if(!empty($user)){

    HospitalUser::where('id',$user_id)->update(['status'=>$status]);
    $response['success'] = true;
    $response['message'] = 'Status updated';
    return response()->json($response);
}else{
 $response['success'] = false;
 $response['message'] = 'Not  Found';
 return response()->json($response);  
}   
}


public function add_role(Request $request){
    $method = $request->method();
    if($method == 'post' || $method == 'POST'){
        $rules = [];
        $rules['hospital_id'] ='required';
        $rules['role_name'] ='required';
        $rules['status'] ='required';

        $this->validate($request,$rules);
        $dbArray = [];
        $dbArray['hospital_id'] = $request->hospital_id;
        $dbArray['role_name'] = $request->role_name;
        $dbArray['status'] = $request->status;

        HospitalRole::create($dbArray);
        return back()->with('alert-success', 'Role Added Successfully');
    }
}







public function change_hospital_approve(Request $request){
   $hos_id = isset($request->hos_id) ? $request->hos_id :'';
   $approve = isset($request->approve) ? $request->approve :'';

   $hospital = Hospital::where('id',$hos_id)->first();
   if(!empty($hospital)){

       Hospital::where('id',$hos_id)->update(['is_approve'=>$approve]);
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




}