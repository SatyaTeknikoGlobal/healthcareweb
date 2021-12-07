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
use App\State;
use App\City;
use App\SocietyUsers;
use App\UserVehicle;
use App\UserDailyHelp;
use Yajra\DataTables\DataTables;
use Storage;
use DB;
use Hash;



Class OnScrollPagination extends Controller
{


	private $ADMIN_ROUTE_NAME;

	public function __construct(){
		$this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
	}



	public function index(Request $request){
    	$posts = DB::table('scroll_pagination')->paginate(5);


    	if ($request->ajax()) {
    		$view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
    	return view('my-post',compact('posts'));
    }






}