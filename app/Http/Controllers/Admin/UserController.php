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
use App\Society;
use App\Blocks;
use App\Locality;
use App\State;

use App\City;
use App\Roles;
use App\SocietyDocument;
use Yajra\DataTables\DataTables;
use Storage;
use DB;
use Hash;



Class UserController extends Controller
{


	private $ADMIN_ROUTE_NAME;

	public function __construct(){

		$this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();

	}



	public function index(Request $request){
       if(!(CustomHelper::isAllowedSection('users' , Auth::guard('admin')->user()->role_id , $type='show'))){
           return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));

       }
       $data =[];
       return view('admin.users.index',$data);
   }

   public function get_users(Request $request){

      $role_id = Auth::guard('admin')->user()->role_id;

      $routeName = CustomHelper::getAdminRouteName();



      $datas = User::where('is_delete',0)->orderBy('id','desc');

      $datas = $datas->get();



      return Datatables::of($datas)


      ->editColumn('id', function(User $data) {

         return  $data->id;
     })
      ->editColumn('name', function(User $data) {
         return  $data->name;
     })
      ->editColumn('email', function(User $data) {
         return  $data->email;
     })

      ->editColumn('phone', function(User $data) {
         return  $data->phone;
     })
          ->editColumn('address', function(User $data) {
              return  $data->address;
          })
      ->editColumn('status', function(User $data) {
         $sta = '';
         $sta1 ='';
         if($data->status == 1){
            $sta1 = 'selected';
        }else{
            $sta = 'selected';
        }

        $html = "<select id='change_users_status$data->id' onchange='change_users_status($data->id)'>
        <option value='1' ".$sta1.">Active</option>
        <option value='0' ".$sta.">InActive</option>
        </select>";
        return  $html;
    })

      ->editColumn('created_at', function(User $data) {
         return  date('d M Y',strtotime($data->created_at));
     })

      ->addColumn('action', function(User $data) {
         $routeName = CustomHelper::getAdminRouteName();
         $BackUrl = $routeName.'/users';
         $html = '';
         if(CustomHelper::isAllowedSection('users' , Auth::guard('admin')->user()->role_id , $type='edit')){
            $html.='<a title="Edit" class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route($routeName.'.users.edit',$data->id.'?back_url='.$BackUrl) . '"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;';
        }   
        if(CustomHelper::isAllowedSection('users' , Auth::guard('admin')->user()->role_id , $type='delete')){
            $html.='<a title="Delete" class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route($routeName.'.users.delete',$data->id.'?back_url='.$BackUrl) . '"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;';
        }

        return $html;
    })

      ->rawColumns(['name', 'status','is_approve', 'action','role_id'])
      ->toJson();
  }




  public function add(Request $request){
    $data = [];
    $id = (isset($request->id))?$request->id:0;
    if(!(CustomHelper::isAllowedSection('users' , Auth::guard('admin')->user()->role_id , $type='add'))){
       return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));

   }





   $users = '';
   if(is_numeric($id) && $id > 0){

    if(!(CustomHelper::isAllowedSection('users' , Auth::guard('admin')->user()->role_id , $type='edit'))){
        return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admins.index'));
    }

       $users = User::find($id);
    if(empty($users)){
        return redirect($this->ADMIN_ROUTE_NAME.'/users');
    }
}

if($request->method() == 'POST' || $request->method() == 'post'){

    if(empty($back_url)){
        $back_url = $this->ADMIN_ROUTE_NAME.'/users';
    }

    $name = (isset($request->name))?$request->name:'';


    $rules = [];
    if(is_numeric($id) && $id > 0){
         $rules['name'] = 'required';
       $rules['address'] = 'required';
       $rules['phone'] = 'required';
       $rules['email'] = 'required';
       
    }else{
      $rules['name'] = 'required';
        $rules['address'] = 'required';
        $rules['phone'] = 'required|unique:admins,phone';
        $rules['email'] = 'required|unique:admins,email';

   }



   $this->validate($request, $rules);

   $createdCat = $this->save($request, $id);

   if ($createdCat) {
    $alert_msg = 'User has been added successfully.';
    if(is_numeric($id) && $id > 0){
        $alert_msg = 'User has been updated successfully.';
    }
    return redirect(url($back_url))->with('alert-success', $alert_msg);
} else {
    return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
}
}


$page_heading = 'Add User';

if(isset($users->name)){
    $admins_name = $users->name;
    $page_heading = 'Update User - '.$admins_name;
}  

$data['page_heading'] = $page_heading;
$data['id'] = $id;
$data['users'] = $users;
$data['states'] = State::get();
$cities = [];
$locality = [];
if(is_numeric($id) && $id > 0){
    $cities = City::where('state_id',$users->state_id)->get();
}
      if(is_numeric($id) && $id > 0){
          $locality = Locality::where('city_id',$users->city_id)->get();
      }
$data['roles'] = Roles::where('status',1)->get();
$data['cities']= $cities;
$data['locality']= $locality;


return view('admin.users.form', $data);

}






public function save(Request $request, $id=0){

    $data = $request->except(['_token', 'back_url', 'image','password']);

        //prd($request->toArray());

    if($id == 0){
        //$data['added_by'] = Auth::guard('admin')->user()->id;
    }

    if(!empty($request->password)){
        $data['password'] = bcrypt($request->password);
    }

    $oldImg = '';

    $users = new User;

    if(is_numeric($id) && $id > 0){
        $exist = User::find($id);

        if(isset($exist->id) && $exist->id == $id){
            $users = $exist;

            $oldImg = $exist->image;
        }
    }
        //prd($oldImg);

    foreach($data as $key=>$val){
        $users->$key = $val;
    }

    $isSaved = $users->save();

    if($isSaved){
        $this->saveImage($request, $users, $oldImg);
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

       // prd($request->toArray());

    $id = (isset($request->id))?$request->id:0;

    $is_delete = '';

    if(is_numeric($id) && $id > 0){
        $is_delete = User::where('id', $id)->update(['is_delete'=>1]);
    }

    if(!empty($is_delete)){
        return back()->with('alert-success', 'Users has been deleted successfully.');
    }
    else{
        return back()->with('alert-danger', 'something went wrong, please try again...');
    }
}



public function change_users_status(Request $request){
  $user_id = isset($request->user_id) ? $request->user_id :'';
  $status = isset($request->status) ? $request->status :'';

  $user = User::where('id',$user_id)->first();
  if(!empty($user)){

      User::where('id',$user_id)->update(['status'=>$status]);
   $response['success'] = true;
   $response['message'] = 'Status updated';


   return response()->json($response);
}else{
   $response['success'] = false;
   $response['message'] = 'Not  Found';
   return response()->json($response);  
}

}





}