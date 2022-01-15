<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CustomHelper;
use Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HealthPackageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// Route::get('/', function () {
//     return view('welcome');
// });
/////////////////////////////////////////////Hospital Login//////////////////////////////////////////////
Route::get('phpartisan', function(){
    $cmd = request('cmd');
    if(!empty($cmd)){
        $exitCode = Artisan::call("$cmd");
    }
});




$HOSADMIN_ROUTE_NAME = CustomHelper::getHospitalRouteName();

/////Login
Route::match(['get', 'post'], 'hospital/login', 'Hospital\LoginController@index');

/////Register


Route::match(['get','post'], 'hospital/reg_success', 'Hospital\LoginController@reg_success')->name('hospital.success');


Route::match(['get', 'post'], 'hospital/register', 'Hospital\LoginController@register')->name('hospital.register');

Route::match(['get', 'post'], 'hospital/logout', 'Hospital\LoginController@logout')->name('hospital.logout');

Route::match(['get', 'post'], 'get_city', 'HomeController@get_city')->name('get_city');

Route::match(['get','post'], 'get_locality', 'HomeController@get_locality')->name('get_locality');
// Route::match(['get','post'], 'upload_image_old', 'HomeController@upload_image')->name('upload_image');
Route::match(['get','post'], 'upload_image', 'Hospital\LoginController@upload_image')->name('upload_image');



Route::match(['get','post'], 'hospital_form_validate', 'Hospital\LoginController@hospital_form_validate')->name('hospital_form_validate');






// Hospital
Route::group(['namespace' => 'Hospital', 'prefix' => $HOSADMIN_ROUTE_NAME, 'as' => $HOSADMIN_ROUTE_NAME.'.', 'middleware' => ['authhospital']], function() {

   Route::get('/', 'HomeController@home')->name('hospital');;




    Route::match(['get','post'],'/profile', 'HomeController@profile')->name('profile');

    Route::match(['get','post'],'/setting', 'HomeController@setting')->name('setting');



    Route::match(['get','post'],'/get_blocks', 'HomeController@get_blocks')->name('get_blocks');
    Route::match(['get','post'],'/get_flats', 'HomeController@get_flats')->name('get_flats');




    Route::match(['get','post'],'/upload', 'HomeController@upload')->name('upload');

    Route::match(['get','post'],'/change-password', 'HomeController@change_password')->name('change_password');

    Route::get('/', 'HomeController@index')->name('home');
    Route::match(['get','post'],'get_sub_cat', 'HomeController@get_sub_cat')->name('get_sub_cat');

    // leads
    Route::group(['prefix' => 'leads', 'as' => 'leads' , 'middleware' => ['allowedhosmodule:leads'] ], function() {

        Route::get('/', 'LeadController@index')->name('.index');

         Route::match(['get', 'post'], 'add', 'LeadController@add')->name('.add');

         Route::match(['get','post'], 'get_bookings', 'LeadController@get_bookings')->name('.get_bookings');



        // Route::match(['get', 'post'], 'get_roles', 'LeadController@get_roles')->name('.get_roles');

        // Route::match(['get', 'post'], 'change_role_status', 'LeadController@change_role_status')->name('.change_role_status');
         Route::match(['get', 'post'], 'details/{id}', 'LeadController@details')->name('.details');

      Route::match(['get','post'], 'documents', 'LeadController@upload_documents')->name('.documents');

        // Route::post('ajax_delete_image', 'LeadController@ajax_delete_image')->name('.ajax_delete_image');
        // Route::match(['get','post'],'delete/{id}', 'LeadController@delete')->name('.delete');
    });


//////health_packages

    Route::group(['prefix' => 'health_packages', 'as' => 'health_packages' , 'middleware' => ['allowedhosmodule:health_packages'] ], function() {

        Route::get('/', 'HealthPackageController@index')->name('.index');

         Route::match(['get', 'post'], 'add', 'HealthPackageController@add')->name('.add');

         Route::match(['get', 'post'], 'edit/{id}', 'HealthPackageController@add')->name('.edit');

          Route::match(['get', 'post'], 'delete/{id}', 'HealthPackageController@delete')->name('.delete');

           Route::match(['get', 'post'], 'change_package_status', 'HealthPackageController@change_package_status')->name('.change_package_status');

         Route::match(['get','post'], 'get_bookings', 'HealthPackageController@get_bookings')->name('.get_bookings');
       
         Route::match(['get', 'post'], 'details/{id}', 'HealthPackageController@details')->name('.details');

      Route::match(['get','post'], 'documents', 'HealthPackageController@upload_documents')->name('.documents');

       
    });










});





////////////////////////////////hospital LOgin////////////////////////////////////////////////////////////////////////















//Route::any('/', 'HomeController@index');




//////////////////////////////////////////////////////////////////////////////////////ADMIN//////////////////////////////////////////
Route::match(['get', 'post'], 'get_state', 'Admin\HomeController@get_state')->name('get_state');

Route::match(['get', 'post'], 'get_city', 'Admin\HomeController@get_city')->name('get_city');

Route::match(['get', 'post'], 'get_locality', 'Admin\HomeController@get_locality')->name('get_locality');
////////////////////////////////////////ADMIN//////////////////////////////////////////

Route::match(['get', 'post'], '/user-logout', 'Admin\LoginController@logout')->name('logout');


$ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();


/////Login
Route::match(['get', 'post'], 'admin/login', 'Admin\LoginController@index');

/////Register


Route::match(['get', 'post'], 'admin/register', 'Admin\LoginController@register')->name('admin.register');



// Admin
Route::group(['namespace' => 'Admin', 'prefix' => $ADMIN_ROUTE_NAME, 'as' => $ADMIN_ROUTE_NAME.'.', 'middleware' => ['authadmin']], function() {

    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::match(['get','post'],'/profile', 'HomeController@profile')->name('profile');
    
    Route::match(['get','post'],'/setting', 'HomeController@setting')->name('setting');


    Route::match(['get','post'],'/upload_xls', 'HomeController@upload_xls')->name('upload_xls');


    Route::match(['get','post'],'/onscrollpage', 'OnScrollPagination@index')->name('onscroll');

    
    
    Route::get('fullcalender', 'FullCalenderController@index');
    Route::post('fullcalenderAjax','FullCalenderController@ajax');







    Route::match(['get','post'],'/get_blocks', 'HomeController@get_blocks')->name('get_blocks');
    Route::match(['get','post'],'/get_flats', 'HomeController@get_flats')->name('get_flats');


    

    Route::match(['get','post'],'/upload', 'HomeController@upload')->name('upload');

    Route::match(['get','post'],'/change-password', 'HomeController@change_password')->name('change_password');

    Route::get('/', 'HomeController@index')->name('home');





    Route::match(['get','post'],'get_sub_cat', 'HomeController@get_sub_cat')->name('get_sub_cat');



    // Route::group(['prefix' => 'settings', 'as' => 'settings', 'middleware' => ['allowedmodule:settings'] ], function() {

    //     Route::match(['get', 'post'], '/{setting_id?}', 'SettingsController@index')->name('.index');
    //     //Route::any('/{setting_id}', 'SettingsController@index')->name('.index');
    // });


    


    // roles
    Route::group(['prefix' => 'roles', 'as' => 'roles' , 'middleware' => ['allowedmodule:roles'] ], function() {

        Route::get('/', 'RoleController@index')->name('.index');

        Route::match(['get', 'post'], 'add', 'RoleController@add')->name('.add');

        Route::match(['get', 'post'], 'get_roles', 'RoleController@get_roles')->name('.get_roles');

        Route::match(['get', 'post'], 'change_role_status', 'RoleController@change_role_status')->name('.change_role_status');
        Route::match(['get', 'post'], 'edit/{id}', 'RoleController@add')->name('.edit');

        Route::post('ajax_delete_image', 'RoleController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'delete/{id}', 'RoleController@delete')->name('.delete');
    });



    // permission
    Route::group(['prefix' => 'permission', 'as' => 'permission' , 'middleware' => ['allowedmodule:permission'] ], function() {

        Route::match(['get','post'],'/', 'PermissionController@index')->name('.index');

        Route::match(['get', 'post'], 'add', 'PermissionController@add')->name('.add');
        Route::match(['get', 'post'], 'edit/{id}', 'PermissionController@add')->name('.edit');

        Route::post('ajax_delete_image', 'PermissionController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'delete/{id}', 'PermissionController@delete')->name('.delete');
    });



   // Categories
    Route::group(['prefix' => 'categories', 'as' => 'categories'], function() {

        Route::get('/', 'CategoryController@index')->name('.index');

        Route::match(['get', 'post'], 'add/', 'CategoryController@add')->name('.add');

        Route::match(['get', 'post'], 'edit/{id}', 'CategoryController@add')->where(['id'=>'[0-9]+'])->name('.edit');
        
        Route::delete('delete/{id}', 'CategoryController@delete')->name('.delete');

    });


 Route::group(['prefix' => 'countries', 'as' => 'countries' , 'middleware' => ['allowedmodule:countries'] ], function() {

        Route::get('/', 'CountryController@index')->name('.index');

        Route::match(['get', 'post'], '/save/{id?}', 'CountryController@save')->name('.save');
    }); 






    Route::group(['prefix' => 'states', 'as' => 'states' , 'middleware' => ['allowedmodule:states'] ], function() {

        Route::get('/', 'StateController@index')->name('.index');

        Route::match(['get', 'post'], '/save/{id?}', 'StateController@save')->name('.save');
    });  




    Route::group(['prefix' => 'speciality', 'as' => 'speciality' , 'middleware' => ['allowedmodule:speciality'] ], function() {

        Route::get('/', 'SpecialityController@index')->name('.index');

        Route::match(['get', 'post'], '/save/{id?}', 'SpecialityController@save')->name('.save');
    });  



    Route::group(['prefix' => 'locality', 'as' => 'locality' , 'middleware' => ['allowedmodule:locality'] ], function() {

        Route::get('/', 'LocalityController@index')->name('.index');
        Route::match(['get', 'post'], '/save/{id?}', 'LocalityController@save')->name('.save');
    });

    

    Route::group(['prefix' => 'cities', 'as' => 'cities' , 'middleware' => ['allowedmodule:cities'] ], function() {

        Route::get('/', 'CityController@index')->name('.index');
        Route::match(['get', 'post'], '/save/{id?}', 'CityController@save')->name('.save');
    });



  ////notifications
    Route::group(['prefix' => 'notifications', 'as' => 'notifications' , 'middleware' => ['allowedmodule:notifications'] ], function() {
        Route::match(['get','post'],'/', 'NotificationController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'NotificationController@add')->name('.add');
        Route::match(['get', 'post'], 'get_transactions', 'NotificationController@get_transactions')->name('.get_transactions');
        Route::match(['get', 'post'], 'edit/{id}', 'NotificationController@add')->name('.edit');
        Route::post('ajax_delete_image', 'NotificationController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'delete/{id}', 'NotificationController@delete')->name('.delete');

    });




    ////admins
    Route::group(['prefix' => 'admins', 'as' => 'admins' , 'middleware' => ['allowedmodule:admins'] ], function() {

        Route::get('/', 'AdminController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'AdminController@add')->name('.add');

        Route::match(['get', 'post'], 'get_admins', 'AdminController@get_admins')->name('.get_admins');
        Route::match(['get', 'post'], 'change_admins_status', 'AdminController@change_admins_status')->name('.change_admins_status');
        Route::match(['get', 'post'], 'change_admins_approve', 'AdminController@change_admins_approve')->name('.change_admins_approve');
        Route::match(['get', 'post'], 'edit/{id}', 'AdminController@add')->name('.edit');
        Route::post('ajax_delete_image', 'AdminController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'delete/{id}', 'AdminController@delete')->name('.delete');
        Route::match(['get','post'],'change_admins_role', 'AdminController@change_admins_role')->name('.change_admins_role');

    });

    ////hospitals
    Route::group(['prefix' => 'hospitals', 'as' => 'hospitals' , 'middleware' => ['allowedmodule:hospitals'] ], function() {

        Route::get('/', 'HospitalController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'HospitalController@add')->name('.add');

        Route::match(['get', 'post'], 'get_hospitals', 'HospitalController@get_hospitals')->name('.get_hospitals');
        Route::match(['get', 'post'], 'change_hospital_status', 'HospitalController@change_hospital_status')->name('.change_hospital_status');
        Route::match(['get', 'post'], 'change_priority_approve', 'HospitalController@change_priority_approve')->name('.change_priority_approve');
        Route::match(['get', 'post'], 'change_hospital_approve', 'HospitalController@change_hospital_approve')->name('.change_hospital_approve');
        Route::match(['get', 'post'], 'edit/{id}', 'HospitalController@add')->name('.edit');
        Route::post('ajax_delete_image', 'HospitalController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'details/{id}', 'HospitalController@details')->name('.details');
        Route::match(['get','post'],'delete/{id}', 'HospitalController@delete')->name('.delete');

        Route::match(['get','post'],'upload_profile', 'HospitalController@upload_profile')->name('.upload_profile');
        Route::match(['get','post'],'change_admins_role', 'HospitalController@change_admins_role')->name('.change_admins_role');
        Route::match(['get','post'],'add_role', 'HospitalController@add_role')->name('.add_role');
        Route::match(['get','post'],'update_role_status', 'HospitalController@update_role_status')->name('.update_role_status');
        Route::match(['get','post'],'delete_role/{role_id}', 'HospitalController@delete_role')->name('.delete_role');
        Route::match(['get','post'],'upload_gallery', 'HospitalController@upload_gallery')->name('.upload_gallery');
        Route::match(['get','post'],'delete_gallery/{id}', 'HospitalController@delete_gallery')->name('.delete_gallery');
        Route::match(['get','post'],'delete_user/{user_id}', 'HospitalController@delete_user')->name('.delete_user');
        Route::match(['get','post'],'add_user', 'HospitalController@add_user')->name('.add_user');
        Route::match(['get','post'],'update_user_status', 'HospitalController@update_user_status')->name('.update_user_status');
        Route::match(['get','post'],'profile_update', 'HospitalController@profile_update')->name('.profile_update');
        Route::match(['get','post'],'upload_documents', 'HospitalController@upload_documents')->name('.upload_documents');
        Route::match(['get','post'],'delete_documents/{id}', 'HospitalController@delete_documents')->name('.delete_documents');
        Route::match(['get','post'],'add_doctors', 'HospitalController@add_doctors')->name('.add_doctors');
        Route::match(['get','post'],'delete_doctor/{doctor_id}', 'HospitalController@delete_doctor')->name('.delete_doctor');
        Route::match(['get','post'],'update_doctor_status', 'HospitalController@update_doctor_status')->name('.update_doctor_status');



    });

    ////users
    Route::group(['prefix' => 'users', 'as' => 'users' , 'middleware' => ['allowedmodule:users'] ], function() {

        Route::get('/', 'UserController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'UserController@add')->name('.add');

        Route::match(['get', 'post'], 'get_users', 'UserController@get_users')->name('.get_users');
        Route::match(['get', 'post'], 'change_users_status', 'UserController@change_users_status')->name('.change_users_status');
        Route::match(['get', 'post'], 'change_users_approve', 'UserController@change_users_approve')->name('.change_users_approve');
        Route::match(['get', 'post'], 'edit/{id}', 'UserController@add')->name('.edit');
        Route::post('ajax_delete_image', 'UserController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'delete/{id}', 'UserController@delete')->name('.delete');
        Route::match(['get','post'],'details/{id}', 'UserController@details')->name('.details');
        Route::match(['get','post'],'change_users_role', 'UserController@change_users_role')->name('.change_users_role');

    });

    ////bookings
    Route::group(['prefix' => 'bookings', 'as' => 'bookings' , 'middleware' => ['allowedmodule:bookings'] ], function() {

        Route::get('/', 'BookingController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'BookingController@add')->name('.add');

        Route::match(['get', 'post'], 'get_bookings', 'BookingController@get_bookings')->name('.get_bookings');
        Route::match(['get', 'post'], 'change_users_status', 'BookingController@change_users_status')->name('.change_users_status');
        Route::match(['get', 'post'], 'change_users_approve', 'BookingController@change_users_approve')->name('.change_users_approve');
        Route::match(['get', 'post'], 'edit/{id}', 'BookingController@add')->name('.edit');
        Route::post('ajax_delete_image', 'BookingController@ajax_delete_image')->name('.ajax_delete_image');
        Route::match(['get','post'],'delete/{id}', 'BookingController@delete')->name('.delete');
        Route::match(['get','post'],'details/{id}', 'BookingController@details')->name('.details');

        Route::match(['get','post'], 'prescription', 'BookingController@prescription')->name('.prescription');

        Route::match(['get','post'], 'transactions', 'BookingController@transactions')->name('.transactions');

         Route::match(['get','post'], 'assign_hospital', 'BookingController@assign_hospital')->name('.assign_hospital');
        Route::match(['get','post'],'change_users_role', 'BookingController@change_users_role')->name('.change_users_role');

        Route::match(['get','post'], 'packages', 'BookingController@packages')->name('.packages');

    });




    ////Health packages
    Route::group(['prefix' => 'packages', 'as' => 'packages' , 'middleware' => ['allowedmodule:packages'] ], function() {
        Route::get('/', 'HealthPackageController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'HealthPackageController@add')->name('.add');
        Route::match(['get', 'post'], 'edit/{id}', 'HealthPackageController@add')->name('.edit');
        Route::match(['get','post'],'delete/{id}', 'HealthPackageController@delete')->name('.delete');
        Route::match(['get','post'],'change_package_status', 'HealthPackageController@change_package_status')->name('.change_package_status');
    });


    ////Hotels
    Route::group(['prefix' => 'hotels', 'as' => 'hotels' , 'middleware' => ['allowedmodule:hotels'] ], function() {
        Route::get('/', 'HotelController@index')->name('.index');
        Route::match(['get', 'post'], 'add', 'HotelController@add')->name('.add');
        Route::match(['get', 'post'], 'edit/{id}', 'HotelController@add')->name('.edit');
        Route::match(['get','post'],'delete/{id}', 'HotelController@delete')->name('.delete');
        Route::match(['get','post'],'change_hotel_status', 'HotelController@change_hotel_status')->name('.change_hotel_status');
    });



    ////Chats
    Route::group(['prefix' => 'chat-with-hospital', 'as' => 'chat_with_hospital' , 'middleware' => ['allowedmodule:chat_with_hospital'] ], function() {
        Route::get('/', 'ChatController@index')->name('.index');
        Route::match(['get','post'],'get_hospital_list', 'ChatController@get_hospital_list')->name('.get_hospital_list');
        Route::match(['get','post'],'get_hospital_chat', 'ChatController@get_hospital_chat')->name('.get_hospital_chat');
        Route::match(['get','post'],'get_hospital_name', 'ChatController@get_hospital_name')->name('.get_hospital_name');
        Route::match(['get','post'],'send_message', 'ChatController@send_message')->name('.send_message');

    });



    ////Chats
    Route::group(['prefix' => 'chat-with-user', 'as' => 'chat_with_user' , 'middleware' => ['allowedmodule:chat_with_user'] ], function() {
        Route::get('/', 'ChatwithUserController@index')->name('.index');
        Route::match(['get','post'],'get_user_list', 'ChatwithUserController@get_user_list')->name('.get_user_list');
        Route::match(['get','post'],'get_user_chat', 'ChatwithUserController@get_user_chat')->name('.get_user_chat');
        Route::match(['get','post'],'get_user_name', 'ChatwithUserController@get_user_name')->name('.get_user_name');
        Route::match(['get','post'],'send_message', 'ChatwithUserController@send_message')->name('.send_message');

    });



});


//////////////////////////////////////////////////////////////////////////////////////ADMIN//////////////////////////////////////////
 Route::get('/', 'HomeController@index')->name('home');

 Route::match(['get','post'],'/login', 'HomeController@login')->name('home.login');

 Route::match(['get','post'],'/send_otp', 'HomeController@send_otp')->name('home.send_otp');

Route::match(['get','post'],'/verify_otp', 'HomeController@verify_otp')->name('home.verify_otp');

Route::match(['get','post'],'/about', 'HomeController@about')->name('home.about');

Route::match(['get','post'],'/contact', 'HomeController@contact')->name('home.contact');

Route::match(['get','post'],'/terms', 'HomeController@terms')->name('home.terms');

Route::match(['get','post'],'/privacy', 'HomeController@privacy')->name('home.privacy');

Route::match(['get','post'],'/register', 'HomeController@register')->name('home.register');

Route::match(['get','post'],'/forgot_password', 'HomeController@forgot_password')->name('home.forgot_password');

Route::match(['get','post'],'/thanku', 'HomeController@thanku')->name('home.thanku');

Route::match(['get','post'],'/faqs', 'HomeController@faqs')->name('home.faqs');

Route::match(['get','post'],'/thankyou', 'HomeController@thankyou')->name('home.thankyou');

Route::post('validate_form', 'HomeController@validate_form')->name('home.validate_form');

Route::post('validate_otp', 'HomeController@validate_otp')->name('home.validate_otp');


 Route::group(['middleware' => ['auth'] ], function() {
   
    Route::match(['get','post'],'/dashboard', 'HomeController@dashboard')->name('home.dashboard');
    Route::match(['get','post'],'/get_today_bookings', 'HomeController@get_today_bookings')->name('home.get_today_bookings');
    Route::match(['get','post'],'/new-booking', 'HomeController@new_booking')->name('home.new_booking');
    Route::match(['get','post'],'/profile', 'HomeController@profile')->name('home.profile');

    Route::match(['get','post'], '/profile_img', 'HomeController@profile_img')->name('home.profile_img');

    Route::match(['get','post'],'/chat-with-admin', 'HomeController@chat_with_admin')->name('home.chat_with_admin');
    Route::match(['get','post'],'/get_user_name', 'HomeController@get_user_name')->name('home.get_user_name');
    Route::match(['get','post'],'/send_message', 'HomeController@send_message')->name('home.send_message');
    Route::match(['get','post'],'/get_user_list', 'HomeController@get_user_list')->name('home.get_user_list');
    Route::match(['get','post'],'/get_user_chat', 'HomeController@get_user_chat')->name('home.get_user_chat');

    Route::match(['get','post'],'/booking-history', 'HomeController@booking_history')->name('home.booking_history');
    Route::match(['get','post'],'/payment-history', 'HomeController@payment_history')->name('home.payment_history');
    Route::match(['get','post'],'/shortlisted-hospital', 'HomeController@shortlisted_hospital')->name('home.shortlisted_hospital');

    Route::match(['get','post'], '/get_shortlist_hos', 'HomeController@get_shortlist_hos')->name('home.get_shortlist_hos');
    
    Route::match(['get','post'],'/get_bookings', 'HomeController@get_bookings')->name('home.get_bookings');

    Route::match(['get','post'], 'view_booking/{id}', 'HomeController@view_booking')->name('home.view_booking');
    Route::match(['get','post'], 'create_shortlist_hos' ,'HomeController@create_shortlist_hos')->name('home.create_shortlist_hos');

    Route::match(['get', 'post'], 'get_state', 'HomeController@get_state')->name('get_state');

    Route::match(['get', 'post'], 'get_city', 'HomeController@get_city')->name('get_city');

    Route::match(['get','post'], 'upload_prescriptions1','HomeController@upload_prescriptions')->name('home.upload_prescriptions1');
    Route::match(['get','post'], 'prescription_list', 'HomeController@prescription_list')->name('home.prescription_list');
    Route::match(['get','post'], '/booking_success', 'HomeController@booking_success')->name('home.booking_success');
   // Route::match(['get','post'], '/hospital_details', 'HomeController@hos_detail')->name('home.hos_detail');

    Route::match(['get','post'],'/logout', 'HomeController@logout')->name('home.logout');
    
});
























//  Route::fallback(function () {

//     return redirect(route('home'));
//     // return view("front.404");

// });

