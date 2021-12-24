@include('front.common.header')


<style>
    .btn-block{
        width: auto;
        margin-right: auto;
        margin-left: auto;
    }
    .login-right{
        height: 100%
    }
</style>

  <div id="page_title">
            <div class="container text-center">
                <div class="panel-heading">Change Password</div>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Change Password</li>
                </ol>
            </div>
        </div>
        <section class="profile-sec">
            <div class="container">
                <div class="row">

                	@include('front.common.sidebar')



                  <div class="col-md-9 col-sm-8 col-xs-12 mb-5">

                     @include('snippets.errors')
                    @include('snippets.flash')

                        <div class="login-right">
                            <div class="login-header">
                                <h3 class="mb-5">Change Password</h3>
                            </div>
                            <form action="{{route('home.change_password')}}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}



                                 <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Old Password</label>
                                    <input type="password" name="old_password"  placeholder="Enter Old password" class="form-control floating" >

                                </div>
                                @include('snippets.errors_first', ['param' => 'old_password'])


                                 <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">New Password</label>
                                    <input type="password" name="password"  placeholder="Enter Old password" class="form-control floating" >
                                    
                                </div>
                                @include('snippets.errors_first', ['param' => 'password'])



                                 <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Confirm New Password</label>
                                    <input type="password" name="confirm_password" placeholder="Enter Old password" class="form-control floating" >
                                    
                                </div>
                                @include('snippets.errors_first', ['param' => 'confirm_password'])
                                

                              <div class="col-md-12 my-5">
                                    <button class="btn btn-primary btn-block btn-lg login-btn" id="submit" type="submit">Submit</button>
                              </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>


@include('front.common.footer')
