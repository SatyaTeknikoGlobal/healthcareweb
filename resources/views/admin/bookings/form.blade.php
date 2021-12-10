@include('admin.common.header')
<?php
$BackUrl = CustomHelper::BackUrl();
$ADMIN_ROUTE_NAME = CustomHelper::getAdminRouteName();


$bookings_id = (isset($bookings->id))?$bookings->id:'';
$unique_id = (isset($bookings->unique_id))?$bookings->unique_id:'';
$user_id = (isset($bookings->user_id))?$bookings->user_id:'';
$hospital_id = (isset($bookings->hospital_id))?$bookings->hospital_id:'';
$appointment_date = (isset($bookings->appointment_date))?$bookings->appointment_date:'';
$diseases = (isset($bookings->diseases))?$bookings->diseases:'';
$payment_status = (isset($bookings->payment_status))?$bookings->payment_status:'';
$status = (isset($bookings->status))?$bookings->status:'';


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

                            <input type="hidden" name="id" value="{{$bookings_id}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Role</label>
                                <select class="form-control" name="user_id">
                                    <option value="" selected disabled>Select User</option>
                                    <?php
                                        if(!empty($users)){
                                            foreach ($users as $user){
                                    ?>
                                    <option value="{{$user->id}}" <?php if($user->id == $user_id) echo "selected";?>>{{$user->name}}</option>
                                    <?php }}?>
                                </select>
                                @include('snippets.errors_first', ['param' => 'user_id'])
                            </div>


                             <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Choose Speciality</label>
                                <select class="form-control" name="diseases">
                                    <?php
                                        if(!empty($specialities)){
                                            foreach ($specialities as $speciality){
                                    ?>
                                    <option value="{{$speciality->id}}" <?php if($speciality->id == $diseases) echo "selected";?>>{{$speciality->name}}</option>
                                    <?php }}?>

                                    <option value="0">Others</option>
                                </select>
                                @include('snippets.errors_first', ['param' => 'name'])
                            </div>  


                            <?php /*
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Choose Hospital</label>
                                <select class="form-control" name="hospital_id">
                                    <option value="" selected disabled>Select Hospital</option>
                                    <?php
                                        if(!empty($hospitals)){
                                            foreach ($hospitals as $hospital){
                                    ?>
                                    <option value="{{$hospital->id}}" <?php if($hospital->id == $hospital_id) echo "selected";?>>{{$hospital->name}}</option>
                                    <?php }}?>
                                </select>
                                @include('snippets.errors_first', ['param' => 'hospital_id'])
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Appointment Date</label>
                                <input type="text" class="form-control" name="appointment_date" placeholder="set min date" id="mdate" value="{{ old('appointment_date', $appointment_date) }}">


                                @include('snippets.errors_first', ['param' => 'appointment_date'])
                            </div>

            */?>

                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Description</label>
                                
                                <textarea name="description" class="form-control" id="description">{{old('description')}}</textarea>
                                @include('snippets.errors_first', ['param' => 'payment_status'])
                            </div>



                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Payment Status</label>
                                <br>
                                Pending: <input type="radio" name="payment_status" value="pending" <?php echo ($payment_status == 'pending')?'checked':''; ?> checked>
                                &nbsp;
                                Inactive: <input type="radio" name="payment_status" value="paid" <?php echo ( strlen($payment_status) > 0 && $payment_status == 'paid')?'checked':''; ?> >

                                @include('snippets.errors_first', ['param' => 'payment_status'])
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