<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;
use App\State;
use App\City;
use App\Hospital;
use App\User;
use Validator;
use Storage;
use App\Chatwithuser;

use App\Helpers\CustomHelper;

use Image;
use DB;

class ChatwithUserController extends Controller{
    private $limit;
    private $ADMIN_ROUTE_NAME;

    public function __construct(){
        $this->limit = 100;
        $this->ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();
    }

    public function index(Request $request)
    {
        $data = [];
       
         $userschat = Chatwithuser::select('sender_id','reciever_id')->get();

         $userIds = [];

         if(!empty($userschat))
         {
            foreach($userschat as $users)
            {
      
                if(!in_array($users->sender_id,$userIds))
                {
                    if($users->sender_id != 0)
                    {
                        $userIds[] = $users->sender_id;
                    }
                }

                if(!in_array($users->reciever_id, $userIds))
                {
                    if($users->reciever_id != 0)
                    {
                        $userIds[] = $users->reciever_id;
                    }
                }
                
            }
         }

         if(!empty($userIds))
         {
            $data['user_id'] = $userIds[0];
         }

        return view('admin.chats.chat_with_user', $data);

         //return view('admin.chats.chat_with_user');
    }


    public function get_user_name(Request $request){
        $user_id = isset($request->user_id) ? $request->user_id :'';

        // echo $user_id;
        // die;
        $user = User::where('id',$user_id)->first();

        //echo $user;

         echo $user->name.'('.$user->id.')';
    }



public function send_message(Request $request){
    $user_id = isset($request->user_id) ? $request->user_id :'';
    $message = isset($request->message) ? $request->message :'';

    $dbArray = [];
    $dbArray['sender_id'] = 0;
    $dbArray['reciever_id'] = $user_id;
    $dbArray['sender_type'] = 'admin';
    $dbArray['reciever_type'] = 'user';
    $dbArray['message'] = $message;
    Chatwithuser::insert($dbArray);
    echo 1;

}



    public function get_user_list(Request $request){
        $html = '';
        $search = isset($request->search) ? $request->search :'';
        $user_id = isset($request->user_id) ? $request->user_id :'';
        $chats = Chatwithuser::select('sender_id','reciever_id')->get();
        $userIds = [];
        if(!empty($chats)){
            foreach($chats as $chat){

                if(!in_array($chat->sender_id,$userIds)){
                    if($chat->sender_id != 0){
                    $userIds[] = $chat->sender_id;

                    }
                }
                if(!in_array($chat->reciever_id,$userIds)){
                    if($chat->reciever_id != 0){
                    $userIds[] = $chat->reciever_id;
                        
                    }
                }

            }
        }

        // prd($userIds);
        if(!empty($userIds)){
            $users = User::select('id','name')->whereIn('id',$userIds);
             if(!empty($search)){
                        $users->where('name', 'like', '%' . $search . '%');
                    }
            $users = $users->get();
            if(!empty($users)){
                $i=1;
                foreach($users as $user){
                    $active ='';
                    if($user->id == $user_id){
                        $active = 'active';
                    }
                    $html.='<li><a href="javascript:void(0)" onclick="get_user_chat('.$user->id.')" class='.$active.'><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>'.$user->name.'</span></a></li>';
                    $i++;
                }
            }
        }else{
            $html.='No User Found';
        }

    echo $html;

}

public function get_user_chat(Request $request){
    $page = isset($request->page) ? $request->page :1;

    $user_id = isset($request->user_id) ? $request->user_id :'';
    $html = '';
    $perpage = 10;
    $count = $perpage * $page;
    $chats = Chatwithuser::where('sender_id','=',$user_id)->orWhere('reciever_id','=',$user_id)->skip(0)->take($count)->get();
    //prd($chats);
    if(!empty($chats)){
        foreach($chats as $chat){
            if($chat->sender_id !=0){
                $user = User::where('id',$chat->sender_id);
                $user = $user->first();
            }
            if($chat->reciever_id !=0){
                $user = User::where('id',$chat->reciever_id);
                $user = $user->first();
            }

            $created_at = date('h:i A',strtotime($chat->created_at));
            //prd($hospital);
            if($chat->sender_type == 'user' || $chat->reciever_type == 'admin'){
                /////////Left Side
                //echo "string";
                $html.=' <li><div class="chat-img"><img src="https://healthcareweb.appmantra.live/public/assets/images/users/1.jpg" alt="user"></div><div class="chat-content"><h5>'.$user->name.'</h5>
                <div class="box bg-light-info">'.$chat->message.'</div>
                <div class="chat-time">'.$created_at.'</div>
                </div>
                </li>';

            }

            if($chat->sender_type == 'admin' || $chat->reciever_type == 'user'){
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





/* end of controller */
}