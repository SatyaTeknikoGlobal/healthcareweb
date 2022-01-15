@include('front.common.header')


<style>
    .btn-block{
        width: auto;
        margin-right: auto;
        margin-left: auto;
    }
    .login-right{
        height: 100%
    }
    .user-img img{
        border-radius: 7px;
        height: 189px;
        width: 100%;
    }
    .pro-detail h5{
      margin-bottom: 15px;
      font-size: 15px;
      font-weight: 600;
         
  }
  #edit_profile{
    display: none;
    animation: fixedBottomContent 0.4s;
}
@-webkit-keyframes fixedBottomContent {
  from {
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
    -webkit-transform-origin: center top 0px;
    transform-origin: center top 0px;
}

to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}
}

@keyframes fixedBottomContent {
  from {
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
    -webkit-transform-origin: center top 0px;
    transform-origin: center top 0px;
}

to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}
}
</style>

<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Profile</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </div>
</div>
<section class="profile-sec">
    <div class="container">
        <div class="row">

           @include('front.common.sidebar')



           <div class="col-md-9 col-sm-12 col-xs-12 mb-5">

               @include('snippets.errors')
               @include('snippets.flash')

               <div class="login-right">
                <div class="login-header">
                    <h3 class="mb-5">Update Profile</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 mb-5">
                        <div class="user-img">
                           <img src="{{asset('storage/app/public/user/'.$user->image)}}" alt="">
                       </div>

                   </div>
                   <div class="col-md-8 col-sm-8 mb-5 pro-detail">
                    <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <h5>Name :</h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <h5>{{$user->name}}</h5>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <h5>Email :</h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <h5 style=" line-break: anywhere;">{{$user->email}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <h5>Phone:</h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <h5>{{$user->phone}}
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <h5>Alternate Email :
                        </h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <h5>{{$user->alt_email ?? ' ' }}</h5>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <h5>Alternate Phone :
                        </h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <h5>{{$user->alt_phone ?? ' '}}</h5>
                    </div>


                </div>
            </div>

            <div class="col-md-12 my-5">
                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit" id="edit">Edit Profile</button>
            </div>

            <div id="edit_profile" style="width: 100%">

                <form action="{{route('home.profile')}}" method="post" enctype="multipart/form-data"  >

                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Email</label>
                        <input type="email" name="email"  id="email" value="{{$user->email}}" class="form-control floating" readonly>

                    </div>

                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Phone</label>
                        <input type="number" name="phone" id="phone" value="{{$user->phone}}" class="form-control floating" readonly>

                    </div>



                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Alternate Email</label>
                        <input type="email" name="alt_email"  id="alt_email" value="" class="form-control floating" >

                    </div>

                    @include('snippets.errors_first', ['param' => 'alt_email'])

                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Alternate Phone</label>
                        <input type="number" name="alt_phone"  id="alt_phone" value="" class="form-control floating" >

                    </div>
                    @include('snippets.errors_first', ['param' => 'alt_phone'])

                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Old Password</label>
                        <input type="password" name="old_password"  placeholder="Enter Old password" class="form-control floating" >

                    </div>
                    @include('snippets.errors_first', ['param' => 'old_password'])


                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">New Password</label>
                        <input type="password" name="password"  placeholder="Enter Old password" class="form-control floating" >

                    </div>
                    @include('snippets.errors_first', ['param' => 'password'])



                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Confirm New Password</label>
                        <input type="password" name="confirm_password" placeholder="Enter Old password" class="form-control floating" >

                    </div>
                    @include('snippets.errors_first', ['param' => 'confirm_password'])


                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Image</label>
                        <input type="file"  name="image" id="image" class="form-control floating" >

                    </div>                          



                    <div class="col-md-12 my-5">
                        <button class="btn btn-primary btn-block btn-lg login-btn" id="submit" type="submit">Submit</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

</div>
</div>
</section>


@include('front.common.footer')

<script>

    document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});


</script>


<script>
    $(document).ready(function(){
      $("#edit").click(function(){
        $("#edit_profile").show();



    });


  });


   //  $("#edit").click(function(){

   //    $('#edit_profile').toggle(1500);

   // });
</script> 