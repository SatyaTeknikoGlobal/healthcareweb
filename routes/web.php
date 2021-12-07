<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CustomHelper;
use Artisan;

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

//Route::any('/', 'HomeController@index');
///////////////////////////////////SADMIN/////////////////////////////////////////

// $SADMIN_ROUTE_NAME = CustomHelper::getSadminRouteName();

Route::get('phpartisan', function(){
    $cmd = request('cmd');
    if(!empty($cmd)){
        $exitCode = Artisan::call("$cmd");
    }
});




Route::match(['get', 'post'], 'get_city', 'Admin\HomeController@get_city')->name('get_city');

Route::match(['get', 'post'], 'get_locality', 'Admin\HomeController@get_locality')->name('get_locality');
////////////////////////////////////////ADMIN//////////////////////////////////////////

Route::match(['get', 'post'], '/user-logout', 'Auth\LoginController@logout');


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









    Route::group(['prefix' => 'states', 'as' => 'states' , 'middleware' => ['allowedmodule:states'] ], function() {

        Route::get('/', 'StateController@index')->name('.index');

        Route::match(['get', 'post'], '/save/{id?}', 'StateController@save')->name('.save');
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
        Route::match(['get','post'],'change_users_role', 'UserController@change_users_role')->name('.change_users_role');

    });




















});



Route::get('/', 'HomeController@index')->name('home');

