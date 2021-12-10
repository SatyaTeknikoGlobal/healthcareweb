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
                <h4 class="text-themecolor">All Hotels</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Hotels</li>
                    </ol>
                    @if(CustomHelper::isAllowedSection('hotels' , $roleId , $type='add'))
                    <a href="{{ route($routeName.'.hotels.add', ['back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
                        <h4 class="card-title">All Hotels</h4>
                        <div class="table-responsive m-t-40">
                            <table id="examplestate" class="table display table-striped border no-wrap">
                                <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($hotels)){

                                    foreach ($hotels as $hotel){
                                        ?>
                                    <tr>
                                        <td>{{$hotel->id}}</td>
                                        <td>{{$hotel->name}}</td>
                                        <td>{{$hotel->phone}}</td>
                                        <td>{{$hotel->email}}</td>
                                        <td>{{$hotel->address}}</td>
                                        <td>
                                            <div class="switchery-demo m-b-30">
                                                <input type="checkbox" <?php if($hotel->status == 1) echo "checked";?> data-size="small" class="js-switch" data-color="#009efb" onchange="change_hotel_status({{$hotel->id}},this)" />
                                            </div>


                                        </td>
                                        <td>{{$hotel->created_at}}</td>
                                        <td><a href="{{route($routeName.'.hotels.edit', ['id'=>$hotel->id,'back_url'=>$BackUrl])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            &nbsp;&nbsp;
                                            <a onclick="return confirm('Are You Want To Delete ?');" href="{{route($routeName.'.hotels.delete', ['id'=>$hotel->id,'back_url'=>$BackUrl])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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




@include('admin.common.footer')

<script>


    var table = $('#dataTable').DataTable();

    function change_hotel_status(hotel_id,element) {
        var status = 0;
        if(element.checked){
            status = 1
        }
        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.hotels.change_hotel_status') }}",
            type: "POST",
            data: {hotel_id:hotel_id,status:status},
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

