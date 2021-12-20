@include('front.common.header')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left"><img src="{{asset('public/assets/images/login.png')}}" class="img-fluid"
                            alt="Doccure Login"></div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3 class="mb-5">Login</h3>
                                </div>

                                <form class="contactus-form" id="signupform" method="post"
                                action="{{route('home.login')}}">
                                {{csrf_field()}}
                                <div class="form-group form-focus">
                                    <label class="focus-label">Email</label>
                                    <input type="text" name="email" autocomplete="off" placeholder="Enter Email" class="form-control">
                                </div>
                                @include('snippets.errors_first', ['param' => 'email'])
                                <div class="form-group form-focus">
                                    <label class="focus-label">Password</label>
                                    <input type="password" placeholder="Enter Password" name="password" autocomplete="off" class="form-control">
                                </div>
                                @include('snippets.errors_first', ['param' => 'password'])
                                <div class="text-right"><a class="forgot-link"
                                    href="#">Forgot Password ?</a></div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn"
                                    type="submit">Login</button>
                                    <div class="login-or"><span class="or-line"></span>
                                    </div>

                                    <div class="text-center dont-have">Don’t have an account?<a
                                        href="{{route('home.register')}}">Register as new user</a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('front.common.footer')
