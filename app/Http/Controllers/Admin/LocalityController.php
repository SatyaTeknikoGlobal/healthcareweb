<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\State;
use App\City;
use App\Locality;

use Validator;
use Storage;

use App\Helpers\CustomHelper;

use Image;
use DB;

class LocalityController extends Controller{


    private $limit;
    private $ADMIN_ROUTE_NAME;

    public function __construct(){
        $this->limit = 100;
        $this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
    }

    public function index(Request $request){
        $data = [];
        $d_query = Locality::orderBy('name', 'asc');
        $localities = $d_query->get();
        $data['localities'] = $localities;
        return view('admin.localities.index', $data);
    }


    public function save(Request $request, $id= ''){
       $data= [];
       $page_heading= 'Add Locality';
       $state= array(); 
       $country_id=99;  
       if(!empty($id))
       {
        $page_heading= 'Edit Locality';

        $locality= Locality::where(['id'=>$id])->first();
       

        $data['locality']=   $locality;

    } 
    $ext = '';
    $method= $request->method(); 
    if($method=='POST')
    { 
     $rules = [];
     $rules['name'] = 'required';
     $rules['state'] = 'required';
     $rules['city'] = 'required';
     $this->validate($request, $rules);

     $req_data['name']=$request->name;
     $req_data['state_id']=$request->state;
     $req_data['city_id']=$request->city;
     $req_data['status']=(!empty($request->status))?$request->status:0;

     if(!empty($id))
     {

         $isSaved = Locality::where('id',$id)->update($req_data);
    }
    else 
    {
        $isSaved = Locality::create($req_data);
   
    }
    if ($isSaved) 
    {
        return redirect(url($this->ADMIN_ROUTE_NAME.'/locality'))->with('alert-success', 'The Locality has been saved successfully.');
    } 
    else 
    {
        return back()->with('alert-danger', 'The Locality cannot be saved, please try again or contact the administrator.');
    }

}

$data['page_heading']= $page_heading;

$state= State::get();
$data['state']=   $state;
$data['cities'] = [];

 if(!empty($id))
     {

         $data['cities'] = City::where('state_id',$locality->state_id)->get();
    }


return view('admin.localities.form', $data);
}























/* end of controller */
}