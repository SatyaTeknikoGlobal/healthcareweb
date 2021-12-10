<?php

namespace App\Http\Controllers\Hospital;

use App\Hospital;
use App\Speciality;
use App\HospitalUser;
use App\Http\Controllers\Controller;
use App\Helpers\CustomHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




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


        $dbArray = [];
        $dbArray['name'] = $request->name;
         $dbArray['email'] = $request->email;
          //$dbArray['password'] = bcrypt($request->password);
        $dbArray['phone'] = $request->phone;
        $dbArray['state_id'] = $request->state_id;
        $dbArray['city_id'] = $request->city_id;
         $dbArray['location'] = $request->location;
        $dbArray['locality_id'] = $request->locality_id;   
        $dbArray['hos_specialities'] = implode(",",$request->hos_specialities);
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

    return view('hospital/register/index');
}














public function logout(Request $request){

   // prd($request->toArray());


    // auth()->user('admin')->logout();
    Auth::logout();

    $request->session()->invalidate();

    return redirect('hospital/login');
}

/*End of controller */
}