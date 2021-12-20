<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\State;

use Validator;
use Storage;

use App\Helpers\CustomHelper;

use Image;
use DB;

class StateController extends Controller{

    private $limit;
    private $ADMIN_ROUTE_NAME;

    public function __construct(){
        $this->limit = 100;
        $this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
    }

    public function index(Request $request){

        $data = [];
        $d_query = State::orderBy('name', 'asc');        

        if(!empty($name)){
            $d_query->where(function($query) use($name)
            {
                $query->where('name', 'like', '%'.$name.'%');
                //$query->orWhere('nicename', 'like', '%'.$name.'%');
            });
        }      
        
        $states = $d_query->paginate(10);
        $data['states'] = $states;        
        // $data['limit'] = $limit;
        return view('admin.states.index', $data);

    }


    public function save(Request $request, $id= '')
    {
       $data= [];
       $page_heading= 'Add State';
       if(!empty($id))
       {
        $page_heading= 'Edit State';
        $data['rec']= State::where(['id'=>$id])->first(); 

    } 
    $ext = '';
    $method= $request->method(); 
    if($method=='POST')
    { 
     $rules = [];

     $rules['name'] = 'required';
     $rules['country_id'] = 'required';

    $dd =  $this->validate($request, $rules);

   
     $req_data['name']=$request->name;
     $req_data['country_id']=$request->country_id;

     $req_data['status']=(!empty($request->status))?$request->status:0;

     if(!empty($id))
     {

         $req_data['updated_at']= date('Y-m-d H:i:s');
        
        $isSaved = State::where('id',$id)->update($req_data);
    }
    else 
    {
        $req_data['created_at']= date('Y-m-d H:i:s');
        $req_data['updated_at']= date('Y-m-d H:i:s');        

        $isSaved = State::create($req_data);
        $country_id = $isSaved->id;
    }
    if ($isSaved) 
    {
        return redirect(url($this->ADMIN_ROUTE_NAME.'/states'))->with('alert-success', 'The state has been saved successfully.');
    } 
    else 
    {
        return back()->with('alert-danger', 'The state cannot be saved, please try again or contact the administrator.');
    }

}

 $countries = Country::where('status', '1')->get();

 $data['countries'] = $countries;

$data['page_heading']= $page_heading;

return view('admin.states.form', $data);
}





    public function saveImages($files, $ext='jpg,jpeg,png,gif'){

        $filename = '';

            $path = 'states/';
            $thumb_path = 'states/thumb/';

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