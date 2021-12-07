<?php echo $__env->make('admin.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <?php
  $back_url = (request()->has('back_url'))?request()->input('back_url'):'';
  $routeName = CustomHelper::getAdminRouteName();

  if(empty($back_url)){
    $back_url = $routeName.'/categories';
  }

  $parent_id = (isset($category->parent_id))?$category->parent_id:$parent_id;
  $name = (isset($category->name))?$category->name:'';
  $description = (isset($category->description))?$category->description:'';
  $sort_order = (isset($category->sort_order))?$category->sort_order:'';
  $meta_title = (isset($category->meta_title))?$category->meta_title:'';
  $meta_keyword = (isset($category->meta_keyword))?$category->meta_keyword:'';
  $meta_description = (isset($category->meta_description))?$category->meta_description:'';
  $featured = (isset($category->featured))?$category->featured:'';
  $status = (isset($category->status))?$category->status:'1';

  $categoryImages = (isset($category->categoryImages))?$category->categoryImages:'';

  $categoryAttributes = (isset($category->categoryAttributes))?$category->categoryAttributes:'';

    //pr($categoryAttributes->toArray());

  $parent_category_name = '';
    //$parentCategoryAttributes = '';

    // if(!empty($parent_category)){

    //     $parent_category_name = (isset($parent_category->name))?$parent_category->name:'';

    //     $getParentCategoryAttributes = CustomHelper::getParentCategoryAttributes($parent_category);

    //     if(!empty($getParentCategoryAttributes) && count($getParentCategoryAttributes) > 0){
    //        // $parentCategoryAttributes = array_flatten($getParentCategoryAttributes);
    //     }
    // }



  $attr_labels_arr = [];
  $attr_sort_arr = [];

  if(!empty($categoryAttributes) && count($categoryAttributes) > 0){
    foreach($categoryAttributes as $c_a_key=>$cat_attr){
      $attr_labels_arr[$c_a_key] = $cat_attr->label;
      $attr_sort_arr[$c_a_key] = $cat_attr->sort_order;
    }
  }

  $attr_labels_arr = old('attr_labels', $attr_labels_arr);
  $attr_sort_arr = old('attr_sort_order', $attr_sort_arr);




    //pr($attr_labels_arr);

  $path = 'categories/';
  $thumb_path = 'categories/thumb/';

  $storage = Storage::disk('public');

    /*if(count($errors)){
        pr($errors);
      }*/
      ?>


<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo e($page_heading); ?></h4>
      </div>
      <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><?php echo e($page_heading); ?></li>
          </ol>
          <?php if(request()->has('back_url')){ $back_url= request('back_url');  ?>
          <a href="<?php echo e(url($back_url)); ?>"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
            class="fa fa-arrow-left"></i>  Back</button></a>
          <?php } ?>
        </div>
      </div>
    </div>

 <div class="row">
      <div class="col-12">
        <?php echo $__env->make('snippets.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('snippets.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- table responsive -->
        <div class="card">
         <div class="card-body">
          <h4 class="card-title"><?php echo e($page_heading); ?></h4>
          <form method="POST" action="" accept-charset="UTF-8" enctype="multipart/form-data" role="form" class="mt-4">
            <?php echo e(csrf_field()); ?>


             <input type="hidden" name="category_id" value="<?php echo e($category_id); ?>">
                  <input type="hidden" name="parent_id" value="<?php echo e($parent_id); ?>">

                  <div class="bgcolor">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="row">


                          <?php
                          if(!empty($categories) && count($categories) > 0){
                            ?>
                            <div class="col-sm-6 col-md-6">
                              <div class="form-group<?php echo e($errors->has('parent_id') ? ' has-error' : ''); ?>">
                                <label class="control-label">Parent Category:</label>

                                <select name="parent_id" class="form-control" >
                                  <option value="">--Select--</option>

                                  <?php
                                  foreach($categories as $cat){
                                    if($cat->id != $category_id && $cat->parent_id != $category_id){
                                      $selected = '';

                                      if($cat->id == $parent_id){
                                        $selected = 'selected';
                                      }
                                      ?>
                                      <option value="<?php echo e($cat->id); ?>" <?php echo e($selected); ?> ><?php echo e($cat->name); ?></option>
                                      <?php
                                    }
                                  }
                                  ?>
                                </select>

                                <?php echo $__env->make('snippets.errors_first', ['param' => 'parent_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              </div>
                            </div>
                            <?php
                          }
                          ?>

                          <?php
                          if(!empty($parent_category_name)){
                            ?>
                            <div class="col-sm-6 col-md-6">
                              <div class="form-group<?php echo e($errors->has('parent_id') ? ' has-error' : ''); ?>">
                                <label class="control-label">Parent Category:</label>

                                <span class="form-control">
                                  <?php echo e($parent_category_name); ?>

                                </span>
                              </div>
                            </div>
                            <?php
                          }
                          ?>
                        </div>



                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                              <label class="control-label required">Category Name:</label>

                              <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $name)); ?>" maxlength="100" />

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                          </div>

                          <div class="col-sm-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                              <label class="control-label">Description:</label>

                              <textarea name="description" class="form-control" maxlength="255"><?php echo e(old('description', $description)); ?></textarea>

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('sort_order') ? ' has-error' : ''); ?>">
                              <label class="control-label">Sort Order:</label>

                              <input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', $sort_order)); ?>" />

                              <p class="help-block">Set the order of this category (relative to other categories in the same level).</p>

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'sort_order'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('meta_title') ? ' has-error' : ''); ?>">
                              <label class="control-label">Meta Title:</label>

                              <textarea name="meta_title" class="form-control" maxlength="255"><?php echo e(old('meta_title', $meta_title)); ?></textarea>

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'meta_title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('meta_keyword') ? ' has-error' : ''); ?>">
                              <label class="control-label">Meta Keywords:</label>

                              <textarea name="meta_keyword" class="form-control" maxlength="255"><?php echo e(old('meta_keyword', $meta_keyword)); ?></textarea>

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'meta_keyword'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
                              <label class="control-label">Meta Description:</label>

                              <textarea name="meta_description" class="form-control" maxlength="255"><?php echo e(old('meta_description', $meta_description)); ?></textarea>

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'meta_description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group<?php echo e($errors->has('images.*') ? ' has-error' : ''); ?> col-md-12">
                            <label for="images" class="control-label required">Images: </label>
                            (Preferred dimensions: width:768px, height:768px)

                            <?php
                            // $count_images = count($categoryImages);
                            $count_images = 0;

                            if(!empty($categoryImages) && count($categoryImages) > 0){

                              ?>
                              <table class="table">
                                <tr>
                                  <th>Image</th>
                                  <th>Default</th>
                                  <th>Remove</th>
                                </tr>
                                <?php
                                foreach($categoryImages as $ci){

                                  $image = $ci->image;

                                  if(!empty($image) && $storage->exists($thumb_path.$image)){

                                    $target_path = url('public/storage/'.$thumb_path.$image);

                                    if($storage->exists($path.$image)){
                                      $target_path = url('public/storage/'.$path.$image);
                                    }
                                    ?>
                                    <tr>
                                      <td>

                                        <a href="<?php echo e($target_path); ?>" target="_blank"><img src="<?php echo e(url('public/storage/'.$thumb_path.$image)); ?>" width="100" /></a>
                                      </td>

                                      <td><input type="radio" name="is_default" value="<?php echo e($ci->id); ?>" <?php echo e($ci->is_default ? 'checked' : ''); ?> /></td>

                                      <td><input type="checkbox" name="images_remove[]" value="<?php echo e($ci->id); ?>" /></td>
                                    </tr>
                                    <?php
                                  }
                                }
                                ?>
                              </table>
                              <?php
                            }
                            ?>


                            <input type="file" name="images[]" multiple>
                            <input type="hidden" name="count_images" value="<?php echo e($count_images); ?>" />

                            <?php echo $__env->make('snippets.errors_first', ['param' => 'images.*'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          </div>








                          <?php
                            /*if(!empty($parentCategoryAttributes) && count($parentCategoryAttributes) > 0){
                                ?>

                                <div class="col-md-12">
                                    <label for="heading_1" class="control-label">Parent Attributes:</label>
                                </div>

                                <div class="col-md-12">

                                    <?php
                                    foreach($parentCategoryAttributes as $pca){
                                        ?>

                                        <div class="row attribute">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <span class="form-control">{{$pca->label}}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="form-control">{{$pca->sort_order}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    ?>
                                </div>
                                <?php
                              }*/
                              ?>



                              <?php
                              if(empty($parent_category)){
                                ?>
                                <div class="col-md-12">
                                  <label for="heading_1" class="control-label">Attributes:</label>
                                </div>


                                <div class="col-md-12 attributes_box">

                                  <?php
                                  $countheading = 1;

                                  if(!empty($attr_labels_arr) && count($attr_labels_arr) > 0){

                                    foreach($attr_labels_arr as $attr_key=>$label){

                                      $attr_sort_order = (isset($attr_sort_arr[$attr_key]))?$attr_sort_arr[$attr_key]:'';

                                      $attr_params = [];
                                      $attr_params['countheading'] = $countheading;
                                      $attr_params['label'] = $label;
                                      $attr_params['attr_sort_order'] = $attr_sort_order;
                                      ?>

                                      <?php echo $__env->make('admin.categories._attribute_row', $attr_params, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                      <?php

                                      $countheading++;

                                    }
                                  }
                                  if($countheading <= 1){

                                    $attr_params = [];
                                    $attr_params['countheading'] = $countheading;
                                    ?>

                                    <?php echo $__env->make('admin.categories._attribute_row', $attr_params, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php
                                  }
                                  ?>

                                </div>

                                <?php
                              }
                              ?>




                            </div>

                            <div class="form-group<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
                              <label class="control-label">Featured:</label>

                              <input type="checkbox" name="featured" value="1" <?php echo ($featured == '1')?'checked':''; ?> >

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'featured'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                              <label class="control-label">Status:</label>
                              &nbsp;&nbsp;
                              Active: <input type="radio" name="status" value="1" <?php echo ($status == '1')?'checked':''; ?> >
                              &nbsp;
                              Inactive: <input type="radio" name="status" value="0" <?php echo ( strlen($status) > 0 && $status == '0')?'checked':''; ?> >

                              <?php echo $__env->make('snippets.errors_first', ['param' => 'status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="form-group">

                              <button type="submit" class="btn btn-success" title="Create this new category"><i class="fa fa-save"></i> Submit</button>
                              <a href="<?php echo e(url($back_url)); ?>" class="btn btn-primary" >Cancel</a>
                            </div>
                          </div>

                        </div>
                      </div>
            </form>
          </div>

        </div>
      </div>
    </div>


  </div>
</div>


<?php echo $__env->make('admin.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php

$pattern = '/\n*/m';
$replace = '';

$attr_params = [];
$attr_params['countheading'] = (isset($countheading))?$countheading:1;
$attr_params['showRemoveBtn'] = true;

$attr_row_html = view('admin.categories._attribute_row', $attr_params);

$attr_row = preg_replace( $pattern, $replace, $attr_row_html);
?>

<script type="text/javascript">

    
    $(".add_head_row").click(function(){
        var attribute_len = $(".attribute").length;

        if(attribute_len+1 > 10){
            alert('Maximum 10 Attributes are allowed.');
        }
        else{

            var attr_row = '<?php echo $attr_row; ?>';

            $(".attributes_box").append(attr_row);
        }
    });



    $(document).on("click",".remove_head_row", function(){
        $(this).parent(".attribute").remove();
    });

</script><?php /**PATH /home/appmantr/healthcareweb.appmantra.live/resources/views/admin/categories/form.blade.php ENDPATH**/ ?>