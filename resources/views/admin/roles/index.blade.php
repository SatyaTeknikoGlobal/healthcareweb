@include('admin.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();


$storage = Storage::disk('public');
$path = 'influencer/thumb/';
?>


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Roles</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                    <a href="{{ route($routeName.'.roles.add', ['back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                        class="fa fa-plus-circle"></i> Create New</button></a>
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
                            <h4 class="card-title">Roles</h4>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table display table-striped border no-wrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Name</th>
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

      var table = $('#myTable').DataTable({
         ordering: false,
         processing: true,
         serverSide: true,
         responsive: true,
         ajax: '{{ route($routeName.'.roles.get_roles') }}',
         columns: [
         { data: 'id', name: 'id' },
         { data: 'name', name: 'name' ,searchable: false, orderable: false},
         { data: "status",name: 'status'},
         { data: 'created_at', name: 'created_at' },
         { data: 'action', searchable: false, orderable: false }

         ],


     });

      function change_role_status(role_id){
          var status = $('#change_role_status'+role_id).val();


          var _token = '{{ csrf_token() }}';

          $.ajax({
            url: "{{ route($routeName.'.roles.change_role_status') }}",
            type: "POST",
            data: {role_id:role_id, status:status},
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