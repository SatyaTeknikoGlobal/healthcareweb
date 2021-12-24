<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title ?? ''}}</title>
  <!-- Bootstrap -->
  <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/assets/css/owlcarousel/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/assets/css/owlcarousel/owl.theme.default.min.css')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!--  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Rubik,wght@0,300;1,300&display=swap"
    rel="stylesheet"> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAifUHhaw-NrwG8UNMSuzC1sNTftvyMOio" type="text/javascript"></script>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  

</head>
<script type="text/javascript">

  //var code = geoip_country_code();


  // function googleTranslateElementInit(){
  //   new google.translate.TranslateElement({pageLanguage: code}, 'google_element');

  //   //new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_element');
  // }


  function googleTranslateElementInit() {

    $.getJSON("https://justmyip.org/api",function(result){
      console.dir(result);
            // country_code = result.geo.country_code.toLowerCase();
            country_code = 'hi';
            new google.translate.TranslateElement({
              pageLanguage: country_code
            }, 'google_element');

          });
  }





</script>

<style type="text/css">
  .goog-logo-link {
    display:none !important;
  }
/* 
.goog-te-banner-frame.skiptranslate {
display: none !important;
} 
.new{
  top: 0px!important;
}*/
.goog-te-gadget {line-height: 2px !important;color: transparent;}

select{
  width: 150px;
  height: 30px;
  padding: 5px;
  color: green;
}
select option { color: black; }
select option:first-child{
  color: green;
}

.bottom-header{
  padding: 7px 15px;
}


</style>
<body>


    <!--Header Section Start-->

    <?php /*
    <header id="header" data-spy="affix" data-offset-top="60" data-offset-bottom="60">
      <div class="top-header">
        <div class="container-fluid">
          <div class="row head-top justify-content-between">
            <ul class="d-flex justify-content-between align-items-center">
              <li><i class="fa fa-phone"></i>Contact Number : 090 98763456</li>
              <li><i class="fa fa-map-marker"></i>Location : 512,5th Floor,Kailash Building,26 K G Marg,Connaught Place,New Delhi-110001</li>
            </ul>
            <ul class="d-flex justify-content-between align-items-center">
              <li>Mon - Fri : 09:00 AM to 05:00 PM</li>
              <li>
               <div id="google_element">
               </div>
             </li>
           </ul>
         </div>
       </div>
     </div>
     <div class="container">
      <!-- <div class="row">
        <div class="col-md-12  col-sm-12 col-xs-12 col-sm-12"> -->
          <nav class="navbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle
              navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
              class="icon-bar"></span> </button>
              <a class="navbar-brand" href="{{route('home')}}">

                Get Cured In India Private Limited
                <!-- 
                <img class="logo-dark hidden-xs" src="{{asset('public/assets/images/logonew.jpg')}}"
                alt="" /> 


                <img class="logo-dark hidden-lg hidden-md hidden-sm" src="{{asset('public/assets/images/logonew.jpg')}}"
                alt="" /> -->


              </a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="main-menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                  <li><a href="">Department</a></li>
                  <li><a href="">Specialty Clinic
                  </a></li>
                  <li><a href="">About Us</a></li>
                  <li>
                    <a href="#" class="theme-color"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                      Book an Appointments
                    </a>

                  </li>

                  <?php if(empty(auth()->guard('appusers')->user())){?>
                    <li class=" btn btn-primary btn-skin" style="margin-top:-8px;"><a href="{{route('home.login')}}"
                      class="login-btn">Login/Singup</a>
                    </li>
                  <?php }else{?>
                    <li role="presentation" class="">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                      aria-haspopup="true" aria-expanded="true"> <img src="{{asset('public/assets/images/doctor.jpg')}}"
                      alt="" class="profile"> Profile </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="{{route('home.profile')}}"><i class="fa fa-columns mr-3"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-columns mr-3"></i><span>My Booking</span></a>
                        </li>
                        <li>
                          <a href="#"><i
                            class="fa fa-calendar mr-3"></i><span>Appointments</span></a>
                          </li>
                        
                          <li><a href="{{route('home.logout')}}"><span>
                            <i class="fa fa-sign-out mr-3"></i>Logout
                          </span></a>
                        </li>


                      </ul>
                    </li>

                  <?php }?>

                </ul>
                
              </div>
              <!-- /.navbar-collapse -->
            </nav>
          </div>
         
        <!-- </div>
      </div> -->
      <!-- /.container -->
    </header>

    */ ?>

    <header id="header" data-spy="affix" data-offset-top="60" data-offset-bottom="60" class="affix-top">
      <div class="top-header">
        <div class="container-fluid">
          <div class="row head-top justify-content-between">
            <ul class="d-flex justify-content-between align-items-center">
              <li class="hidden-xs hidden-sm"><i class="fa fa-phone"></i>  <span>Contact Number:</span> 090 98763456</li>
              <li class="hidden-xs hidden-sm"><i class="fa fa-map-marker"></i> <span>Location: </span> 512,5th Floor,Kailash Building,26 K G Marg,Connaught Place,New Delhi-110001</li>
            </ul>
            <ul class="d-flex justify-content-between align-items-center">
              <li class="hidden-xs hidden-sm">Mon - Fri : 09:00 AM to 05:00 PM</li>
               <li class="hidden-md hidden-lg">Choose Language</li>
              <li>
               
                <div id="google_element">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bottom-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3  col-xs-6 col-sm-6">
            <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed mr-5" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false" id="hamburger-menu">
              <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
              class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="{{route('home')}}">Get Cured In <br> India Private Limited</a>
            </div>
                        <!--  <ul class="right-contact">
            <li><i class="fa fa-phone" aria-hidden="true"></i> +91 8107186985</li>
            <li><a href="#" class="btn btn-primary btn-skin">Get Free Quote</a></li>
          </ul> -->
        </div>
        <div class="col-md-9  col-sm-6 col-xs-6">
          <nav class="navbar">
            <!-- Brand and toggle get grouped for better mobile display -->


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-menu collapse56 navbar-collapse56" id="bs-example-navbar-collapse-18">
              <div id="side-nav">
                <ul class="nav navbar-nav">
                  <div class="single-sidebar">
                    <div id="close" class="hide">×</div>

                    <div class="widget-profile pro-widget-content px-5  hidden-lg hidden-md hidden-sm" style="background-image: aliceblue;">
                      <div class="profile-info-widget"><a class="booking-doc-img" href=""
                        alt="User">
                        <img src="{{asset('public/assets/images/user2.jpg')}}" alt="">
                      </a>
                     <div class="profile-det-info text-left">
                                        <h3><i class="fa fa-user theme-color mr-3" aria-hidden="true"></i> mansha</h3>
                                        <h3> <i class="fa fa-envelope mr-3  theme-color" aria-hidden="true"></i> manshaman.sharma93@gmail.com</h3>
                                        <h3><i class="fa fa-phone mr-3 theme-color"></i> 7557448060</h3>
                                    </div>
                    </div>

                  </div>



                  <li><a href="">Department</a></li>
                  <li><a href="">Find a Doctor</a> </li>
                  <li><a href="">Blogs</a></li>
                  <li><a href="">My Reports</a></li>



                  <li><a href="">Specialty Clinic
                  </a></li>

                  <li><a href="">About Us</a></li>

                  <li>
                    <a href="appointment.html" class="theme-color"><i class="fa fa-file-text" aria-hidden="true"></i>
                      Book an Appointments
                    </a>

                  </li>

                  
                  <ul class="categories clearfix  hidden-lg hidden-md hidden-sm">
                    <li><a href="profile.html"><i class="fa fa-columns mr-3"></i>
                    Dashboard</a></li>
                    <li><a href=""> <i class="fa fa-calendar mr-3"></i> Prescription </a>
                    </li>
                    <li><a href=""><i class="fa fa-user mr-3"></i> My Doctors</a></li>
                    <li><a href="new_booking.html"><i class="fa fa-columns mr-3"></i> New
                    Booking</a></li>
                    <li><a href=""><i class="fa fa-columns mr-3"></i> Booking History</a>
                    </li>
                    <li><a href=""><i class="fas fa-notes-medical mr-3"></i>Medical
                    Records</a></li>
                    <li><a href=""><i class="fas fa-notes-medical mr-3"></i>My Shortlisted
                    Hospitals</a>
                  </li>
                  <li><a href=""><i class="fas fa-notes-medical mr-3"></i>Chat With
                  Admin</a></li>
                  <li><a href=""><i class="fa fa-file-invoice mr-3"></i>Payment
                  History</a></li>
                </ul>
              </div>




            </ul>
          </div>

        </div>
        <!-- /.navbar-collapse -->

        <ul class="right-contact">
         <?php if(empty(auth()->guard('appusers')->user())){?>
                                        <li class=" btn btn-primary btn-skin" style="margin-top:-8px;"><a href="{{route('home.login')}}"
                                          class="login-btn"> <i class="fa fa-sign-out"></i> Login</a>
                                        </li>
                                      <?php }else{?>
                                        <li role="presentation" class=" hidden-xs ">
                                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                          aria-haspopup="true" aria-expanded="true"> <img src="{{asset('public/assets/images/doctor.jpg')}}"
                                          alt="" class="profile">  </a>
                                          <ul class="dropdown-menu">
                                            <li class="mr-0">
                                              <a href="{{route('home.profile')}}"><i class="fa fa-columns mr-3"></i><span>Dashboard</span></a>
                                            </li>
                                            <li>
                                              <a href="#"><i class="fa fa-columns mr-3"></i><span>My Booking</span></a>
                                            </li>
                                            <li>
                                              <a href="#"><i
                                                class="fa fa-calendar mr-3"></i><span>Appointments</span></a>
                                              </li>
                                              
                                              <li><a href="{{route('home.logout')}}"><span>
                                                <i class="fa fa-sign-out mr-3"></i>Logout
                                              </span></a>
                                            </li>


                                          </ul>
                                        </li>

                                      <?php }?>


                                      
                                    </ul>
                                  </nav>
                                </div>

                              </div>
                            </div>
                          </div>
                            <!-- /.container -->
                          </header>

                          <div id="wrapper">

