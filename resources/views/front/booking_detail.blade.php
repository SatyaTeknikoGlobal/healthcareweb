@include('front.common.header')

    <style>
        .pro-content {
            padding: 15px 0 0;
            height: 180px;
        }

        .profile-widget .rating i {
            font-size: 14px;
        }

        .view-btn:hover,
        .view-btn:focus {
            background-color: #f97d09 !important;
            color: #fff;
        }

        .view-btn {
            color: #f97d09 !important;
            font-size: 13px;
            border: 2px solid #f97d09 !important;
            text-align: center;
            display: block;
            font-weight: 500;
            padding: 6px;
        }

        .book-btn {
            background-color: #f97d09 !important;
            border: 2px solid #f97d09 !important;
            color: #fff;
            font-size: 13px;
            text-align: center;
            display: block;
            font-weight: 500;
            padding: 6px;
        }

        .available-info {
            font-size: 13px;
            color: #757575;
            font-weight: 400;
            list-style: none;
            padding: 0;
            margin-bottom: 15px;
        }

        .profile-widget p.speciality {
            font-size: 16px;
            color: #757575;
            margin-bottom: 5px;
            min-height: 40px;

        }

        .available-info li {
            margin-bottom: 10px;
            overflow: hidden;
                text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    display: -webkit-box;
    -webkit-line-clamp: 2;
        }

        .available-info li i {
            width: 22px;
            color: #f97d09 !important;
            font-weight: normal;
        }

        .doc-img {
            position: relative;
            overflow: hidden;
            z-index: 0;
            border-radius: 4px;
            padding: 22px 0 0px;
        }
        .doc-img i{
                position: absolute;
    bottom:  15%;
    z-index: 99;
    right: 4%;
    font-size: 28px;
    color: #fff;
        }

        .pro-card{
            transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
            transform: translateY(0);
            border-radius: 8px;
            padding: 0 24px 22px;
        }
   /*     .pro-card:hover{
            transform: translateY(-10px);
        }
*/
        .profile-widget .fav-btn {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #fff;
            width: 30px;
            height: 30px;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            justify-content: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            border-radius: 3px;
            color: #2e3842;
            -webkit-transform: translate3d(100%, 0, 0);
            -ms-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            opacity: 0;
            visibility: hidden;
            z-index: 99;
        }

        .profile-widget:hover .fav-btn {
            opacity: 1;
            visibility: visible;
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .doc-img img {
            border-radius: 4px;
            height: 200px !important;
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            transform: translateZ(0);
            -moz-transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
            -ms-transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
            -o-transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
            -webkit-transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
            transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
            width: 100%;
        }

        .profile-widget .fav-btn {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #fff;
            width: 30px;
            height: 30px;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            justify-content: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            border-radius: 3px;
            color: #2e3842;
            -webkit-transform: translate3d(100%, 0, 0);
            -ms-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            opacity: 0;
            visibility: hidden;
            z-index: 99;
        }

        .profile-widget .pro-content .title a {
            display: inline-block;
        }

        .profile-widget {
            background-color: #fff;
            /* border: 1px solid #f0f0f0; */
            border-radius: 4px;
            /* margin-bottom: 30px; */
            position: relative;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            /* padding: 15px; */
        }

        .doc-img:hover img {
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            transform: scale(1.0);
        }

        .profile-widget .verified {
            color: #28a745;
            margin-left: 3px;
        }

        .booking-doc-info {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .booking-doc-info .booking-doc-img {
            width: 80px;
            margin-right: 15px;
            overflow: hidden;
            height: 80px;
        }

        .booking-doc-info .booking-doc-img img {
            border-radius: 4px;
            height: 80px !important;
            width: 80px !important;
            object-fit: cover;
        }

        .rating {
            list-style: none;
            margin: 0 0 7px;
            padding: 0;
            width: 100%;
        }

        .rating i.filled {
            color: #f4c150;
        }

        .rating i {
            color: #dedfe0;
        }

        .text-muted {
            color: #757575 !important;
        }

        .booking-detail {
            width: 87%;
            margin-left: auto;
            margin-right: auto;

        }

        .login-right h3 {

            font-size: 27px;
            text-align: center;
            margin-bottom: 20px;

        }

        .booking-detail h2 {
            font-size: 25px;
        }

        .booking-detail h4 {
            font-size: 16px;
            margin-bottom: 14px;
            color: #000;
            line-height: 24px;
        }

        .booking-detail h4 b {
           /* font-weight: bold;*/
        }
      
      

        .booking-detail h4 b i {
            color: #043571a3;
            margin-left: -29px;
        }

        .name-id {
            display: flex;

          
        }
        .panel-heading{
            text-align: center;
        }
        .tag{
        	/*margin-left:70px;*/
        }

        @media screen and (max-width:768px) {

            .name-id {
                display: block;
            }

            .booking-detail {
                width: auto;
            }

            .booking-detail h4 {
                line-height: 26px;
            }
              .tag{
        	margin-left:0px;width: fit-content;
        }
       


        }


        .tooltip {
    position: relative;
    display: inline-block;
  

    opacity: 1 !important;
  }
  .card,
  .doc-img{
  	overflow:  visible;
  }
  
  .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 10px 5px;
    position: absolute;
       z-index: 1050;
    right: 28px;
    top: 0;
        font-size: 13px;
    line-height: 13px;
    font-weight: 200;
  }
  
  .tooltip:hover .tooltiptext {
    visibility: visible;
  }
/*        @media (min-width: 576px){
.container, .container-sm {
    max-width: 651px !important;
}
}*/
    </style>
<?php

$user = Auth::guard('appusers')->user();






?>
        <div id="page_title">
            <div class="container text-center">
                <div class="panel-heading">Booking Detail</div>
                <ol class="breadcrumb">
                    <li><a href="{{route('home.dashboard')}}">Home</a></li>
                    <li class="active">Booking Detail</li>
                </ol>
            </div>
        </div>
        <section class="profile-sec">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card login-right p-5">
                            <h3 class="login-header panel-heading">Your Booking Details</h3>
                            <div class="row text-left booking-detail">
                                <div class="col-md-12 name-id mb-5 mt-3">
                                    <h2>{{$user->name ?? ''}}</h2>

                                    <h4 style="margin-left: auto;color: #043571eb;font-weight: 600;"> <i class="fas fa-id-card mr-3"></i>
                                        Booking ID: {{$details->unique_id}}</h4>
                                </div>                                
                                <div class="col-md-6">
                                    <h4 class="tag"><b><i class="fa fa-envelope mr-3" aria-hidden="true"></i> Email:</b>
                                      <span> {{$user->email ?? ''}} </span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><b><i class="fa fa-phone mr-3" aria-hidden="true"></i> Mobile No.:</b> <span> 
                                        {{$user->phone ?? ''}} </span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4  class="tag"><b><i class="fas fa-globe-asia mr-3"></i> Country:</b> <span> {{$country->name ?? ''}} </span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><b><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> State:</b> <span> 
                                        {{$state->name ?? ''}} </span></h4>
                                </div>

                                <div class="col-md-6">
                                    <h4><b><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> City:</b> <span> 
                                        {{$city->name ?? ''}} </span></h4>
                                </div>

                                <div class="col-md-6">
                                    <h4  class="tag"><b><i class="fa fa-file-invoice mr-3"></i> Registered For:</b> <span> {{$details->register_for ?? ''}} </span></h4>
                                </div>

                                <div class="col-md-6">
                                    <h4><b><i class="fas fa-stethoscope mr-3"></i> Disease:</b> <span> {{$disease->name ?? ''}} </span></h4>
                                </div>
                               
                                <div class="col-md-12">
                                    <h4><b><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> Address:</b> <span> {{$details->address ?? ''}} </span></h4>
                                </div>
                                <div class="col-md-12">
                                    <h4 class="tag"><b><i class="fas fa-file-medical mr-3"></i> Description:</b> <span> {{$details->description ?? ''}} </span></h4>
                                </div>
                               
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row my-5">
                    <div class="col-md-12">
                        <h3 class="login-header panel-heading mb-5">Assigned Hospitals</h3>

                    <?php 

                    foreach($assign_hospitals as $assign_hos)
                    {
                        $hospital = App\Hospital::where('id',$assign_hos->hospital_id)->first();
                        $specialities = App\Speciality::select('id','name')->where('id', $hospital->hos_specialities)->get();
                        $state = App\State::select('id','name')->where('id',$hospital->state_id)->first();
                        $city = App\City::select('id','name')->where('id',$hospital->city_id)->first();
                        $health_package = App\HealthPackages::select('id','package_name')->where('included_hos_ids',$hospital->id)->get();

                    ?>
                         
                         <div class="col-md-4 my-5 col-xs-12 col-sm-6">
                            <div class="card pro-card">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a>

                                            <?php if(!empty($hospital->image)){ ?>

                                                 <img class="img-fluid" alt="User " src="{{asset('/storage/app/public/hospital/'.$hospital->image)}}">

                                            <?php }else{ ?>
                                            <img class="img-fluid" alt="User " src="{{asset('/storage/app/public/hospital/defaulthos.png')}}">
                                        <?php } ?>

                                        <form action="{{ route('home.create_shortlist_hos') }}" method="post" id="short_listhos">
                                            @csrf
                                            <div  onclick="short_list_hos({{$assign_hos->id}})">

                                            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                             <input type="hidden" name="booking_id" id="booking_id" value="{{$details->id}}">
                                             <input type="hidden" name="hospital_id" id="hospital_id" value="{{$assign_hos->id}}">

                                           <!--  <div onclick="short_list_host()"> -->
                                                 
                                                                                              
                                                <i class="fas fa-heart tooltip short_btn" role="button" tabindex="0" id="short_btn{{$assign_hos->id}}">
                                                     <span class="tooltiptext">Are you want shortlist</span>
                                                </i>                                                  
                                            </div>                                    

                                        </form>
                                                                                     
                                        </a>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">{{$hospital->name}}<i class="fas fa-check-circle verified"></i>
                                        </h3>

                                         <?php foreach($specialities as $speciality){  ?>
                                        <p class="speciality">{{$speciality->name}}</p>        
                                      
                                        <?php } ?>
                                     
                                        <ul class="available-info">
                                            <li><i class="fas fa-map-marker-alt"></i>{{$city->name ?? ''}}&nbsp;&nbsp;{{$state->name ?? ''}}</li>                                     
                                            <?php foreach($health_package as $hp){ ?>
                                            <li><i class="far fa-money-bill-alt"></i>{{$hp->package_name}}</li>
                                        <?php } ?>
                                        </ul>
                                        <div class="row row-sm">
                                        
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php } ?>
                    
                    </div>

                </div>

                <!-- <div class="row hospital_details">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">header</div>
                        </div>
                    </div>
                </div>

 -->
            </div>
        </section>

@include('front.common.footer')

<script>

    // function short_list_hos(hospital_id)
    // {
        
    //   var icon = document.getElementById("short_btn"+hospital_id);  
    //      alert('hospital_id = '+hospital_id);
    //      alert('user_id = '+user_id);
    //   var classActive = $("#short_btn"+hospital_id).addClass('active');
    //   icon.style.color = '#FF0000';
    //   if( $("short_btn"+hospital_id).hasClass('active'))
    //   {
    //     alert('true');

    //   }
       

    // }

    

    function short_list_hos(hospital_id)
    {  
      //var icon = document.getElementById("short_btn"+hospital_id);   
      var icon = $("#short_btn"+hospital_id);
      var diiv = icon.parents().eq(8);

      console.log(diiv);

      diiv:gt(8).hide();

      //diiv.hide();
      // document.getElementById('short_listhos').submit(); 
        
    }
   
    $(document).ready(function() {

         $('#hospital_details').delay(3000).hide();
    //$('#targetDiv').delay(3000).hide();
});
  
        
  


</script>