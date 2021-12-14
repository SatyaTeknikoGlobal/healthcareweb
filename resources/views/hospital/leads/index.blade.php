@include('hospital.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getHospitalRouteName();


// $storage = Storage::disk('public');
// $path = 'influencer/thumb/';
// $roleId = Auth::guard('admin')->user()->role_id;

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
                        <h4 class="card-title">All Leads</h4>
                        <div class="table-responsive m-t-40">
                            <table id="dataTable" class="table display table-striped border no-wrap">
                                <thead>
                                <tr>
                                    <th scope="col">S.NO.</th>
                                    <th scope="col">#Booking ID</th>
                                    
                                    <th scope="col">Hospital Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
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




@include('hospital.common.footer')

<script>
    var i = 1;

    var table = $('#dataTable').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        responsive:true,
        ajax: '{{ route($routeName.'.leads.get_bookings') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'booking_id', name: 'booking_id' ,searchable: false, orderable: false},
            { data: 'hospital_id', name: 'hospital_id'},
            { data: 'description', name: 'description'},            
            { data: 'status', name: 'status' },            
            { data: 'action', searchable: false, orderable: false }

        ],
    });

  

  
  

</script>

