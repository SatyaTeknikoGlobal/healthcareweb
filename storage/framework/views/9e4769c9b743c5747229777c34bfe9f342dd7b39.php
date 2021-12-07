<?php echo $__env->make('admin.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();
$old_name = (request()->has('name'))?request()->name:'';


?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Chats</h4>
      </div>
      <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Chats</li>
          </ol>
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
              <div class="chat-left-inner">
                <div class="form-material">
                  <input class="form-control p-2" type="text" placeholder="Search Contact">
                </div>
                <ul class="chatonline style-none ">
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/1.jpg')); ?>" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" class="active"><img src="<?php echo e(asset('public/assets/images/users/2.jpg')); ?>" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/3.jpg')); ?>" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/4.jpg')); ?>" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/5.jpg')); ?>" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/6.jpg')); ?>" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/7.jpg')); ?>" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/assets/images/users/8.jpg')); ?>" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                  </li>
                  <li class="p-20"></li>
                </ul>
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
              <div class="chat-rbox">
                <ul class="chat-list p-3">
                  <!--chat Row -->
                  <li>
                    <div class="chat-img"><img src="<?php echo e(asset('public/assets/images/users/1.jpg')); ?>" alt="user" /></div>
                    <div class="chat-content">
                      <h5>James Anderson</h5>
                      <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                      <div class="chat-time">10:56 am</div>
                    </div>
                  </li>
                  <!--chat Row -->
                  <li>
                    <div class="chat-img"><img src="<?php echo e(asset('public/assets/images/users/2.jpg')); ?>" alt="user" /></div>
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
                    <div class="chat-img"><img src="<?php echo e(asset('public/assets/images/users/5.jpg')); ?>" alt="user" /></div>
                  </li>
                  <!--chat Row -->
                  <li class="reverse">
                    <div class="chat-content">
                      <h5>Steave Doe</h5>
                      <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                      <div class="chat-time">10:57 am</div>
                    </div>
                    <div class="chat-img"><img src="<?php echo e(asset('public/assets/images/users/5.jpg')); ?>" alt="user" /></div>
                  </li>
                  <!--chat Row -->
                  <li>
                    <div class="chat-img"><img src="<?php echo e(asset('public/assets/images/users/3.jpg')); ?>" alt="user" /></div>
                    <div class="chat-content">
                      <h5>Angelina Rhodes</h5>
                      <div class="box bg-light-info">Well we have good budget for the project</div>
                      <div class="chat-time">11:00 am</div>
                    </div>
                  </li>
                  <!--chat Row -->
                </ul>
              </div>
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
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
      <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        <div class="r-panel-body">
          <ul id="themecolors" class="m-t-20">
            <li><b>With Light sidebar</b></li>
            <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
            <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
            <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
          </ul>
          <ul class="m-t-20 chatonline">
            <li><b>Chat option</b></li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
            </li>
            <li>
              <a href="javascript:void(0)"><img src="{{asset('public/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->
</div>


<?php echo $__env->make('admin.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/appmantr/healthcareweb.appmantra.live/resources/views/admin/chats/index.blade.php ENDPATH**/ ?>