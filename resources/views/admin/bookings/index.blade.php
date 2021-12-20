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
                <h4 class="text-themecolor">All Bookings</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Bookings</li>
                    </ol>
                    @if(CustomHelper::isAllowedSection('bookings' , $roleId , $type='add'))
                    <a href="{{ route($routeName.'.bookings.add', ['back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                    class="fa fa-plus-circle"></i> Create New</button></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- table responsive -->

                @include('snippets.errors')
                @include('snippets.flash')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Bookings List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="dataTable" class="table display table-striped border no-wrap">
                                <thead>
                                <tr>
                                    <th scope="col">#Booking ID</th>                                    
                                    <th scope="col">Hospital Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Appointment Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




@include('admin.common.footer')

<script>
    var i = 1;

    var table = $('#dataTable').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        responsive:true,
        ajax: '{{ route($routeName.'.bookings.get_bookings') }}',
        columns: [
            { data: 'id', name: 'id' },
            
            { data: 'hospital_name', name: 'hospital_name'},
            { data: 'phone', name: 'phone'},
            { data: 'booking_date', name: 'booking_date'},
            { data: 'payment_status', name: 'payment_status' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', searchable: false, orderable: false }

        ],
    });

    function change_admins_status(admin_id){
        var status = $('#change_admins_status'+admin_id).val();


        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.admins.change_admins_status') }}",
            type: "POST",
            data: {admin_id:admin_id, status:status},
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


    function change_admins_approve(admin_id){
        var approve = $('#change_admins_approve'+admin_id).val();


        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.admins.change_admins_approve') }}",
            type: "POST",
            data: {admin_id:admin_id, approve:approve},
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

    function change_admins_role(admin_id){
        var role_id = $('#change_admins_role'+admin_id).val();

        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.admins.change_admins_role') }}",
            type: "POST",
            data: {admin_id:admin_id, role_id:role_id},
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

