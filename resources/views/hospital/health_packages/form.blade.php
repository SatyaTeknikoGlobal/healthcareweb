@include('hospital.common.header')
<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getHospitalRouteName();


$packages_id = (isset($packages->id))?$packages->id:'';
$package_name = (isset($packages->package_name))?$packages->package_name:'';
$description = (isset($packages->description))?$packages->description:'';
$included_hos_ids = (isset($packages->included_hos_ids))?$packages->included_hos_ids:'';
$price = (isset($packages->price))?$packages->price:'';
$validity = (isset($packages->validity))?$packages->validity:'';
$status = (isset($packages->status))?$packages->status:'';

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

                            <input type="hidden" name="id" value="{{$packages_id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Package Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  Name" name="package_name" value="{{ old('package_name', $package_name) }}">
                                @include('snippets.errors_first', ['param' => 'package_name'])
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{old('description',$description)}}</textarea>
                                @include('snippets.errors_first', ['param' => 'description'])
                            </div>                      
                         

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price" name="price" value="{{ old('price', $price) }}">
                                @include('snippets.errors_first', ['param' => 'price'])
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Validity(In Days)</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Validity" name="validity" value="{{ old('validity', $validity) }}">
                                @include('snippets.errors_first', ['param' => 'validity'])
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


@include('hospital.common.footer')
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