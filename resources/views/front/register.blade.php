@include('front.common.header')

<div class="content" id="register">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left"><img src="{{asset('public/assets/images/login.png')}}" class="img-fluid"
                            alt="Doccure Login"></div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3 class="mb-5">Create an Account</h3>
                                </div>

                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>

                               <!--  <form class="contactus-form" id="signupform" method="post">
                                    {{csrf_field()}} -->
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Name <span style="color:red;">*</span></label>

                                        <input type="text" name="name" value="{{old('name')}}" class="form-control floating" placeholder="Name" autocomplete="off">
                                    </div>
                                    @include('snippets.errors_first', ['param' => 'name'])
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Email <span style="color:red;">*</span></label>

                                        <input type="email" name="email" value="{{old('email')}}" class="form-control floating" placeholder="Email" autocomplete="off">
                                    </div>
                                    @include('snippets.errors_first', ['param' => 'email'])

                                    <div class="form-group form-focus">
                                        <label class="focus-label">Phone <span style="color:red;">*</span></label>

                                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control floating" placeholder="Phone" autocomplete="off">
                                    </div>
                                    @include('snippets.errors_first', ['param' => 'phone'])
                                    <div class="form-group form-focus">
                                        <label class="focus-label"> Password <span style="color:red;">*</span></label>
                                        <input type="password" name="password" class="form-control floating" placeholder="Password" autocomplete="off">
                                    </div>
                                    @include('snippets.errors_first', ['param' => 'password'])


                                    <div class="form-group form-focus">
                                        <label class="focus-label">Confirm Password <span style="color:red;">*</span></label>
                                        <input type="password" name="confirm_password" class="form-control floating" placeholder="Confirm Password" autocomplete="off">
                                    </div>
                                    @include('snippets.errors_first', ['param' => 'confirm_password'])


                                    <button class="btn btn-primary btn-block btn-lg login-btn"
                                    type="button" id="continue">Send OTP</button>
                                    <div class="login-or"><span class="or-line"></span>
                                    </div>

                                    <div class="text-center dont-have"> Already have an account?<a
                                        href="{{route('home.login')}}">Login</a></div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div class="content" id="otp">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="account-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-7 col-lg-6 login-left"><img src="{{asset('public/assets/images/login.png')}}" class="img-fluid"
                                        alt="Doccure Login"></div>
                                        <div class="col-md-12 col-lg-6 login-right">
                                            <div class="login-header">
                                                <h3 class="mb-5">Create an Account</h3>
                                            </div>
                                             <div class="alert alert-danger print-error-msg1" style="display:none">
                                    <ul></ul>
                                </div>
                            <form class="contactus-form"  method="post" id="signupform_submit" action="{{route('home.register')}}">
                                                {{csrf_field()}}
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">Otp<span style="color:red;">*</span></label>

                                                    <input type="text" name="otp" value="" class="form-control floating" placeholder="Enter Otp" autocomplete="off">
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'otp'])
                                                <input type="hidden" name="name" id="name">
                                                <input type="hidden" name="email" id="email">
                                                <input type="hidden" name="phone" id="phone">
                                                <input type="hidden" name="password" id="password">



                                                <button class="btn btn-primary btn-block btn-lg login-btn"
                                                type="button" id="validate_otp">Login</button>


                                                <button type="submit" style="display:none;" id="submit_reg_form">Login</button>



                                                <div class="login-or"><span class="or-line"></span>
                                                </div>

                                                <div class="text-center dont-have"> Already have an account?<a
                                                    href="{{route('home.login')}}">Login</a></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('front.common.footer')


                    <script type="text/javascript">
                        $( document ).ready(function() {
                           $('#otp').hide();
                       });

                         $("#continue").click(function(e){

                          e.preventDefault();


                          var _token = $("input[name='_token']").val();
                          var email = $("input[name='email']").val();
                          var name = $("input[name='name']").val();
                          var phone = $("input[name='phone']").val();
                          var password = $("input[name='password']").val();
                          var confirm_password = $("input[name='confirm_password']").val();



                          $.ajax({
                            url: "{{ route('home.validate_form') }}",
                            type:'POST',
                            dataType:'JSON',
                            data: {_token:_token, email:email, name:name, phone:phone, password:password ,confirm_password:confirm_password},
                            success: function(data) {
                                if($.isEmptyObject(data.error)){
//alert(data.success);

$('#register').hide();

$('#name').val(name);
$('#email').val(email);
$('#phone').val(phone);
$('#password').val(password);
$('#otp').show();




}else{
// alert(data.error.);

printErrorMsg(data.error);
}
}
});




                          function printErrorMsg (msg) {
                            $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display','block');
                            $.each( msg, function( key, value ) {
                                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                            });
                        }




                    });






                        $("#validate_otp").click(function(e){
                           // alert('dsf');
                          e.preventDefault();
                          var _token = $("input[name='_token']").val();
                          var otp = $("input[name='otp']").val();
                          var phone = $("input[name='phone']").val();


                            $.ajax({
                            url: "{{ route('home.validate_otp') }}",
                            type:'POST',
                            dataType:'JSON',
                            data: {_token:_token, otp:otp, phone:phone},
                            success: function(data) {
                            if($.isEmptyObject(data.error)){
                               // alert('dfjgjfg');
                            //$('#signupform_submit').submit();
                            document.getElementById("submit_reg_form").click();
                               // document.getElementById('signupform_submit').submit();
                            }else{
                            printErrorMsg1(data.error);
                            }
                            }
                            });

                              function printErrorMsg1 (msg) {
                            $(".print-error-msg1").find("ul").html('');
                            $(".print-error-msg1").css('display','block');
                            $.each( msg, function( key, value ) {
                                $(".print-error-msg1").find("ul").append('<li>'+value+'</li>');
                            });
                        }



                            });

                  </script>