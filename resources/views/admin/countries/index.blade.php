@include('admin.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();
$old_name = (request()->has('name'))?request()->name:'';


?>


<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Country List</h4>
      </div>
      <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Country List</li>
          </ol>
          <a href="{{ url($routeName.'/countries/save') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
              <h4 class="card-title">Country List</h4>
              <div class="table-responsive m-t-40">
                <table id="examplestate" class="table display table-striped border no-wrap">
                  <thead>
                    <tr>
                     <th scope="col">#ID</th>
                     <th scope="col">Name</th>
                     <th scope="col">Status</th>
                     <th scope="col">Date Created</th>
                     <th scope="col">Action</th>

                   </tr>
                 </thead>
                 <tbody>

                  <?php if(!empty($countries) && $countries->count() > 0){
                    $i = 1;
                    foreach ($countries as $country){


                      ?>
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$country->name}}</td>
                        <td><?php  echo ($country->status==1)?'Active':'Inactive';  ?></td>
                        <td>{{date('d M Y',strtotime($country->created_at))}}</td>

                        <td>
                          <a href="{{route($routeName.'.countries.save', ['id'=>$country->id,'back_url'=>$BackUrl])}}" title="Edit"><i class="fas fa-edit"></i></a>
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
