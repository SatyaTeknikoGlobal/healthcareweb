@include('admin.common.header')
<?php
$BackUrl = CustomHelper::BackUrl();
$ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();


$hotels_id = (isset($hotels->id))?$hotels->id:'';
$name = (isset($hotels->name))?$hotels->name:'';
$address = (isset($hotels->address))?$hotels->address:'';
$phone = (isset($hotels->phone))?$hotels->phone:'';
$email = (isset($hotels->email))?$hotels->email:'';
$map_url = (isset($hotels->map_url))?$hotels->map_url:'';
$status = (isset($hotels->status))?$hotels->status:'';


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

                            <input type="hidden" name="id" value="{{$hotels_id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  Name" name="name" value="{{ old('name', $name) }}">
                                @include('snippets.errors_first', ['param' => 'name'])
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone" name="phone" value="{{ old('phone', $phone) }}">
                                @include('snippets.errors_first', ['param' => 'phone'])
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ old('email', $email) }}">
                                @include('snippets.errors_first', ['param' => 'email'])
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address" name="address" value="{{ old('address', $address) }}">
                                @include('snippets.errors_first', ['param' => 'address'])
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Google Map Url</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Map Url" name="map_url" value="{{ old('map_url', $map_url) }}">
                                @include('snippets.errors_first', ['param' => 'map_url'])
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