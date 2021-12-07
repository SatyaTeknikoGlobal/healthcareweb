@include('admin.common.header')
<?php
$BackUrl = CustomHelper::BackUrl();
$ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();


$admins_id = (isset($admins->id))?$admins->id:'';
$name = (isset($admins->name))?$admins->name:'';
$description = (isset($admins->description))?$admins->description:'';
$location = (isset($admins->location))?$admins->location:'';
$state_id = (isset($admins->state_id))?$admins->state_id:'';
$city_id = (isset($admins->city_id))?$admins->city_id:'';
$username = (isset($admins->username))?$admins->username:'';
$phone = (isset($admins->phone))?$admins->phone:'';
$address = (isset($admins->address))?$admins->address:'';
$society_id = (isset($admins->society_id))?$admins->society_id:'';
$is_approve = (isset($admins->is_approve))?$admins->is_approve:'';
$role_id = (isset($admins->role_id))?$admins->role_id:'';
$email = (isset($admins->email))?$admins->email:'';




$status = (isset($admins->status))?$admins->status:'';


$routeName = CustomHelper::getSadminRouteName();
$storage = Storage::disk('public');
$path = 'influencer/';



?>


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ $page_heading }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">{{ $page_heading }}</li>
                    </ol>
                    <?php if(request()->has('back_url')){ $back_url= request('back_url');  ?>
                    <a href="{{ url($back_url)}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                    class="fa fa-arrow-left"></i>  Back</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
            @include('snippets.errors')
            @include('snippets.flash')
            <!-- table responsive -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $page_heading }}</h4>
                        <form method="POST" action="" accept-charset="UTF-8" enctype="multipart/form-data" role="form" class="mt-4">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$admins_id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Role</label>
                                <select class="form-control" name="role_id">
                                    <option>Select Role</option>
                                    <?php
                                        if(!empty($roles)){
                                            foreach ($roles as $role){
                                    ?>
                                    <option value="{{$role->id}}" <?php if($role->id == $role_id) echo "selected";?>>{{$role->name}}</option>
                                    <?php }}?>
                                </select>
                                @include('snippets.errors_first', ['param' => 'name'])
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  Name" name="name" value="{{ old('name', $name) }}">
                                @include('snippets.errors_first', ['param' => 'name'])
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ old('email', $email) }}">
                                @include('snippets.errors_first', ['param' => 'email'])
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter UserName For Login" name="username" value="{{ old('username', $username) }}">
                                @include('snippets.errors_first', ['param' => 'username'])
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone" name="phone" value="{{ old('phone', $phone) }}">
                                @include('snippets.errors_first', ['param' => 'phone'])
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address" name="address" value="{{ old('address', $address) }}">
                                @include('snippets.errors_first', ['param' => 'address'])
                            </div>



                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Approval</label>
                                <br>
                                Approved: <input type="radio" name="is_approve" value="1" <?php echo ($is_approve == '1')?'checked':''; ?> checked>
                                &nbsp;
                                Not Approved: <input type="radio" name="is_approve" value="0" <?php echo ( strlen($is_approve) > 0 && $is_approve == '0')?'checked':''; ?> >

                                @include('snippets.errors_first', ['param' => 'is_approve'])
                            </div>





                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Status</label>
                                <br>
                                Active: <input type="radio" name="status" value="1" <?php echo ($status == '1')?'checked':''; ?> checked>
                                &nbsp;
                                Inactive: <input type="radio" name="status" value="0" <?php echo ( strlen($status) > 0 && $status == '0')?'checked':''; ?> >

                                @include('snippets.errors_first', ['param' => 'status'])
                            </div>




                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>


@include('admin.common.footer')
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
</script>