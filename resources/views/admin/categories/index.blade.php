@include('admin.common.header')


<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();

$category_types = config('custom.category_types');

$parent_id = (request()->has('parent_id'))?request()->parent_id:'';

$back_url = (request()->has('back_url'))?request()->input('back_url'):'';

$parent_cat_name = (isset($parentCategory->name))?$parentCategory->name:'';

$page_title = 'Categories';

$parent_cat_link = 'javascript:void(0)';

if(!empty($parent_cat_name)){
   // $parent_cat_url = url($routeName.'/categories?type='.$parentCategory->type.'&parent_id='.$parentCategory->parent_id);

        //$page_title .= ' - <a href="'.$parent_cat_url.'" class="btn-link">'.$parent_cat_name.'</a>';
    $page_title .= ' - '.$parent_cat_name;
}

$CategoryBreadcrumb = '';

if(is_numeric($parent_id) && $parent_id > 0){
    $CategoryBreadcrumb = CustomHelper::CategoryBreadcrumb($parentCategory, 'admin/categories?type='.$type, 'Categories');
}

if(!empty($CategoryBreadcrumb)){
   // echo '<p>'.$CategoryBreadcrumb.'</p>';
}

$add_cat_btn_name = 'Add Category';


    // category level to 
$cat_level= 1;
if(is_numeric($parent_id) && $parent_id > 0){
    $add_cat_btn_name = 'Add Sub category';
}



?>

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{$page_title}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{$page_title}}</li>
        </ol>
        <a href="{{ route('admin.categories.add', ['parent_id'=>$parent_id, 'back_url'=>$BackUrl]) }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
            class="fa fa-plus-circle"></i>{{$add_cat_btn_name}}</button></a>

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
              <h4 class="card-title">{{$page_title}}</h4>
              <div class="table-responsive m-t-40">
                <table id="examplestate" class="table display table-striped border no-wrap">
                  <thead>
                    <tr>
                        <th>Name</th>
                        
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    if(!empty($categories)){
                        foreach($categories as $category){
                          
                            $status = ($category->status == "1")?'Active':'Inactive';
                            $child_url = 'javascript:void(0)';

                            if(!empty($category->children) && $category->children->count() > 0 ){
                                $child_url = 'categories?&parent_id='.$category->id.'&back_url='.rawurlencode($BackUrl);
                            }
                            ?>
                            <tr>
                             <td>
                                <a href="{{$child_url}}">{{$category->name}}</a>
                            </td>
                            <td>{{$category->sort_order}}</td>
                            <td>{{$status}}</td>

                            <td>

                                <?php
                                if($countParents < 2){
                                    ?>
                                    <a href="{{ route($routeName.'.categories.add', ['parent_id'=>$category->id, 'back_url'=>$BackUrl]) }}" title="Add Child Category" ><i class="fas fa-plus"></i></a>
                                    &nbsp;
                                    <?php
                                }
                                ?>


                                <a href="{{ route($routeName.'.categories.edit', [$category['id'], 'parent_id'=>$parent_id, 'back_url'=>$BackUrl]) }}" title="Edit" ><i class="fas fa-edit"></i></a>
                                &nbsp;

                                
                                
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

