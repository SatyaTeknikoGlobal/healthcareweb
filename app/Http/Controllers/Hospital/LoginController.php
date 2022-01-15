<?php

namespace App\Http\Controllers\Hospital;

use App\Hospital;
use App\Speciality;
use App\HospitalUser;

use App\Http\Controllers\Controller;
use App\Helpers\CustomHelper;
use Illuminate\Http\Request;
use App\HospitalDocuments;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Storage;



class LoginController extends Controller{
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function upload_image(Request $request){
       
        $email = isset($request->email) ? $request->email :'';
        $phone = isset($request->phone) ? $request->phone :'';
        $upload_type = isset($request->upload_type) ? $request->upload_type :'';
        $dbArray = [];
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $image = $this->saveImage($request);            

        }
        $dbArray['email'] = $request->email;
        $dbArray['phone'] = $request->phone;     

        $exists = Hospital::where('phone',$request->phone)->first();

        if(!empty($exists)){            
          Hospital::where('phone',$request->phone)->update($dbArray);
          $details = [];
          $details['hospital_id'] = $exists->id;    
          $details['type'] = $extension;
          $details['doc_name'] = $image;
           
          HospitalDocuments::insert($details);

      }else{
          
        Hospital::insert($dbArray);
        $id = DB::getPdo()->lastInsertId(); 

        $details_arr = [];

        $details_arr['hospital_id'] = $id;
        $details['type'] = $extension;
        $details_arr['doc_name'] = $image;             

        HospitalDocuments::insert($details_arr);   
    }
}


private function saveImage($request){
    $file = $request->file('file');
    if ($file) {
        $path = 'hospital_documents/';
        $storage = Storage::disk('public');
        $uploaded_data = CustomHelper::UploadFile($file, $path, $ext='');
        if($uploaded_data['success']){
            $image = $uploaded_data['file_name'];
            $type = $uploaded_data['extension'];

            return $image;
        }
    }
}


public function index(Request $request){

    if (auth()->user()){
     return redirect('hospital');
 }

 $method = $request->method();

 if($method == 'POST' || $method == 'post'){

        // prd($request->toArray());
    $rules = [];
    $rules['email'] = 'required';
    $rules['password'] = 'required';

    $this->validate($request, $rules);

    $credentials = $request->only('email', 'password');


    $users = HospitalUser::where('email',$request->email)->first();
    if(!empty($users)){
        if($users->status == 0){
            return back()->with('alert-danger', 'Your Account id Inactive, contact the administrator.');
        }if($users->status == 1){

            if(Auth::guard('hospital')->attempt(['email' => $request->email, 'password' => $request->password])){
                $request->session()->regenerate();
                return redirect('hospital');
            }else{
                return back()->with('alert-danger', 'Invalid Username and Password');
            }


        }
    }else{
        return back()->with('alert-danger', 'Your Account Doesnt Exist');
    }




}

return view('hospital/login/index');
}



public function register(Request $request)
{
 $data = [];


 $method = $request->method();

 if($method == 'POST' || $method == 'post'){

    $slug = CustomHelper::GetSlug('hospitals', 'id', '', $request->name.$request->location);



        // prd($request->toArray());
    $rules = [];

    $rules['name'] = 'required|unique:admins';
    $rules['email'] = 'required|unique:admins';

    $rules['phone'] = 'required|unique:admins';
    $rules['state_id'] = 'required';
    $rules['city_id'] = 'required';
    $rules['location'] = 'required';
    $rules['locality_id'] = 'required';
    $rules['hos_specialities'] = 'required';

    $rules['image'] = '';
    $this->validate($request, $rules);       

    if(!empty($request->hos_specialities)){
        $hos_specialities = implode(",",$request->hos_specialities);
    }

    $dbArray = [];
    $dbArray['name'] = $request->name;
    $dbArray['email'] = $request->email;
          //$dbArray['password'] = bcrypt($request->password);
    $dbArray['phone'] = $request->phone;
    $dbArray['state_id'] = $request->state_id;
    $dbArray['city_id'] = $request->city_id;
    $dbArray['location'] = $request->location;
    $dbArray['locality_id'] = $request->locality_id;   
    $dbArray['hos_specialities'] = $hos_specialities;
    $dbArray['image'] = $request->image;
    $dbArray['unique_id'] = strtoupper($slug);

    $dbArray['status'] = 0;
    $dbArray['is_approve'] = 0;

        // print_r($dbArray);
        // die;

    $success = Hospital::create($dbArray);
    if($success){
        return view('snippets.pendingforvarification',$dbArray);
    }
}

$speciality = Speciality::select('id','name')->where('status', 1)->get();

$departments = DB::table('departments')->where('status',1)->get();
$data['speciality'] = $speciality;
$data['departments'] = $departments;

return view('hospital/register/index',$data);
}


public function logout(Request $request){

   // prd($request->toArray());


    // auth()->user('admin')->logout();
    Auth::logout();

    $request->session()->invalidate();

    return redirect('hospital/login');
}

public function hospital_form_validate(Request $request)
{

      // prd($request->toArray());
    $data = [];



    if($request->form == 'form1'){
       $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'location' => 'required',
        'established_year' => 'required',
    ]); 
   }else if($request->form == 'form2')
   {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'location' => 'required',
        'established_year' => 'required',
        'hos_specialities' => 'required',
        'number_of_doctors' => 'required',
        'number_of_ambulance' => 'required',
        'number_of_nurses' => 'required',
        'number_of_beds' => 'required',
    ]);

}else if($request->form == 'form3')
{
 $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required|email',
    'location' => 'required',
    'established_year' => 'required',
    'hos_specialities' => 'required',
    'number_of_doctors' => 'required',
    'number_of_ambulance' => 'required',
    'number_of_nurses' => 'required',
    'number_of_beds' => 'required',
    'departments' => 'required',
]);

}else if($request->form == 'form4')
{
 $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required|email',
    'location' => 'required',
    'established_year' => 'required',
    'hos_specialities' => 'required',
    'number_of_doctors' => 'required',
    'number_of_ambulance' => 'required',
    'number_of_nurses' => 'required',
    'number_of_beds' => 'required',
    'departments' => 'required',
    'surgery_ratio' => 'required',
    'mortality_ratio' => 'required',
    'success_stories' => '',
    'description' => '',
    'patients_every_year' => 'required',
    'patients_till_now' => 'required',
]);

}else if($request->form == 'form5')
{
 $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required|email',
    'location' => 'required',
    'established_year' => 'required',
    'hos_specialities' => 'required',
    'number_of_doctors' => 'required',
    'number_of_ambulance' => 'required',
    'number_of_nurses' => 'required',
    'number_of_beds' => 'required',
    'departments' => 'required',
    'surgery_ratio' => 'required',
    'mortality_ratio' => 'required',
    'success_stories' => '',
    'description' => '',
    'patients_every_year' => 'required',
    'patients_till_now' => 'required',
    'image' => '',
    'videos' => '',


]);

}
else if($request->form == 'form6')
{
 $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required|email',
    'location' => 'required',
    'established_year' => 'required',
    'hos_specialities' => 'required',
    'number_of_doctors' => 'required',
    'number_of_ambulance' => 'required',
    'number_of_nurses' => 'required',
    'number_of_beds' => 'required',
    'departments' => 'required',
    'surgery_ratio' => 'required',
    'mortality_ratio' => 'required',
    'success_stories' => '',
    'description' => '',
    'patients_every_year' => 'required',
    'patients_till_now' => 'required',
    'image' => '',
    'videos' => '',
    'nabh_certificate' => '',
    'jci_certificate' => '',
    'pan_number' => '',
    'gst_number' => '',

]);

}

if ($validator->passes()) {

    if($request->form_type == 'save'){

        $exists= Hospital::where('phone',$request->phone)->orWhere('email',$request->email)->first();
        if(empty($exists))
        {
            $dbArray = [];
            $dbArray['name'] = $request->name;
            $dbArray['phone'] = $request->phone;
            $dbArray['email'] = $request->email;
            $dbArray['location'] = $request->location;
            $dbArray['established_year'] = $request->established_year;

            $dbArray['hos_specialities'] = $request->hos_specialities;
            $dbArray['number_of_doctors'] = $request->number_of_doctors;
            $dbArray['number_of_ambulance'] = $request->number_of_ambulance;
            $dbArray['number_of_nurses'] = $request->number_of_nurses;
            $dbArray['number_of_beds'] = $request->number_of_beds;

            $dbArray['departments'] = $request->departments;

            $dbArray['surgery_ratio'] = $request->surgery_ratio;
            $dbArray['mortality_ratio'] = $request->mortality_ratio;
            $dbArray['success_stories'] = $request->success_stories;
            $dbArray['description'] = $request->description;
            $dbArray['patients_every_year'] = $request->patients_every_year;
            $dbArray['patients_till_now'] = $request->patients_till_now;
            Hospital::insert($dbArray);

        }else{
         $departments = $request->departments;
         if(!empty($departments)){
            $departments = implode(",",$departments);
        }


        $dbArray = [];
        $dbArray['name'] = $request->name;
        $dbArray['phone'] = $request->phone;
        $dbArray['email'] = $request->email;
        $dbArray['location'] = $request->location;
        $dbArray['established_year'] = $request->established_year;

        $dbArray['hos_specialities'] = $request->hos_specialities;
        $dbArray['number_of_doctors'] = $request->number_of_doctors;
        $dbArray['number_of_ambulance'] = $request->number_of_ambulance;
        $dbArray['number_of_nurses'] = $request->number_of_nurses;
        $dbArray['number_of_beds'] = $request->number_of_beds;

        $dbArray['departments'] = $departments;

        $dbArray['surgery_ratio'] = $request->surgery_ratio;
        $dbArray['mortality_ratio'] = $request->mortality_ratio;
        $dbArray['success_stories'] = $request->success_stories;
        $dbArray['description'] = $request->description;
        $dbArray['patients_every_year'] = $request->patients_every_year;
        $dbArray['patients_till_now'] = $request->patients_till_now;

        $dbArray['image'] = $request->image;
        $dbArray['videos'] = $request->videos;
        Hospital::where('phone',$request->phone)->update($dbArray);       
    }

}

$exists= Hospital::where('phone',$request->phone)->orWhere('email',$request->email)->first();
 //print_r($data);
return response()->json(['success'=>'','exists' => $exists, 'refresh' => 1]);
}

return response()->json(['error'=>$validator->errors()->toArray()]);
}

public function reg_success(Request $request)
{
    return view('hospital.reg_success');
}










/*End of controller */
}