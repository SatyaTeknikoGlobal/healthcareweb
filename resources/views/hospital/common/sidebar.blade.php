<?php 
$HOSADMIN_ROUTE_NAME = CustomHelper::getHospitalRouteName();

$url = url()->current();
// echo $url;

$baseurl = url('/');


$roleId = Auth::guard('hospital')->user()->role_id; 

?>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{asset('public/assets/images/users/1.jpg')}}" alt="user-img" class="img-circle"><span class="hide-menu">{{Auth::guard('hospital')->user()->name ?? ''}}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('hospital.profile') }}"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="{{ route('hospital.logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>


                <li> <a class="waves-effect waves-dark" href="{{route('hospital.home')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>


                @if(CustomHelper::isHosAllowedModule('leads'))
                  
                    <li> <a class="waves-effect waves-dark" href="{{ route($HOSADMIN_ROUTE_NAME.'.leads.index') }}" aria-expanded="false"><i class="fa fa-rocket" aria-hidden="true"></i><span class="hide-menu">Leads</span></a>
                    </li>
                 
                @endif


                @if(CustomHelper::isHosAllowedModule('health_packages'))
                    <li> <a class="waves-effect waves-dark" href="{{ route($HOSADMIN_ROUTE_NAME.'.health_packages.index') }}" aria-expanded="false"><i class="fa fa-rocket" aria-hidden="true"></i><span class="hide-menu">Health Packages</span></a>
                    </li>
                  
                @endif



                @if(CustomHelper::isHosAllowedModule('hotels'))
                    <li> <a class="waves-effect waves-dark" href="{{ route($HOSADMIN_ROUTE_NAME.'.hotels.index') }}" aria-expanded="false"><i class="fa fa-hotel" aria-hidden="true"></i><span class="hide-menu">Health Packages</span></a>
                    </li>
                @endif


             

</ul>
</nav>
<!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>