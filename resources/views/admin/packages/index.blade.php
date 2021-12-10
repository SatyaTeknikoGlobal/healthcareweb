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
                <h4 class="text-themecolor">All Health Packages</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Health Packages</li>
                    </ol>
                    @if(CustomHelper::isAllowedSection('packages' , $roleId , $type='add'))
                    <a href="{{ route($routeName.'.packages.add', ['back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
                        <h4 class="card-title">All Health Packages</h4>
                        <div class="table-responsive m-t-40">
                            <table id="examplestate" class="table display table-striped border no-wrap">
                                <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Hospital Included</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Validity(In Days)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($packages)){

                                    foreach ($packages as $package){

                                            $included_hos_ids = $package->included_hos_ids;
                                            $included_hos_ids = explode(",",$included_hos_ids);
                                        ?>
                                    <tr>
                                        <td>{{$package->id}}</td>
                                        <td>{{$package->package_name}}</td>
                                        <td>
                                            <?php
//                                                if(!empty($included_hos_ids)){
//                                                    $i = 1;
//                                                    foreach ($included_hos_ids as $key=>$value){
//                                                            $hospital = \App\Hospital::where('id',$value)->first();
//                                                    if(!empty($hospital)){
//                                                        echo $i.'.'.$hospital->name;
//                                                        echo '<br>';
//                                                    }
//                                                            ++$i;
//                                                    }
//                                                }
                                            $hospital = \App\Hospital::where('id',$package->included_hos_ids)->first();
                                    echo $hospital->name ??"";


                                            ?>


                                        </td>
                                        <td>{{$package->price}}</td>
                                        <td>{{$package->validity}}</td>
                                        <td>
                                            <div class="switchery-demo m-b-30">
                                                <input type="checkbox" <?php if($package->status == 1) echo "checked";?> data-size="small" class="js-switch" data-color="#009efb" onchange="change_package_status({{$package->id}},this)" />
                                            </div>


                                        </td>
                                        <td>{{$package->created_at}}</td>
                                        <td><a href="{{route($routeName.'.packages.edit', ['id'=>$package->id,'back_url'=>$BackUrl])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="{{route($routeName.'.packages.delete', ['id'=>$package->id,'back_url'=>$BackUrl])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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

    function change_package_status(package_id,element) {
        var status = 0;
        if(element.checked){
            status = 1
        }
        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ route($routeName.'.packages.change_package_status') }}",
            type: "POST",
            data: {pack_id:package_id,status:status},
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

