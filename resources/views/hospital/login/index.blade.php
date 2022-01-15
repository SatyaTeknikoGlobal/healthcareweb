<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/assets/images/favicon.png')}}">
    <title>Hospital Login</title>

    <!-- page css -->
    <link href="{{asset('public/assets/dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('public/assets/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link href="{{asset('public/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('public/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- Dashboard 1 Page CSS -->
    



</head>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="col-md-12  login-right step step-5">
    <div class="login-header">
        <h3 class="mb-5">Infrastructure & Facilities</h3>
    </div>
    <div  class="form-5" id="form5">
        <div class="form-group form-focus col-md-12">
            <label class="focus-label">Hospital Photos </label>

            <input type="file" class="form-control floating" name="image" id="image">
            <span style="color:red;" class="print-error-msg-image "></span>
        </div>
        <div class="d-flex col-md-12">
            <button  class="btn btn-primary btn-block mx-3 w-auto" id="savenext5"
            >Save & Next</button>
            <button  class="btn btn-primary btn-block mx-3 w-auto"
            id="next5" >Next</button>
        </div>
    </div>
</div> -->



<!-- <script type="text/javascript">

            $('#image').change(function() {
                  var data = new FormData();
                   data.append('file', $('#image').prop('files')[0]);
              // console.log($('#image').prop('files')[0]);


               var _token = '{{ csrf_token() }}';
               $.ajax({
                type: 'post',
                url: "{{ route('upload_image') }}",
                processData: false,
                contentType: false,
                data: data,
                dataType:"JSON",
                headers:{'X-CSRF-TOKEN': _token},
                cache: false,

                success: function (response) {
                    // console.log(response);
                },
                error: function (err) {
                    // console.log(err);
                }
            });



           });
       </script> -->


       <body class="skin-default card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Elite admin</p>
            </div>
        </div>
        @include('snippets.errors')
        @include('snippets.flash')    <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <section id="wrapper">
            <div class="login-register">
                <div class="login-box card">
                    <div class="card-body">


                       <form action="{{url('hospital/login')}}" method="post" class="form-horizontal form-material" id="loginform" autocomplete="off">
                        {!! csrf_field() !!}
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="email" placeholder="email" autocomplete="off"> 
                            </div>
                            @include('snippets.errors_first', ['param' => 'email'])
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="password" placeholder="Password" autocomplete="off"> 
                            </div>
                            @include('snippets.errors_first', ['param' => 'password'])

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    <div class="ms-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock" aria-hidden="true"></i> Forgot pwd?</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Log In</button>
                            </div>

                            <a href="{{ url('hospital/register') }}" class="btn btn-primary btn-sm">Sign Up ?</a>
                        </div>

                    </form>







                    <form class="form-horizontal" id="recoverform" action="#">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg w-100 text-uppercase waves-effect waves-light" type="submit">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


















        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{asset('public/assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{asset('public/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <!--Custom JavaScript -->
        <script type="text/javascript">
            $(function() {
                $(".preloader").fadeOut();
            });
            $(function() {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>