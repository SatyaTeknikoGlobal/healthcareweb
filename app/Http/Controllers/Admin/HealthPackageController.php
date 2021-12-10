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
use App\Blocks;
use App\Society;
use App\Flats;
use Yajra\DataTables\DataTables;
use Storage;
use DB;
use Hash;
use App\HealthPackages;
use App\Hospital;



Class HealthPackageController extends Controller
{


	private $ADMIN_ROUTE_NAME;

	public function __construct(){

		$this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();

	}



	public function index(Request $request){

     if(!(CustomHelper::isAllowedSection('packages' , Auth::guard('admin')->user()->role_id , $type='show'))){
         return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.blockes.index'));

     }
     $data = [];
    $packages = HealthPackages::where('is_delete',0)->get();
    $data['packages'] = $packages;
     return view('admin.packages.index',$data);
 }






public function add(Request $request){
    $data = [];
    $id = (isset($request->id))?$request->id:0;
    if(!(CustomHelper::isAllowedSection('packages' , Auth::guard('admin')->user()->role_id , $type='add'))){
     return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admin.index'));

 }
 $packages = '';
 if(is_numeric($id) && $id > 0){

    if(!(CustomHelper::isAllowedSection('packages' , Auth::guard('admin')->user()->role_id , $type='edit'))){
        return redirect()->to(route($this->ADMIN_ROUTE_NAME.'.admin.index'));
    }
     $packages = HealthPackages::find($id);
    if(empty($packages)){
        return redirect($this->ADMIN_ROUTE_NAME.'/packages');
    }
}

if($request->method() == 'POST' || $request->method() == 'post'){

    if(empty($back_url)){
        $back_url = $this->ADMIN_ROUTE_NAME.'/packages';
    }
    $rules = [];

    $rules['package_name'] = 'required';
    $rules['included_hos_ids'] = 'required';
    $rules['price'] = 'required';
    $rules['validity'] = 'required';
    $rules['status'] = 'required';


    $this->validate($request, $rules);

    $createdCat = $this->save($request, $id);

    if ($createdCat) {
        $alert_msg = 'Health Package has been added successfully.';
        if(is_numeric($id) && $id > 0){
            $alert_msg = 'Health Package has been updated successfully.';
        }
        return redirect(url($back_url))->with('alert-success', $alert_msg);
    } else {
        return back()->with('alert-danger', 'something went wrong, please try again or contact the administrator.');
    }
}


$page_heading = 'Add Health Package';

if(isset($flats->package_name)){
    $flats_flat_no = $flats->package_name;
    $page_heading = 'Update Health Package - '.$flats_flat_no;
}  

$data['page_heading'] = $page_heading;
$data['id'] = $id;
$data['packages'] = $packages;
$hospitals = Hospital::where('status',1)->get();
    $data['hospitals'] = $hospitals;
return view('admin.packages.form', $data);

}


public function get_blocks_from_society(Request $request){
    $society_id = isset($request->society_id) ? $request->society_id :0;
    $html = '<option value="" selected disabled>Select Block</option>';
    if($society_id != 0){
        $blocks = Blocks::where('society_id',$society_id)->where('status',1)->get();
        if(!empty($blocks)){
            foreach($blocks as $block){
                $html.='<option value='.$block->id.'>'.$block->name.'</option>';
            }
        }

    }
    echo $html;
}



public function save(Request $request, $id=0){

    $data = $request->except(['_token', 'back_url', 'image']);

        //prd($request->toArray());
    $data['included_hos_ids'] = implode(",",$request->included_hos_ids);

    if($id == 0){

        //$data['added_by'] = Auth::guard('admin')->user()->id;

    }



    $oldImg = '';

    $hos_pack = new HealthPackages;

    if(is_numeric($id) && $id > 0){
        $exist = HealthPackages::find($id);

        if(isset($exist->id) && $exist->id == $id){
            $hos_pack = $exist;

            $oldImg = $exist->image;
        }
    }
        //prd($oldImg);

    foreach($data as $key=>$val){
        $hos_pack->$key = $val;
    }

    $isSaved = $hos_pack->save();

    if($isSaved){
        $this->saveImage($request, $hos_pack, $oldImg);
    }

    return $isSaved;
}


private function saveImage($request, $blockes, $oldImg=''){

    $file = $request->file('image');
    if ($file) {
        $path = 'blockes/';
        $thumb_path = 'blockes/thumb/';
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
            $blockes->image = $image;
            $blockes->save();         
        }

        if(!empty($uploaded_data)){   
            return $uploaded_data;
        }  

    }

}

public function delete(Request $request){
    $id = (isset($request->id))?$request->id:0;

    $is_delete = '';

    if(is_numeric($id) && $id > 0){
        $is_delete = HealthPackages::where('id', $id)->update(['is_delete'=>1]);
    }

    if(!empty($is_delete)){
        return back()->with('alert-success', 'Health Packages has been deleted successfully.');
    }
    else{
        return back()->with('alert-danger', 'something went wrong, please try again...');
    }
}



public function change_package_status(Request $request){
  $pack_id = isset($request->pack_id) ? $request->pack_id :'';
  $status = isset($request->status) ? $request->status :'';

  $packages = HealthPackages::where('id',$pack_id)->first();
  if(!empty($packages)){

      HealthPackages::where('id',$pack_id)->update(['status'=>$status]);
     $response['success'] = true;
     $response['message'] = 'Status updated';


     return response()->json($response);
 }else{
     $response['success'] = false;
     $response['message'] = 'No Flat FOund';
     return response()->json($response);
 }


}


}