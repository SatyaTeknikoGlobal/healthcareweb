<style type="text/css">

</style>
<?php 
$url = url()->current();


$baseurl = url('/');



?>



   <div class="col-md-3 col-sm-4 col-xs-12 profile-sidebar">
                        <div class="single-sidebar">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget"><a class="booking-doc-img"  alt="User">
                                    <img src="{{asset('public/assets/images/user2.jpg')}}" alt="">
                                    </a>
                                    <div class="profile-det-info text-center">
                                        <h3>{{auth()->guard('appusers')->user()->name ?? ''}}</h3>
                                        <h3>{{auth()->guard('appusers')->user()->email ?? ''}}</h3>
                                        <h3>{{auth()->guard('appusers')->user()->phone ?? ''}}</h3>
                                    </div>
                                </div>
                            </div>

                            <ul class="categories clearfix">
                                <li class="<?php if($url == $baseurl.'/profile') echo "single-sidebar-active"?>"><a href="{{route('home.profile')}}"><i class="fa fa-columns mr-3"></i> Dashboard</a></li>

                                <li><a href=""> <i class="fa fa-calendar mr-3"></i> Prescription </a></li>

                                <li><a href=""><i class="fa fa-user mr-3"></i> My Doctors</a></li>

                                <li class="<?php if($url == $baseurl.'/new-booking') echo "single-sidebar-active"?>"><a href="{{route('home.new_booking')}}"><i class="fa fa-columns mr-3"></i> New Booking</a></li>

                                <li class="<?php if($url == $baseurl.'/booking-history') echo "single-sidebar-active"?>"><a href="{{route('home.booking_history')}}"><i class="fa fa-columns mr-3"></i>Booking History</a></li>

                                <li><a href=""><i class="fas fa-notes-medical mr-3"></i>Medical Records</a></li>

                                <li class="<?php if($url == $baseurl.'/shortlisted-hospital') echo "single-sidebar-active"?>"><a href="{{route('home.shortlisted_hospital')}}"><i class="fas fa-notes-medical mr-3"></i>My Shortlisted Hospitals</a></li>

                                <li class="<?php if($url == $baseurl.'/chat-with-admin') echo "single-sidebar-active"?>"><a href="{{route('home.chat_with_admin')}}"><i class="fas fa-notes-medical mr-3"></i>Chat With Admin</a></li>

                                <li class="<?php if($url == $baseurl.'/payment-history') echo "single-sidebar-active"?>"><a href="{{route('home.payment_history')}}"><i class="fa fa-file-invoice mr-3"></i>Payment History</a></li>

                                 <li class="<?php if($url == $baseurl.'/change-password') echo "single-sidebar-active"?>"><a href="{{route('home.change_password')}}"><i class="fa fa-file-invoice mr-3"></i>Change Password</a></li>

                                 <li><a href="{{route('home.logout')}}"><i class="fa fa-sign-out mr-3"></i>Logout</a></li>


                            </ul>
                        </div>

                    </div>

