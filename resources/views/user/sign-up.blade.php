<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up || Nuron - NFT Marketplace Template</title>
    <!-- Start Header -->
    @include('include/header')
    <!-- End Header Area -->
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Sign Up</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{route('index')}}">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Sign Up</li>
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
                <div class="offset-2 col-lg-4 col-md-6 ml_md--0 ml_sm--0 col-sm-12">
                    <div class="form-wrapper-one registration-area">
                        <h4>Sign up</h4>
                        <form class="row g-3 needs-validation" action="{{route('signRequest')}}" method="POST" >
                            @csrf
                            <div class="mb-5">
                                <label for="firstName" class="form-label">First name</label>
                                <input  onkeydown="return /[a-z ]/i.test(event.key)" type="text" value="{{ old('firstName') }}" name="firstName" id="firstName" required minlength="2" maxlength="100">
                            </div>
                            <div class="mb-5">
                                <label for="lastName" class="form-label">Last name</label>
                                <input  onkeydown="return /[a-z ]/i.test(event.key)" type="text" value="{{ old('lastName') }}" name="lastName" id="lastName" required minlength="2" maxlength="100">
                            </div>
                            <div class="mb-5">
                                <label for="email" class="form-label">Email address</label>
                              <input class="@error('email') form-control is-invalid @enderror"  type="email" name="email" id="email" required>
                                 @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label">Create Password</label>
                                <input  type="password" name="password" id="password" minlength="6"  required>
                            </div>
                            <div class="mb-5">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input onkeyup='check();' type="password" id="confirm_password"  minlength="6"  required>
                                <span id='message'></span>
                            </div>
                            <div class="mb-5" style="display: flex;">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gender" name="gender" value="1" checked>
                                <label style="font-size:20px" for="gender">Male</label>
                              </div>
                              <div style="margin-left: 15px" class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gender2" value="0" name="gender" >
                                <label style="font-size:20px" for="gender2">Female</label>
                              </div>
                            </div>

                            <div class="mb-5 rn-check-box">
                                <input type="checkbox" class="rn-check-box-input" id="check" required>
                                <label class="rn-check-box-label" for="check">
                                    <a href="{{route('term')}}" target="_blank">Allow to all tearms & condition</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary mr--15">Sign Up</button>
                            <a href="{{route('login')}}" class="btn btn-primary-alta">Log In</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="social-share-media form-wrapper-one">
                        <h6>Another way to sign up</h6>
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
 

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords must match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
 

    <!-- Start Footer Area -->
    @include('include/footer')