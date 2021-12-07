@include('admin.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();


$storage = Storage::disk('public');
$path = 'influencer/thumb/';
$roleId = Auth::guard('admin')->user()->role_id;

?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Hospital Profile({{$hospital->name  ?? ''}})</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Hospital Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        @include('snippets.errors')
        @include('snippets.flash')
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">

                        <center class="m-t-30"> <img onclick="getFile()" src="{{asset('public/assets/images/users/5.jpg')}}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">{{$hospital->name  ?? ''}}</h4>

                        </center>

                        <form id="upload_file" action="{{route($routeName.'.hospitals.upload_profile')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input id="upfile" type="file" id="file" name="file" onchange="getval();" />
                        </form>


                    </div>
                    <div>
                        <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{$hospital->email ?? ''}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{$hospital->phone ?? ''}}</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>{{$hospital->location ?? ''}}</h6>
                            <div class="map-box">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div> <small class="text-muted p-t-30 db">Social Profile</small>
                            <br/>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#gallery" role="tab">Gallery</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#roles" role="tab">Roles</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#users" role="tab">Users</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="gallery" role="tabpanel">
                                <div class="card-body">
                                    <div class="sl-item">
                                        <div class="row">
                                            <form method="post" action="{{route('admin.hospitals.upload_gallery')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                              {{ csrf_field() }}

                                              <input type="hidden" name="hospital_id" value="{{$hospital->id}}">

                                              <div class="col-lg-6 col-md-12 m-b-20">
                                                <input type="file" class="form-control" name="images[]" multiple>
                                            </div>
                                            <div class="col-lg-6 col-md-12 m-b-20">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="sl-right">
                                        <div class="row">
                                            <?php if(!empty($galleries) && count($galleries) > 0){
                                                $storage = Storage::disk('public');
                                                $path = 'hospital_gallery/';
                                                foreach($galleries as $gallery){
                                                    $image_id = $gallery->id;
                                                    $image_name = $gallery->image;
                                                    if($storage->exists($path.$image_name)){
                                                        ?>
                                                        <div class="col-lg-3 col-md-12 m-b-20"><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url('public/storage/'.$path.$image_name) }}"><img src="{{ url('public/storage/'.$path.$image_name) }}" class="img-responsive radius" /></a></div>

                                                        <div class="col-lg-1 col-md-12 m-b-20"><a href="{{route('admin.hospitals.delete_gallery',['id'=>$gallery->id])}}" onclick="return confirm('Are You Want to Delete')" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a></div>

                                                    <?php }}}else{?>


                                                        <p>No Image Found</p>

                                                    <?php }?>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">Johnathan Deo</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">(123) 456 7890</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">johnathan@admin.com</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">London</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select Country</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line">
                                                        <option>London</option>
                                                        <option>India</option>
                                                        <option>Usa</option>
                                                        <option>Canada</option>
                                                        <option>Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success text-white">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="roles" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 b-r pull-right">
                                                <button class="btn btn-primary" id="add_role">Add</button>
                                            </div>
                                            <form action="{{route('admin.hospitals.add_role')}}" method="post" id="add_role_form">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="hospital_id" value="{{$hospital->id}}">
                                              <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Role Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter Role Name" name="role_name" value="{{ old('role_name') }}">
                                                @include('snippets.errors_first', ['param' => 'role_name'])
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1" class="form-label">Status</label>
                                                <br>
                                                Active: <input type="radio" name="status" value="1"checked>
                                                &nbsp;
                                                Inactive: <input type="radio" name="status" value="0" >
                                                @include('snippets.errors_first', ['param' => 'status'])
                                            </div>
                                            <button class="btn btn-primary" type="submit">Submit</button>

                                        </form>

                                        <div class="col-md-12 col-xs-12 b-r">
                                           <h4 class="card-title">Roles</h4>
                                           <div class="table-responsive">
                                            <table id="myTable1" class="table display table-striped border no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#ID</th>
                                                        <th scope="col">Role Name</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Date Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($roles)){
                                                        foreach($roles as $role){
                                                            ?>
                                                            <tr>
                                                                <td>{{$role->id}}</td>
                                                                <td>{{$role->role_name}}</td>
                                                                <td>
                                                                    <div class="switchery-demo m-b-30">
                                                                        <input type="checkbox" <?php if($role->status == 1) echo "checked";?> data-size="small" class="js-switch" data-color="#009efb" onchange="update_role_status({{$role->id}},this)" />
                                                                    </div>
                                                                </div>


                                                            </td>
                                                            <td>{{date('d M Y',strtotime($role->created_at))}}</td>
                                                            <td>
                                                                <a href="{{route('admin.hospitals.delete_role',['role_id'=>$role->id])}}" onclick="return confirm('Are You Want to Delete')" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                                            </td>

                                                        </tr>

                                                    <?php }}?>

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="users" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 b-r pull-right">
                                        <button class="btn btn-primary" id="add_user">Add</button>
                                    </div>
                                    <form action="{{route('admin.hospitals.add_user')}}" method="post" id="add_user_form">
                                     {{ csrf_field() }}

                                     <input type="hidden" name="hospital_id" value="{{$hospital->id}}">

                                     <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Role Name</label>
                                        <select class="form-control" name="role_id">
                                            <option value="" selected disabled>Select Role</option>
                                            <?php if(!empty($roles)){
                                                foreach($roles as $role){
                                                    ?>
                                                    <option value="{{$role->id}}">{{$role->role_name}}</option>

                                                <?php }}?>
                                            </select>
                                            @include('snippets.errors_first', ['param' => 'name'])
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label"> Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name" name="name" value="{{ old('name') }}">
                                            @include('snippets.errors_first', ['param' => 'name'])
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                                            @include('snippets.errors_first', ['param' => 'email'])
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
                                            @include('snippets.errors_first', ['param' => 'phone'])
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="password" value="{{ old('password') }}">
                                            @include('snippets.errors_first', ['param' => 'password'])
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Status</label>
                                            <br>
                                            Active: <input type="radio" name="status" value="1" checked >
                                            Inactive: <input type="radio" name="status" value="0">

                                            @include('snippets.errors_first', ['param' => 'featured'])
                                            @include('snippets.errors_first', ['param' => 'phone'])
                                        </div>




                                        <button class="btn btn-primary" type="submit">Submit</button>

                                    </form>

                                    <div class="col-md-12 col-xs-12 b-r">
                                       <h4 class="card-title">All Users</h4>
                                       <div class="table-responsive">
                                        <table id="myTable" class="table display table-striped border no-wrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($users)){
                                                    foreach($users as $user){
                                                        pr($user->getRoleName);
                                                        ?>
                                                        <tr>
                                                            <td>{{$user->id}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->phone}}</td>
                                                            <td>
                                                                <?php if(!empty($roles)){
                                                                    foreach($roles as $role){
                                                                        if($user->role_id == $role->id){
                                                                            echo $role->role_name ?? ''; 
                                                                        }
                                                                    }
                                                                }   
                                                                    ?>
                                                                


                                                            </td>
                                                            <td>
                                                                 <div class="switchery-demo m-b-30">
                                                                        <input type="checkbox" <?php if($user->status == 1) echo "checked";?> data-size="small" class="js-switch" data-color="#009efb" onchange="update_user_status({{$user->id}},this)" />
                                                                    </div>

                                                            </td>
                                                            <td>{{$user->created_at}}</td>
                                                            <td>
                                                                <a href="{{route('admin.hospitals.delete_user',['user_id'=>$user->id])}}" onclick="return confirm('Are You Want to Delete')" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>

                                                            </td>

                                                        </tr>

                                                    <?php }}?>

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>


    </div>
</div>




@include('admin.common.footer')
<script type="text/javascript">
    $( document ).ready(function() {
        $('#upload_file').hide();
    });


    function getFile() {
        document.getElementById("upfile").click();
    }


</script>
<script type="text/javascript">
    function getval(){
        $('#upload_file').submit();

    }
</script>


<script>
   $( document ).ready(function() {
    $('#add_user_form').hide();
});
   $( "#add_user" ).click(function() {
      $('#add_user_form').toggle(1500);

  });

   $( document ).ready(function() {
    $('#add_role_form').hide();
});
   $( "#add_role" ).click(function() {
      $('#add_role_form').toggle(1500);

  });

   $(function () {
    $('#myTable1').DataTable();
});      
</script>

<script type="text/javascript">
    function update_role_status(role_id,element) {
        var status = 0;
        if(element.checked){
            status = 1
        }
        
        var hospital_id = '{{$hospital->id}}';

        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.hospitals.update_role_status') }}",
            type: "POST",
            data: {hospital_id:hospital_id, role_id:role_id,status:status},
            dataType:"JSON",
            headers:{'X-CSRF-TOKEN': _token},
            cache: false,
            success: function(resp){
                if(resp.success){
                    alert(resp.message);
                }else{
                    alert(resp.message);

                }
            }
        });
    }

    function update_user_status(user_id,element){
         var status = 0;
        if(element.checked){
            status = 1
        }
        
        var hospital_id = '{{$hospital->id}}';

        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.hospitals.update_user_status') }}",
            type: "POST",
            data: {hospital_id:hospital_id, user_id:user_id,status:status},
            dataType:"JSON",
            headers:{'X-CSRF-TOKEN': _token},
            cache: false,
            success: function(resp){
                if(resp.success){
                    alert(resp.message);
                }else{
                    alert(resp.message);

                }
            }
        });
    }
</script>