<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\State;
use App\City;

use Validator;
use Storage;

use App\Helpers\CustomHelper;

use Image;
use DB;

class ChatController extends Controller{
    private $limit;
    private $ADMIN_ROUTE_NAME;

    public function __construct(){
        $this->limit = 100;
        $this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
    }

    public function index(Request $request){
        $data = [];
       
        return view('admin.chats.index', $data);
    }











/* end of controller */
}