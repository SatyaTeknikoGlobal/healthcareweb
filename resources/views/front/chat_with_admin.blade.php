@include('front.common.header')

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style type="text/css">
  .chat{
      border-radius:7px;
      background:white;
      box-shadow:inset 0 0 10px hsla(0, 0%, 0%, 0.2);
      overflow:hidden;
 
  }
  .chat-texts{
      background:white;
      padding:2rem;
      overflow:auto;
      background-color: #f5f5f6;
         min-height: 300px;
    max-height: calc(100vh - 224px);
    overflow-y: auto;
      grid-template-rows:80% 20%;
  }

  .text{
      display:flex;
      padding:0.7rem;
      align-items:start;
      opacity:0;
  }

  @keyframes  fade-in{
      from{
       opacity:0;    
   }
   to{
    opacity:1;
}
}

.text.sent{
  flex-direction:row-reverse;
}

.text.sent .profile-pic{
  margin-right:0;
  margin-left:0.7rem;
  width: 50px;
}

.text.sent .text-content{
  border-radius:20px 0px 20px 20px;
   -webkit-transition: opacity 2s ease-in;
    -moz-transition: opacity 2s ease-in;
    -o-transition: opacity 2s ease-in;
    -ms-transition: opacity 2s ease-in;
    transition: opacity 2s ease-in;

}

.text.sent .text-content{
  background:#04b4a9;
  color:white;
  font-size: 14px;
  box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
}

.profile-pic{
  min-width:50px;
  height:50px;
  background:gray;
  border-radius:50%;
  margin-right:0.7rem;
  overflow:hidden;
}

.profile-pic img{
  width:100%;
  height:100%;
  object-fit:cover;
}

.text-content{
  background:hsl(220deg 67% 86%);
  padding:1.5rem;
  border-radius:0px 20px 20px 20px;
  font-size:14px;
  line-height:130%;
  letter-spacing:0.5px;
  box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
}

.timestamp{
    display: block;
    font-size: 14px;
    color: hsl(176deg 95% 36%);
    margin-top: 0.2rem;
}


.text.sent .timestamp{
  color:white;
}

.text-content h5{
  font-weight: 600;
letter-spacing: 0;
    font-size: 15px;
    margin-bottom: 11px;
}

.send-message{
  width:100%;
  padding:1rem;
  display:flex;
  align-items:center;
  justify-content:space-between;
   box-shadow: 0 0 10px hsla(0, 0%, 0%, 0.2);
}

.message-text{
  width:80%;
  background:white;
  padding:1rem 1.2rem;
  border-radius:100vw;
  display:flex;
  align-items:center;
  justify-content:space-between;
  flex-basis:80%;
  background:hsl(220, 20%, 94%);
}


.smiley, 
.attachment{
  width:20px;
  height:20px;
  display:grid;
  place-items:center;
  position: absolute;
  
}

.smiley i{
  font-size: 20px;
}
.message-text input{
 padding: 0 38px;
    border: none;
    width: 100%;
    background: transparent;
    font-size: 15px;

}

.message-text input:focus{
  outline:none;
}

.chat-btn{
  border:none;
  background:transparent;
  width:60px;
  height:60px;
  font-size:2rem;
  border-radius:50%;
  background:#04b4a9;
  color:white;
  display:grid;
  place-items:center;
  transition:300ms ease;
}

.chat-btn:hover{
  background:black;
  cursor:pointer;
}
/*
.login-right{
  height: 100%;
  margin-bottom: 30px;
  overflow: hidden;
}
*/

.login-right{
  padding: 0px 26px;
  position: sticky;
  top: 4%;
  margin-bottom: 30px;
}
  .login-header{
    text-align: center;
    padding: 7px 0px;
  }

  .login-header h3{
    font-weight: 600;
  }

@media screen and (max-width: 767px)

{




  .login-right{
    position: relative;
    top: 0%;
  }
  .profile-sec,
  .profile-sec .container,
  .login-right{
    padding: 0px;

  }

/*  #page_title,
  #header,
  footer{
    display: none;
  }*/
}


</style>

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();


$storage = Storage::disk('public');
$path = 'influencer/thumb/';
// $roleId = Auth::guard('admin')->user()->role_id;

?>
<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Chat With Admin</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Chat With Admin</li>
        </ol>
    </div>
</div>
<section class="profile-sec">
    <div class="container">
        <div class="row">

           @include('front.common.sidebar')



           <div class="col-md-9 col-sm-12 col-xs-12 col-lg-9">

               @include('snippets.errors')
               @include('snippets.flash')

               <div class="login-right">
                <div class="login-header">
                    <h3 class="my-3">Chat With Admin</h3>
                </div>

                <div class="chat">

                  <div class="chat-texts">

                    <div class="text" data-aos="zoom-in">
                      <div class="profile-pic"> <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt=""> </div>
                      <div class="text-content">
                          <h5>Joannie</h5>
                          Lorem ipsum dolor sit amet.<span class="timestamp">12:00hrs</span></div>
                      </div>

                      <div class="text sent" data-aos="zoom-in">
                          <div class="profile-pic"><img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt=""></div>
                          <div class="text-content"><h5>Laurie</h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates, saepe?<span class="timestamp">12:00hrs</span></div>
                      </div>

                      <div class="text" data-aos="zoom-in">
                          <div class="profile-pic"> <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt=""> </div>
                          <div class="text-content"><h5>Joannie</h5>Lorem ipsum dolor sit amet.<span class="timestamp">12:00hrs</span></div>
                      </div>

                      <div class="text" data-aos="zoom-in">
                          <div class="profile-pic"> <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt=""> </div>
                          <div class="text-content"><h5>Joannie</h5> Lorem ipsum dolor sit amet.<span class="timestamp">12:00hrs</span></div>
                      </div>

                      <div class="text sent" data-aos="zoom-in">
                          <div class="profile-pic"><img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt=""></div>
                          <div class="text-content"><h5>Laurie</h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates, saepe?<span class="timestamp">12:00hrs</span></div>
                      </div>

                      <div class="text" data-aos="zoom-in">
                          <div class="profile-pic"> <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt=""> </div>
                          <div class="text-content"><h5>Joannie</h5>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.<span class="timestamp">12:00hrs</span></div>
                      </div>
                      <div class="text" data-aos="zoom-in">
                          <div class="profile-pic"> <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt=""> </div>
                          <div class="text-content"><h5>Joannie</h5>Lorem ipsum dolor sit amet.<span class="timestamp">12:00hrs</span></div>
                      </div>

                      <div class="text sent" data-aos="zoom-in">
                          <div class="profile-pic"><img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt=""></div>
                          <div class="text-content"><h5>Laurie</h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates, saepe?<span class="timestamp">12:00hrs</span></div>
                      </div>

                  </div>

                  <div class="send-message">
                    <div class="message-text">
                       <input type="text" placeholder="Send Message">
                      <div class="smiley"><i class="fa fa-paperclip"></i></div>
                     
                      <div class="attachment"><i class="lni lni-upload"></i></div>
                  </div>
                  <button class="chat-btn"><i class="fab fa-telegram-plane"></i></button>
              </div>


          </div>


      </div>
  </div>

</div>
</div>
</section>

<input type="hidden" name="admin_id" id="admin_id" value="{{$admin_id ?? 0}}">
<input type="hidden" name="page" id="page" value="1">


@include('front.common.footer')

<script type="text/javascript">
    const text = document.querySelectorAll(".text");
    let delay = 0;
    text.forEach(el=>{
      el.style.animation = "fade-in 1s ease forwards";
      el.style.animationDelay= delay +"s";
      delay += 0.33;
  });
</script>

   <script>
        $( document ).ready(function() {

            var search='';
            var admin_id = $('#admin_id').val();
            get_hospital_list(search='',admin_id);

            get_hospital_name(admin_id);

            var page = 1;

        $('#chat_scroll').on('scroll',function() {
          page++;
          var hospital_id = $('#hospital_id').val();

          $('#page').val(page);
          get_hospital_chat(hospital_id,page);
        }); 

        get_hospital_chat(hospital_id,page);
        });


        $(document).ready(function(){
         var hospital_id = $('#hospital_id').val();
          var page = $('#page').val();
         setInterval(get_hospital_chat(hospital_id,page),2000);
        });





        $("#search").keyup(function(){
           var search = $('#search').val();
           get_hospital_list(search)
       });


        function get_hospital_name(hospital_id){
            var _token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{ route($routeName.'.chat_with_hospital.get_hospital_name') }}",
                type: "POST",
                data: {hospital_id:hospital_id},
                dataType:"HTML",
                headers:{'X-CSRF-TOKEN': _token},
                cache: false,
                success: function(resp){
                    $('#hospital_name').html(resp);
                }
            });

        }



        function get_hospital_list(search='',admin_id=''){
            //alert(hospital_id);
            var _token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{ route($routeName.'.chat_with_hospital.get_hospital_list') }}",
                type: "POST",
                data: {search:search,hospital_id:hospital_id},
                dataType:"HTML",
                headers:{'X-CSRF-TOKEN': _token},
                cache: false,
                success: function(resp){
                    $('#hospital_list').html(resp);
                }
            });

        }






        function get_hospital_chat(hospital_id='',page=1){


            $('#hospital_id').val(hospital_id);
            if(page == 1){
                $("#chat-data").html('');
            }

            get_hospital_name(hospital_id);
            get_hospital_list(search='',hospital_id)

            var _token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{ route($routeName.'.chat_with_hospital.get_hospital_chat') }}",
                type: "get",
                data: {hospital_id:hospital_id,page:page},
                dataType:"HTML",
                headers:{'X-CSRF-TOKEN': _token},
                cache: false,
                success: function(resp){
                //$('#hospital_list').html(resp);
                //alert(resp);
                $("#chat-data").html(resp);
            }
        });

        }


    $("#send_message").click(function(){
        var hospital_id = $('#hospital_id').val();
        var page = $('#page').val();
        var message = $('#message').val();

        if(message==''){
                alert('Type Something!!');

            return false;
        }

            var _token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{ route($routeName.'.chat_with_hospital.send_message') }}",
                type: "get",
                data: {hospital_id:hospital_id,message:message},
                dataType:"HTML",
                headers:{'X-CSRF-TOKEN': _token},
                cache: false,
                success: function(resp){
                $('#message').val('');
                get_hospital_chat(hospital_id,page);
            }
        });
       });

// AOS animation
AOS.init({
  duration: 1200,
})

    </script>