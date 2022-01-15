@include('admin.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();


$storage = Storage::disk('public');
$path = 'influencer/thumb/';
$roleId = Auth::guard('admin')->user()->role_id;

$storage = Storage::disk('public');
$path1 = 'hospital/';
$imageUrl = url('public/storage/'.$path1.'/hospital.jpg');
if(!empty($hospital->image)){
if($storage->exists($path1.$hospital->image)){
    $imageUrl = url('public/storage/'.$path1.$hospital->image);
}
}

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

                        <center class="m-t-30"> <img onclick="getFile()" src="{{$imageUrl}}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">{{$hospital->name  ?? ''}} ({{$hospital->unique_id ?? ''}})</h4>

                            <div class="switchery-demo m-b-30">
                                <input type="checkbox" <?php if($hospital->status == 1) echo "checked";?> data-size="small" class="js-switch" data-color="#009efb" onchange="change_hospital_status({{$hospital->id}},this)" />
                            </div>
                            <b>Address</b>
                            <h5>{{$hospital->location ?? ''}}</h5>



                            <div>
                                <b>Specialities</b>
                                <br>
                                <?php
                                    $hos_specialities = isset($hospital->hos_specialities) ? $hospital->hos_specialities :'';
                                    if(!empty($hos_specialities)){
                                        $hos_specialities = explode(",", $hos_specialities);
                                        foreach($hos_specialities as $key=>$value){
                                            $spe = \App\Speciality::where('id',$value)->first();
                                            if(!empty($spe)){
                                                echo $spe->name.",";
                                            }
                                        }
                                    }
                                ?>
                            </div>



                        </center>






                        <form id="upload_file" action="{{route($routeName.'.hospitals.upload_profile')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="hospital_id" value="{{$hospital->id}}">
                            <input id="upfile" type="file" id="file" name="file" onchange="getval();" />
                        </form>


                    </div>
                    <div>
                        <style>
                            iframe {
                                display:block;
                                width:100%;
                                height: 150px;
                            }
                        </style>
                        <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{$hospital->email ?? ''}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{$hospital->phone ?? ''}}</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>{{$hospital->location ?? ''}}</h6>
                            <div class="map-box">
                                {!!$hospital->map_url ?? ''!!}
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

                            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab">Profile</a> </li>

                            <li class="nav-item"> <a class="nav-link " data-bs-toggle="tab" href="#gallery" role="tab">Gallery</a></li>
                            <li class="nav-item"> <a class="nav-link " data-bs-toggle="tab" href="#documents" role="tab">Documents</a></li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#roles" role="tab">Roles</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#users" role="tab">Users</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#doctors" role="tab">Doctors</a> </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="{{route('admin.hospitals.profile_update')}}" method="post">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$hospital->id}}">
                                            <div class="form-group">
                                                <label class="col-md-12">Hospital Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Hospital Name" name="name" value="{{$hospital->name ??''}}" class="form-control form-control-line">
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'name'])
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="email@email.com" name="email" value="{{$hospital->email ??''}}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'email'])
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" name="phone" value="{{$hospital->phone ??''}}" class="form-control form-control-line">
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'phone'])
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Description</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" name="description" class="form-control form-control-line">{{$hospital->description}}</textarea>
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'description'])
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select State</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="state_id" id="state_id">
                                                        <option value="" selected disabled>Select State</option>
                                                        <?php if(!empty($states)){
                                                            foreach ($states as $state){
                                                          ?>
                                                            <option value="{{$state->id}}" <?php if($state->id == $hospital->state_id) echo "selected";?>>{{$state->name}}</option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'state_id'])
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-12">Select City</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="city_id" id="city_id">
                                                        <option value="" selected disabled>Select City</option>
                                                        <?php if(!empty($cities)){
                                                        foreach ($cities as $city){
                                                        ?>
                                                        <option value="{{$city->id}}" <?php if($city->id == $hospital->city_id) echo "selected";?>>{{$city->name}}</option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'city_id'])
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-12">Select Locality</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="locality_id" id="locality_id">
                                                        <option value="" selected disabled>Select Locality</option>
                                                        <?php if(!empty($localities)){
                                                        foreach ($localities as $local){
                                                        ?>
                                                        <option value="{{$local->id}}" <?php if($local->id == $hospital->locality_id) echo "selected";?>>{{$local->name}}</option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                                @include('snippets.errors_first', ['param' => 'locality_id'])
                                            </div>



                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Google Map Url</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Enter Google Map Url" name="map_url" value="{{$hospital->map_url ??''}}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Facebook Url</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Facebook Url" name="facebook_url" value="{{$hospital->facebook_url ??''}}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Twitter Url</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Twitter Url" name="twitter_url" value="{{$hospital->twitter_url ??''}}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Youtube Url</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Youtube Url" name="youtube_url" value="{{$hospital->youtube_url ??''}}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success text-white" type="submit">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="tab-pane " id="gallery" role="tabpanel">
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
                                <div class="tab-pane " id="documents" role="tabpanel">
                                <div class="card-body">
                                    <div class="sl-item">
                                        <div class="row">
                                            <form method="post" action="{{route('admin.hospitals.upload_documents')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="hospital_id" value="{{$hospital->id}}">

                                                <div class="col-lg-6 col-md-12 m-b-20">
                                                    <input type="file" class="form-control" name="documents[]" multiple>
                                                </div>
                                                <div class="col-lg-6 col-md-12 m-b-20">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="sl-right">
                                            <div class="row">
                                                <?php if(!empty($hospital)){
                                                $storage = Storage::disk('public');
                                                $path = 'hospital_documents/';

                                                    $nabh_certificate =  $hospital->nabh_certificate;
                                                    $jci_certificate =  $hospital->jci_certificate;
                                                    $pan_number =  $hospital->pan_number;
                                                    $gst_number =  $hospital->gst_number;
                                                ?>

                                                <div class="col-lg-3 col-md-12 m-b-20">
                                                    <p>NABH Certificate :  <a target="_blank" href="{{ url('public/storage/'.$path.$nabh_certificate) }}"><img src="{{ url('public/storage/'.$path.$nabh_certificate) }}" class="img-responsive radius" /></a></p>

                                                    <p>JCI Certificate :  <a target="_blank" href="{{ url('public/storage/'.$path.$jci_certificate) }}"><img src="{{ url('public/storage/'.$path.$jci_certificate) }}" class="img-responsive radius" /></a></p>

                                                    <p>PAN Number :  <a target="_blank" href="{{ url('public/storage/'.$path.$pan_number) }}"><img src="{{ url('public/storage/'.$path.$pan_number) }}" class="img-responsive radius" /></a></p>

                                                     <p>GST Number :  <a target="_blank" href="{{ url('public/storage/'.$path.$gst_number) }}"><img src="{{ url('public/storage/'.$path.$gst_number) }}" class="img-responsive radius" /></a></p>
                                                </div>


                                                <?php    }else{?>


                                                <p>No Document Found</p>

                                                <?php }?>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
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
                                                //pr($user->getRoleName);
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
                        <div class="tab-pane" id="doctors" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 b-r pull-right">
                                        <button class="btn btn-primary" id="add_doctor">Add</button>
                                    </div>
                                    <form action="{{route('admin.hospitals.add_doctors')}}" method="post" id="add_doctor_form" enctype='multipart/form-data'>
                                        {{ csrf_field() }}

                                        <input type="hidden" name="hospital_id" value="{{$hospital->id}}">

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
                                            <label for="exampleInputEmail1" class="form-label">Experience</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="experience" value="{{ old('experience') }}">
                                            @include('snippets.errors_first', ['param' => 'experience'])
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Speciality</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="speciality" value="{{ old('speciality') }}">
                                            @include('snippets.errors_first', ['param' => 'speciality'])
                                        </div>

                                         <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="address" value="{{ old('address') }}">
                                            @include('snippets.errors_first', ['param' => 'address'])
                                        </div>

                                         <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">FeMale</option>
                                            </select>
                                            @include('snippets.errors_first', ['param' => 'gender'])
                                        </div>


                                         <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Details</label>
                                            <textarea class="form-control" name="details">{{old('details')}}</textarea>
                                            @include('snippets.errors_first', ['param' => 'details'])
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Image</label>
                                           <input type="file" name="image" class="form-control">
                                            @include('snippets.errors_first', ['param' => 'image'])
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
                                        <h4 class="card-title">All Doctors</h4>
                                        <div class="table-responsive">
                                            <table id="myTable2" class="table display table-striped border no-wrap">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Speciality</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(!empty($doctors)){
                                                foreach($doctors as $doctor){
                                                //pr($user->getRoleName);
                                                ?>
                                                <tr>
                                                    <td>{{$doctor->id}}</td>
                                                    <td>{{$doctor->name}}</td>
                                                    <td>{{$doctor->phone}}</td>
                                                    <td>{{$doctor->speciality}}</td>
                                                    <td>
                                                        <div class="switchery-demo m-b-30">
                                                            <input type="checkbox" <?php if($doctor->status == 1) echo "checked";?> data-size="small" class="js-switch" data-color="#009efb" onchange="update_doctor_status({{$doctor->id}},this)" />
                                                        </div>

                                                    </td>
                                                    <td>{{$doctor->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('admin.hospitals.delete_doctor',['doctor_id'=>$doctor->id])}}" onclick="return confirm('Are You Want to Delete')" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>

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
    $('#add_doctor_form').hide();
});
   $( "#add_user" ).click(function() {
      $('#add_user_form').toggle(1500);

  }); 
   $( "#add_doctor" ).click(function() {
      $('#add_doctor_form').toggle(1500);

  });

   $( document ).ready(function() {
    $('#add_role_form').hide();
});
   $( "#add_role" ).click(function() {
      $('#add_role_form').toggle(1500);

  });

   $(function () {
    $('#myTable1').DataTable();
    $('#myTable2').DataTable();

});      
</script>

<script type="text/javascript">

function change_hospital_status(hos_id,element){
        var status = 0;
        if(element.checked){
            status = 1;
        }


        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.hospitals.change_hospital_status') }}",
            type: "POST",
            data: {hos_id:hos_id, status:status},
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


function update_doctor_status(doctor_id,element){
    var status = 0;
        if(element.checked){
            status = 1;
        }
        var _token = '{{ csrf_token() }}';
        var hospital_id = '{{$hospital->id}}';
        $.ajax({
            url: "{{ route($routeName.'.hospitals.update_doctor_status') }}",
            type: "POST",
            data: {doctor_id:doctor_id, hospital_id:hospital_id,status:status},
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