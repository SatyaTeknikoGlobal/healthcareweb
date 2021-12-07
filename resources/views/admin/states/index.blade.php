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
        <h4 class="text-themecolor">State List</h4>
      </div>
      <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">State List</li>
          </ol>
          <a href="{{ url($routeName.'/states/save') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
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
              <h4 class="card-title">State List</h4>
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

                  <?php if(!empty($states) && $states->count() > 0){
                    $i = 1;
                    foreach ($states as $state){


                      ?>
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$state->name}}</td>
                        <td><?php  echo ($state->status==1)?'Active':'Inactive';  ?></td>
                        <td>{{date('d M Y',strtotime($state->created_at))}}</td>

                        <td>
                          <a href="{{route($routeName.'.states.save', ['id'=>$state->id,'back_url'=>$BackUrl])}}" title="Edit"><i class="fas fa-edit"></i></a>
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
