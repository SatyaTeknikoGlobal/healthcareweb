<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\State;
use App\City;
use App\Hospital;

use Validator;
use Storage;
use App\Chat;

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
       
         $chats = Chat::select('sender_id','reciever_id')->get();
        $hospitalIds = [];
        if(!empty($chats)){
            foreach($chats as $chat){

                if(!in_array($chat->sender_id,$hospitalIds)){
                    if($chat->sender_id != 0){
                    $hospitalIds[] = $chat->sender_id;

                    }
                }
                if(!in_array($chat->reciever_id,$hospitalIds)){
                    if($chat->reciever_id != 0){
                    $hospitalIds[] = $chat->reciever_id;
                        
                    }
                }

            }
        }

        // print_r($hospitalIds);
        if(!empty($hospitalIds)){
           $data['hospital_id'] = $hospitalIds[0];
        }


        return view('admin.chats.chat_with_hospital', $data);
    }


    public function get_hospital_name(Request $request){
        $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
        $hospital = Hospital::where('id',$hospital_id)->first();

        echo $hospital->name.'('.$hospital->unique_id.')';
    }



public function send_message(Request $request){
    $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
    $message = isset($request->message) ? $request->message :'';

    $dbArray = [];
    $dbArray['sender_id'] = 0;
    $dbArray['reciever_id'] = $hospital_id;
    $dbArray['sender_type'] = 'admin';
    $dbArray['reciever_type'] = 'hospital';
    $dbArray['message'] = $message;
    Chat::insert($dbArray);
    echo 1;

}



    public function get_hospital_list_old(Request $request){
        $html = '';
        $search = isset($request->search) ? $request->search :'';
        $chats = Chat::where('sender_type','=','hospital')->orWhere('reciever_type','=','hospital')->latest()->groupBy('sender_id');


        $chats = $chats->get();

        if(!empty($chats)){
            $i=1;
            foreach ($chats as $chat){
                if($chat->sender_id !=0){
                    $hospital = Hospital::where('id',$chat->sender_id);
                    if(!empty($search)){
                        $hospital->where('name', 'like', '%' . $search . '%');
                    }
                    $hospital = $hospital->first();
                }
                if($chat->reciever_id !=0){
                    $hospital = Hospital::where('id',$chat->reciever_id);
                    if(!empty($search)){
                        $hospital->where('name', 'like', '%' . $search . '%');
                    }
                    $hospital = $hospital->first();
                }
                $active='';
                if($i == 1){
                    $active = 'active';
                }
                if(!empty($hospital)){

                 $html.='<li><a href="javascript:void(0)" onclick="get_hospital_chat('.$hospital->id.')" class='.$active.'><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>'.$hospital->name.'</span></a></li>';
             }

             $i++;
         }
     }else{
        $html.='No Chats Found';
    }


    echo $html;

}


    public function get_hospital_list(Request $request){
        $html = '';
        $search = isset($request->search) ? $request->search :'';
        $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
        $chats = Chat::select('sender_id','reciever_id')->get();
        $hospitalIds = [];
        if(!empty($chats)){
            foreach($chats as $chat){

                if(!in_array($chat->sender_id,$hospitalIds)){
                    if($chat->sender_id != 0){
                    $hospitalIds[] = $chat->sender_id;

                    }
                }
                if(!in_array($chat->reciever_id,$hospitalIds)){
                    if($chat->reciever_id != 0){
                    $hospitalIds[] = $chat->reciever_id;
                        
                    }
                }

            }
        }
        if(!empty($hospitalIds)){
            $hospitals = Hospital::select('id','name','unique_id')->whereIn('id',$hospitalIds);
             if(!empty($search)){
                        $hospitals->where('name', 'like', '%' . $search . '%');
                    }
            $hospitals = $hospitals->get();
            if(!empty($hospitals)){
                $i=1;
                foreach($hospitals as $hospital){
                    $active ='';
                    if($hospital->id == $hospital_id){
                        $active = 'active';
                    }
                    $html.='<li><a href="javascript:void(0)" onclick="get_hospital_chat('.$hospital->id.')" class='.$active.'><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>'.$hospital->name.'('.$hospital->unique_id.')</span></a></li>';
                    $i++;
                }
            }
        }else{
            $html.='No Hospital Found';
        }

    echo $html;

}

public function get_hospital_chat(Request $request){
    $page = isset($request->page) ? $request->page :1;

    $hospital_id = isset($request->hospital_id) ? $request->hospital_id :'';
    $html = '';
    $perpage = 10;
    $count = $perpage * $page;
    $chats = Chat::where('sender_id','=',$hospital_id)->orWhere('reciever_id','=',$hospital_id)->skip(0)->take($count)->get();
    //prd($chats);
    if(!empty($chats)){
        foreach($chats as $chat){
            if($chat->sender_id !=0){
                $hospital = Hospital::where('id',$chat->sender_id);
                $hospital = $hospital->first();
            }
            if($chat->reciever_id !=0){
                $hospital = Hospital::where('id',$chat->reciever_id);
                $hospital = $hospital->first();
            }

            $created_at = date('h:i A',strtotime($chat->created_at));
            //prd($hospital);
            if($chat->sender_type == 'hospital' || $chat->reciever_type == 'admin'){
                /////////Left Side
                //echo "string";
                $html.=' <li><div class="chat-img"><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user"></div><div class="chat-content"><h5>'.$hospital->name.'</h5>
                <div class="box bg-light-info">'.$chat->message.'</div>
                <div class="chat-time">'.$created_at.'</div>
                </div>
                </li>';

            }

            if($chat->sender_type == 'admin' || $chat->reciever_type == 'hospital'){
                /////////Right Side
                $html.='<li class="reverse">
                <div class="chat-content">
                <h5>Admin</h5>
                <div class="box bg-light-inverse">'.$chat->message.'</div>
                <div class="chat-time">'.$created_at.'</div>
                </div>
                <div class="chat-img"><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user"></div>
                </li>';
            }


        }

    }

    echo $html;
}

















public function chat_with_user(Request $request){

    $data = [];





    return view('admin.chats.chat_with_user', $data);
}



/* end of controller */
}