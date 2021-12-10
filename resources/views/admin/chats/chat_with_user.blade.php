@include('admin.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();


$storage = Storage::disk('public');
$path = 'influencer/thumb/';
$roleId = Auth::guard('admin')->user()->role_id;

?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">All Admins</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Admins</li>
                    </ol>
                    @if(CustomHelper::isAllowedSection('admins' , $roleId , $type='add'))
                        <a href="{{ route($routeName.'.admins.add', ['back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                        class="fa fa-plus-circle"></i> Create New</button></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-0">
                    <!-- .chat-row -->
                    <div class="chat-main-box">
                        <!-- .chat-left-panel -->
                        <div class="chat-left-aside">
                            <div class="open-panel"><i class="ti-angle-right"></i></div>
                            <div class="chat-left-inner" style="height: 71px;">
                                <div class="form-material">
                                    <input class="form-control p-2" type="text" placeholder="Search Contact">
                                </div>
                                <ul class="chatonline style-none ps ps--theme_default ps--active-y" data-ps-id="ebaf5428-568b-1f1b-b861-a1a4b7ededc3">
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="active"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                    </li>
                                    <li class="p-20"></li>
                                    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px; height: 486px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 364px;"></div></div></ul>
                            </div>
                        </div>
                        <!-- .chat-left-panel -->
                        <!-- .chat-right-panel -->
                        <div class="chat-right-aside">
                            <div class="chat-main-header">
                                <div class="p-3 b-b">
                                    <h4 class="box-title">Chat Message</h4>
                                </div>
                            </div>
                            <div class="chat-rbox ps ps--theme_default ps--active-y" data-ps-id="e99f3cff-27e1-6e99-b1f0-e61b9db06e57">
                                <ul class="chat-list p-3" style="height: 0px;">
                                    <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h5>James Anderson</h5>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                            <div class="chat-time">10:56 am</div>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img src="../assets/images/users/2.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h5>Bianca Doe</h5>
                                            <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                            <div class="chat-time">10:57 am</div>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="reverse">
                                        <div class="chat-content">
                                            <h5>Steave Doe</h5>
                                            <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                            <div class="chat-time">10:57 am</div>
                                        </div>
                                        <div class="chat-img"><img src="../assets/images/users/5.jpg" alt="user"></div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="reverse">
                                        <div class="chat-content">
                                            <h5>Steave Doe</h5>
                                            <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                            <div class="chat-time">10:57 am</div>
                                        </div>
                                        <div class="chat-img"><img src="../assets/images/users/5.jpg" alt="user"></div>
                                    </li>
                                    <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img src="../assets/images/users/3.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h5>Angelina Rhodes</h5>
                                            <div class="box bg-light-info">Well we have good budget for the project</div>
                                            <div class="chat-time">11:00 am</div>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                                <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: -376px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 376px; right: 0px; height: 32px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 17px; height: 1px;"></div></div></div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea placeholder="Type your message here" class="form-control border-0"></textarea>
                                    </div>
                                    <div class="col-4 text-end">
                                        <button type="button" class="btn btn-info btn-circle btn-lg text-white"><i class="fas fa-paper-plane"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .chat-right-panel -->
                    </div>
                    <!-- /.chat-row -->
                </div>
            </div>
        </div>


    </div>
</div>







@include('admin.common.footer')