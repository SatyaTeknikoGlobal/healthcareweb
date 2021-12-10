<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\State;
use App\Speciality;

use Validator;
use Storage;

use App\Helpers\CustomHelper;

use Image;
use DB;

class SpecialityController extends Controller{

    private $limit;
    private $ADMIN_ROUTE_NAME;

    public function __construct(){
        $this->limit = 100;
        $this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
    }

    public function index(Request $request){

        $data = [];

        $d_query = Speciality::orderBy('name', 'asc');        

       
        $specialities = $d_query->get();
        


        $data['specialities'] = $specialities;
        
    

        return view('admin.specialities.index', $data);

    }


    public function save(Request $request, $id= '')
    {
       $data= [];
       $page_heading= 'Add Speciality';
       if(!empty($id))
       {
        $page_heading= 'Edit Speciality';
        $data['rec']= Speciality::where(['id'=>$id])->first(); 

    } 
    $ext = '';
    $method= $request->method(); 
    if($method=='POST')
    { 
     $rules = [];

     $rules['name'] = 'required';

     $this->validate($request, $rules);

     $req_data['name']=$request->name;
     $req_data['description']=$request->description;

     $req_data['status']=(!empty($request->status))?$request->status:0;

     if(!empty($id))
     {

         $req_data['updated_at']= date('Y-m-d H:i:s');
         if($request->hasFile('image')) {
            $files = $request->file('image');
            $images_result = $this->saveImages($files, $ext);
            $req_data['image'] = $images_result;
        }

        $isSaved = Speciality::where('id',$id)->update($req_data);
    }
    else 
    {
        $req_data['created_at']= date('Y-m-d H:i:s');
        $req_data['updated_at']= date('Y-m-d H:i:s');


         if($request->hasFile('image')) {
            $files = $request->file('image');
            $images_result = $this->saveImages($files, $ext);
            $req_data['image'] = $images_result;

        }


        $isSaved = Speciality::create($req_data);
        //$country_id = $isSaved->id;
    }
    if ($isSaved) 
    {
        return redirect(url($this->ADMIN_ROUTE_NAME.'/speciality'))->with('alert-success', 'The Speciality has been saved successfully.');
    } 
    else 
    {
        return back()->with('alert-danger', 'The Speciality cannot be saved, please try again or contact the administrator.');
    }

}

$data['page_heading']= $page_heading;

return view('admin.specialities.form', $data);
}





    public function saveImages($files, $ext='jpg,jpeg,png,gif'){

        $filename = '';

            $path = 'speciality/';
            $thumb_path = 'speciality/thumb/';

            $IMG_WIDTH = 1600;
            $IMG_HEIGHT = 640;
            $THUMB_WIDTH = 400;
            $THUMB_HEIGHT = 400;

            $images_data = [];

            $upload_result = CustomHelper::UploadImage($files, $path, $ext, $IMG_WIDTH, $IMG_HEIGHT, $is_thumb=true, $thumb_path, $THUMB_WIDTH, $THUMB_HEIGHT);

                if($upload_result['success']){
                   
                    $filename = $upload_result['file_name'];
                }

           
        return $filename;

    }


/* end of controller */
}