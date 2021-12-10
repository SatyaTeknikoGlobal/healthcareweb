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
    <title>Hospital Registration</title>
   
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




        <link href="{{asset('public/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('public/assets/dist/css/style.min.css')}}" rel="stylesheet">





    <!-- Dashboard 1 Page CSS -->
  <style>
    
    .register-box{

      width : 800px;
      margin : 0 auto;
     
    }

    .register{

       margin-top :20px;
    }
  </style>  



</head>







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

    <?php

      $states = DB::table('states')->where('status','1')->get();


    ?>
    <section id="wrapper">
        <div class="register">
            <div class="register-box card">

                <div class="card-header">
                  
                    <h3 class="text-center m-b-20">Sign  Up </h3>
                </div>
                <div class="card-body">
                            

                    <form action="{{url('hospital/register')}}" method="post">
                {!! csrf_field() !!}
                <div class="login-form">

                  <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="" placeholder="Enter Name">
                   
                      @include('snippets.errors_first', ['param' => 'name'])
                    </div>

                     <div class="form-group">
                        <label>Email</label>

                        <input class="form-control" id="email" name="email" type="text" placeholder="Enter Email" autocomplete="off">

                        @include('snippets.errors_first', ['param' => 'email'])

                      </div>

                     

                       <div class="form-group">
                        <label>Phone</label>

                        <input class="form-control" id="phone" name="phone" type="text" placeholder="Enter phone" autocomplete="off">

                        @include('snippets.errors_first', ['param' => 'phone'])

                      </div>

                      

                      <div class="row form-group">

                        <div class="col-md-6">
                            
                             <label>Choose State</label>
                            <select name="state_id" class="form-control" id="state_id">
                              <option value="" selected disabled>Select State</option>
                              <?php if(!empty($states)){
                                foreach($states as $state){?>
                                  <option value="{{$state->id}}">{{$state->name}}</option>
                                <?php }}?>
                            </select>
                              @include('snippets.errors_first', ['param' => 'state_id'])

                        </div>

                        <div class="col-md-6">
                              
                              <label>Choose City</label>
                             <select name="city_id" class="form-control" id="city_id">
                              <option value="" selected disabled>Select City</option>

                            </select>
                            @include('snippets.errors_first', ['param' => 'city_id'])

                        </div>
                       

                      
                      </div>


                     <!--  <div class="form-group">
                        
                      </div> -->


                      <div class="row form-group">

                          <div class="col-md-6">
                              
                              <label>Choose Location</label>
                             <select name="location" class="form-control" id="location">
                              <option value="" selected disabled>Select Location</option>

                            </select>
                            @include('snippets.errors_first', ['param' => 'location'])

                        </div>

                        <div class="col-md-6">
                              
                              <label>Pincode</label>
                              <input type="number" name="locality_id" id="locality_id"  class="form-control" value="" placeholder="Enter Pincode">
                            @include('snippets.errors_first', ['param' => 'locality_id'])

                        </div>
                       

                      
                      </div>
                  

                    <div class="form-group">
                        <label>Upload Image</label>

                        <input class="form-control" id="image" name="image" type="file">

                        @include('snippets.errors_first', ['param' => 'image'])

                    </div>

                    

                       <div class="form-group">
                            
                             <label>Choose Speciality</label>
                            <select multiple name="hos_specialities[]" class="form-control select2" id="hos_specialities" >
                              <?php 

                              $specialityArr =[];
                                // if(!empty($speciality)){

                                // $specialityArr = explode(",", $speciality);
                                // }

                             $specialities =  App\Speciality::where('status', '1')->get();
                              if(!empty($specialities)){
                                foreach($specialities as $speciality){?>
                                  <option value="{{$speciality->id}}" <?php if(in_array($speciality->id, $specialityArr)) echo "selected";?>>{{$speciality->name}}</option>
                                <?php }}?>
                            </select>
                              @include('snippets.errors_first', ['param' => 'hos_specialities'])

                        </div>





                      

                      <div class="form-group">
                        <div class="col-md-12"><button type="submit" class="btn btn-primary btn-block">Submit</button></div>


                        <div class="col-12"><a href="{{url('hospital/login')}}">Already Have An Account</a></div>


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

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 -->





<script src="{{asset('public/assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('public/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('public/assets/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('public/assets/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('public/assets/dist/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('public/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('public/assets/dist/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('public/assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/assets/node_modules/dff/dff.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('public/assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>
    <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>


















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

    <script type="text/javascript">

   


 $('#state_id').on('change', function()
 {

    var _token = '{{ csrf_token() }}';
    var state_id = $('#state_id').val();
    $.ajax({
      url: "{{ route('get_city') }}",
      type: "POST",
      data: {state_id:state_id},
      dataType:"HTML",
      headers:{'X-CSRF-TOKEN': _token},
      cache: false,
      success: function(resp){
         $('#city_id').html(resp);
     }
 });
});


 $('#city_id').on('change', function()
 {

    var _token = '{{ csrf_token() }}';
    var city_id = $('#city_id').val();


    $.ajax({
      url: "{{ route('get_locality') }}",
      type: "POST",
      data: {city_id:city_id},
      dataType:"HTML",
      headers:{'X-CSRF-TOKEN': _token},
      cache: false,
      success: function(resp){
         $('#location').html(resp);
     }
 });
});
</script>
    
</body>

</html>