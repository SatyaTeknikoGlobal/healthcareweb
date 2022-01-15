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
                <h4 class="text-themecolor">All Hospitals</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Hospitals</li>
                    </ol>
                    @if(CustomHelper::isAllowedSection('hospitals' , $roleId , $type='add'))
                    <a href="{{ route($routeName.'.hospitals.add', ['back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
                        <h4 class="card-title">All Hospitals List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="dataTable" class="table display table-striped border no-wrap">
                                <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Approve/Not Approve</th>
                                    <th scope="col">Status</th>
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
        ajax: '{{ route($routeName.'.hospitals.get_hospitals') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' ,searchable: false, orderable: false},
            { data: 'address', name: 'address' },
             { data: 'priority', name: 'priority' },
            { data: 'is_approve', name: 'is_approve' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', searchable: false, orderable: false }

        ],
    });

    function change_hospital_status(hos_id){
        var status = $('#change_hospital_status'+hos_id).val();


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

    

    function change_hospital_approve(hos_id){
        var approve = $('#change_hospital_approve'+hos_id).val();


        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.hospitals.change_hospital_approve') }}",
            type: "POST",
            data: {hos_id:hos_id, approve:approve},
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

   function change_priority_approve(hos_id)
   {
     var priority_id = $('#priority_id'+hos_id).val();
      
        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.hospitals.change_priority_approve') }}",
            type: "POST",
            data: {hos_id:hos_id, priority_id:priority_id},
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

