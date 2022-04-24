<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In || Nuron - NFT Marketplace Template</title>

    <!-- Start Header -->
    @include('include/header')
    <!-- End Header Area -->
 
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Login</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{route('index')}}">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->



    <!-- login form -->
    <div class="login-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <div class=" offset-2 col-lg-4 col-md-6 ml_md--0 ml_sm--0 col-sm-12">
                    <div class="form-wrapper-one">
                        <h4>Login</h4>
                        <form action="{{route ('loginRequest') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input class="@if ($errors->all()) form-control is-invalid @endif"  value="{{ old('email') }}" type="email" name="email" id="exampleInputEmail1" required>
                                @if ($errors->first('errors'))
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{$errors->first('errors')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-5">
                                <label for="exampleInputPassword1"  class="form-label">Password</label>
                                <input class="@if ($errors->all()) form-control is-invalid @endif" type="password" name="password" id="exampleInputPassword1" minlength="6" required>
                            </div>
                            <div style="display: flex;justify-content:space-between" class="mb-5 rn-check-box">
                                <input type="checkbox" class="rn-check-box-input" id="exampleCheck1">
                                <label class="rn-check-box-label" for="exampleCheck1">Remember me leter</label>
                               <a href="{{route('forget')}}">  Forget password </a>

                            </div>
                            
                            <button type="submit" class="btn btn-primary mr--15">Log In</button>
                            <a href="{{route('sign-up')}}" class="btn btn-primary-alta">Sign Up</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="social-share-media form-wrapper-one">
                        <h6>Another way to log in</h6>
                        <p> Lorem ipsum dolor sit, amet sectetur adipisicing elit.cumque.</p>
                        <button class="another-login login-facebook"> <img class="small-image" src="assets/images/icons/google.png" alt=""> <span>Log in with Google</span></button>
                        <button class="another-login login-facebook"> <img class="small-image" src="assets/images/icons/facebook.png" alt=""> <span>Log in with Facebook</span></button>
                        <button class="another-login login-twitter"> <img class="small-image" src="assets/images/icons/tweeter.png" alt=""> <span>Log in with Twitter</span></button>
                        <button class="another-login login-linkedin"> <img class="small-image" src="assets/images/icons/linkedin.png" alt=""> <span>Log in with linkedin</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login form end -->

    <!-- Start Footer Area -->
    @include('include/footer')
 

  

 