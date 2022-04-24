<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile Admin || Nuron - NFT Marketplace Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin/adminHeader')
    <div id="particles-js"></div>
 
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Edit Profile Admin</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{route('adminIndex')}}">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Edit Profile Admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->


    <!-- Start tabs area -->
    <div class="edit-profile-area rn-section-gapTop">
        <div class="container">
            <div class="row plr--70 padding-control-edit-wrapper pl_md--0 pr_md--0 pl_sm--0 pr_sm--0">
                <div class="col-12 d-flex justify-content-between mb--30 align-items-center">
                    <h4 class="title-left">Edit Profile Admin</h4>
                    {{-- <a href="author.html" class="btn btn-primary ml--10"><i class="feather-eye mr--5"></i> Preview</a> --}}
                </div>
            </div>
            <div class="row plr--70 padding-control-edit-wrapper pl_md--0 pr_md--0 pl_sm--0 pr_sm--0">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <!-- Start tabs area -->
                    <nav class="left-nav rbt-sticky-top-adjust-five">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="feather-edit"></i>Edit Profile Image</button>
                            <button class="nav-link" id="nav-home-tabs" data-bs-toggle="tab" data-bs-target="#nav-homes" type="button" role="tab" aria-controls="nav-homes" aria-selected="false"><i class="feather-user"></i>Personal Information</button>
                            {{-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <i class="feather-unlock"></i>Change Password</button> 
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="feather-bell"></i>Notification Setting</button> --}}
                        </div>
                    </nav>
                    <!-- End tabs area -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 mt_sm--30">
                    <div class="tab-content tab-content-edit-wrapepr" id="nav-tabContent">

                        <!-- sigle tab content -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <!-- start personal information -->
                            <div class="nuron-information">
                                @if($errors->first('image')=="true")
                                <div style="text-align: center;background-color:#3eb75e;border-color:#3eb75e;color:white;" class="alert alert-success" role="alert">
                                    Image uploaded successfully!
                                  </div>
                                  <br>
                                @endif

                                <div class="profile-change row g-5">
                                    <div class="profile-left col-lg-4">
                                        <div class="profile-image mb--30">
                                            <h6 class="title">Change Your Profile Picture</h6>
                                            @if($user->pp==null && $user->gender==1)
                                            <a href="javascript:void()"><img  id="rbtinput1" src="{{asset('assets/images/icons/boy-avater.png')}}"  alt="Images"></a>
                                            @elseif($user->pp==null && $user->gender==0)
                                            <a href="javascript:void()"><img id="rbtinput1"  src="{{asset('assets/images/icons/girl-avater.png')}}" alt="Images"></a>
                                            @else
                                            <a href="javascript:void()"><img  id="rbtinput1" src="{{asset($user->pp)}}"  alt="Images"></a>
                                            @endif
                                            
                                        </div>
                                        <div style="justify-content: center" class="button-area">
                                            <div  class="brows-file-wrapper">
                                                <form  onsubmit="load()"   enctype="multipart/form-data" action="{{route('adminUpdatePP')}}"  method="post" class="text-center color-white">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{$user->userId}}">
                                                <!-- actual upload which is hidden -->
                                                <input accept="image/*"  name="fatima" id="fatima" type="file" required>
                                                <!-- our custom upload button -->
                                                <label for="fatima" title="No File Choosen">
                                                   Upload Profile
                                                </label>
                                            </div>
                                            <!-- <a href="#" class="btn-primary-alta btn" onclick="customAlert.alert('Confirm to Delete Your Profile Picture?')">Delete</a> -->
                                        </div>
                                        <br>
                                        <div style="display: flex;justify-content:center">
                                            <input type="submit" value="Save">
                                        </form>
                                        </div>
                                    </div>

                                    <div class="profile-left right col-lg-8">
                                        <div class="profile-image mb--30">
                                            <h6 class="title">Change Your Cover Photo</h6>
                                            @if($user->cover==null)
                                            <a href="javascript:void()"><img  id="rbtinput2" src="{{asset('assets/images/bg/bg-image-9.jpg')}}" alt="Images"></a>
                                            @else
                                            <a href="javascript:void()"><img  id="rbtinput2" src="{{asset($user->cover)}}"  alt="Images"></a>
                                            @endif
                                        </div>
                                        <div style="justify-content: center" class="button-area">
                                            <div  class="brows-file-wrapper">
                                                <form onsubmit="load()"   enctype="multipart/form-data" action="{{route('adminUpdateCover')}}" accept="image/*"  method="post" class="text-center color-white">
                                               @csrf
                                                    <!-- actual upload which is hidden -->
                                                <input accept="image/*"  name="nipa" id="nipa" type="file" required>
                                                <input type="hidden" name="userId" value="{{$user->userId}}">
                                                <!-- our custom upload button -->
                                                <label for="nipa" title="No File Choosen">
                                                   Upload Cover
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                        <div style="display: flex;justify-content:center">
                                            <input type="submit" value="Save">
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
                            <!-- End personal information -->
                        </div>
                        <!-- End single tabv content -->
                        <!-- sigle tab content -->
                        <div class="tab-pane fade" id="nav-homes" role="tabpanel" aria-labelledby="nav-home-tab">
                            <!-- start personal information -->
                     
                            @if($errors->first('info')=="true")
                            <div style="text-align: center;background-color:#3eb75e;border-color:#3eb75e;color:white;" class="alert alert-success" role="alert">
                               Personel information has been updated.
                              </div>
                              <br>
                            @endif

                            <div class="nuron-information">
                                <div>
                                    <form onsubmit="load()" action="{{route('adminUpdateInfo')}}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="userId" value="{{$user->userId}}">

                                    <div  class="input-two-wrapper mb--15">
            
                                        <div  class="first-name half-wid">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input  onkeydown="return /[a-z ]/i.test(event.key)" style="width: 99%;" name="firstName" id="firstName" type="text" value="{{$user->first_name}}" minlength="2" maxlength="100" required>                                      
                                        </div>
                                        <div class="last-name half-wid">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input  onkeydown="return /[a-z ]/i.test(event.key)" style="width: 99%;" name="lastName" id="lastName" type="text" value="{{$user->last_name}}" minlength="2" maxlength="100" required>
                                        </div>
                                    </div>
                                    <div class="email-area">
                                        <label for="email" class="form-label">Edit  Email</label>
                                        <input class="@if($errors->first('email')) form-control is-invalid @endif"  value="{{$user->email}}"  type="email" name="email" id="email" required>
                                        @if($errors->first('email'))
                                       <span class="invalid-feedback" role="alert" style="display: block">
                                           <strong>{{$errors->first('email')}}</strong>
                                       </span>
                                       @endif
                                    </div>
                                </div>
 

                                <!-- edit bio area Start-->
                                <div class="edit-bio-area mt--15">
                                    <label for="bio" class="form-label">Edit  Bio</label>
                                    <textarea name="bio" required minlength="2" maxlength="250" id="bio">{{$user->bio}}</textarea>
                                </div>
                                <br>
                                <div class="new-password half-wid">
                                    <label for="password" class="form-label">Change Password</label>
                                    <input   type="password" name="password" id="password" minlength="6"   >
                                </div>
                                <!-- edit bio area End -->
                                <div class="button-area save-btn-edit">
                                    {{-- <a href="#" class="btn btn-primary-alta mr--15" onclick="customAlert.alert('Cancel Edit Profile?')">Cancel</a> --}}
                                    {{-- <a href="#" class="btn btn-primary" onclick="customAlert.alert('Successfully Saved Your Profile?')">Save</a> --}}
                                <input class="btn btn-primary save-btn-edit" type="submit" value="Save">
                            </form>

                                </div>

                            </div>

                            <!-- End personal information -->
                        </div>
                        <!-- End single tabv content -->

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            @if($errors->first('password')=="true")
                            <div style="text-align: center;background-color:#3eb75e;border-color:#3eb75e;color:white;" class="alert alert-success" role="alert">
                               Your password has been updated.
                              </div>
                              <br>
                            @endif
                            <!-- change password area Start -->
                            <div class="nuron-information">
                                <div class="condition">
                                    <h5 class="title">Create Your Password</h5>
                                    <p class="condition">
                                        Passwords are a critical part of information and network security. Passwords
                                        serve to protect user accounts but a poorly chosen password, if compromised,
                                        could put the entire network at risk.
                                    </p>
                                    @if($errors->first('error'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong style="font-size: 20px">{{$errors->first()}}</strong>
                                        <br>
                                    </span>
                                    @elseif($errors->first('samePass'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong style="font-size: 20px">{{$errors->first('samePass')}}</strong>
                                    </span>
                                    @endif

                                    <hr />
                                    <form onsubmit="load()" action="{{route('updatePw',$user->userId)}}" method="post">
                                     {{csrf_field()}}
                                     @csrf

                                    <div class="email-area">
                                        <label for="email" class="form-label">Enter Email</label>
                                        <input class="@if($errors->first('error')) form-control is-invalid @endif"  type="email" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="input-two-wrapper mt--15">
                                    <div class="old-password half-wid">
                                        <label for="oldPassword" class="form-label">Enter Old Password</label>
                                        <input  class="@if($errors->first('error')) form-control is-invalid @endif"    name="oldPassword" id="oldPassword" type="password" required minlength="6">
                                    </div>
                                    <div class="new-password half-wid">
                                        <label for="password" class="form-label">Create Password</label>
                                        <input class="@if($errors->first('samePass')) form-control is-invalid @endif"  type="password" name="password" id="password" minlength="6"  required>
                                    </div>
                                </div>
                                <div class="email-area mt--15">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input   class="@if($errors->first('samePass')) form-control is-invalid @endif" onkeyup='check();' type="password" id="confirm_password"  minlength="6"  required>
                                    <span id='message'></span>
                                </div>
                                <input class="btn btn-primary save-btn-edit" type="submit" value="Save" id="changePw">
                           {{-- <a href="#" class="btn btn-primary save-btn-edit" onclick="customAlert.alert('Successfully Changed Password?')">Save</a> --}}
                            </div>
                        </form>

                            <!-- change password area ENd -->
                        </div>

                        <div class="tab-pane fade " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                            <!-- start Notification Setting  -->
                            <div class="nuron-information">
                                <h5 class="title">Make Sure Your Notification setting </h5>
                                <p class="notice-disc">
                                    Notification Center is where you can find app notifications and Quick Settings—which
                                    give you quick access to commonly used settings and apps. You can change your
                                    notification settings at any time from the Settings app. Select Start , then select
                                    Settings
                                </p>
                                <hr />
                                <!-- start notice wrapper parrent -->
                                <div class="notice-parent-wrapper d-flex">
                                    <div class="notice-child-wrapper">
                                        <!-- single notice wrapper -->
                                        <div class="single-notice-setting">
                                            <div class="input">
                                                @if($user->orderNotification==1)
                                                <input onchange="notification('order')" checked type="checkbox" id="order" name="theme-switch" class="theme-switch__input" />
                                                @else
                                                <input onchange="notification('order')" type="checkbox" id="order" name="theme-switch" class="theme-switch__input" />
                                                @endif
                                                <label for="order" class="theme-switch__label">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="content-text">
                                                <p>Order Confirmation Notice</p>
                                            </div>
                                        </div>
                                        <!-- single notice wrapper End -->

                                        <!-- single notice wrapper -->
                                        <div class="single-notice-setting mt--15">
                                            <div class="input">
                                                @if($user->itemsUpdate==1)
                                                <input onchange="notification('items')" checked type="checkbox" id="items" name="theme-switch" class="theme-switch__input" />
                                               @else
                                               <input onchange="notification('items')" type="checkbox" id="items" name="theme-switch" class="theme-switch__input" />
                                                @endif
                                                <label for="items" class="theme-switch__label">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="content-text">
                                                <p>Items Update Notification</p>
                                            </div>
                                        </div>
                                        <!-- single notice wrapper End -->

                                        <!-- single notice wrapper -->
                                        <div class="single-notice-setting mt--15">
                                            <div class="input">
                                                @if($user->newBid==1)
                                                <input  onchange="notification('newBid')" checked type="checkbox" id="newBid" name="theme-switch" class="theme-switch__input" />
                                               @else
                                               <input onchange="notification('newBid')" type="checkbox" id="newBid" name="theme-switch" class="theme-switch__input" />
                                                @endif
                                                <label for="newBid" class="theme-switch__label">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="content-text">
                                                <p>New Bid Notification</p>
                                            </div>
                                        </div>
                                        <!-- single notice wrapper End -->

                                        <!-- single notice wrapper -->
                                        {{-- <div class="single-notice-setting mt--15">
                                            <div class="input">
                                                <input type="checkbox" id="newPAy" name="theme-switch" class="theme-switch__input" />
                                                <label for="newPAy" class="theme-switch__label">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="content-text">
                                                <p>Payment Card Notification</p>
                                            </div>
                                        </div> --}}
                                        <!-- single notice wrapper End -->

                                        <!-- single notice wrapper -->
                                        {{-- <div class="single-notice-setting mt--15">
                                            <div class="input">
                                                <input  type="checkbox" id="EndBid" name="theme-switch" class="theme-switch__input" />
                                                <label for="EndBid" class="theme-switch__label">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="content-text">
                                                <p>Ending Bid Notification Before 5 min</p>
                                            </div>
                                        </div> --}}
                                        <!-- single notice wrapper End -->

                                        <!-- single notice wrapper -->
                                        {{-- <div class="single-notice-setting mt--15">
                                            <div class="input">
                                                <input type="checkbox" id="Approve" name="theme-switch" class="theme-switch__input" />
                                                <label for="Approve" class="theme-switch__label">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="content-text">
                                                <p>Notification for approving product</p>
                                            </div>
                                        </div> --}}
                                        <!-- single notice wrapper End -->
                                    </div>



                                    <div class="notice-child-wrapper">
                                    </div>
                                </div>
                                <!-- end notice wrapper parrent -->
                                {{-- <a href="#" class="btn btn-primary save-btn-edit" onclick="customAlert.alert('Successfully saved Your Notificationm setting')">Save</a> --}}
                            </div>
                            <!-- End Notification Setting  -->


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End tabs area -->


    <!-- Start Footer Area -->


    <div style="display: none" id="loading-wrapper">
        <div id="loading-text">LOADING</div>
        <div id="loading-content"></div>
      </div>

      <script>
          function load()
          {
              var load=document.getElementById('loading-wrapper');
              load.style.display="block";
          }
      </script>

<link rel="stylesheet" href="{{asset('assets/css/load.css')}}">

    
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
 
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 

    <script>
        function notification(id)
        {
            var noti=document.getElementById(id).checked;

            if(noti==true)
            noti=1;
            else
            noti=0;

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }});
          $.ajax({
            method: "post",
            type: "post",
            url: '{{route('updateNotification')}}',
            data: {'notification':id,'stat':noti},
            success: function (response) {
            
            },
            error:function (error)
            {
               
            }
                
        });
        }
            

            
    </script>



<script>


    var homeTab=document.getElementById('nav-home-tab');
    var homeTabs=document.getElementById('nav-home-tabs');
 

    var home=document.getElementById('nav-home');
    var homes=document.getElementById('nav-homes');
 
    var tab=localStorage.getItem("tab");

homeTab.classList.remove('active');
home.classList.remove('active');
home.classList.remove('show');


if(tab=="nav-home-tab")
{
 homeTab.classList.add('active');
 home.classList.add('show');
 home.classList.add('active');
}
else if(tab=="nav-home-tabs")
{
 homeTabs.classList.add('active');
 homes.classList.add('show');
 homes.classList.add('active');

}
else
{
 homeTab.classList.add('active');
 home.classList.add('show');
 home.classList.add('active');
}

    homeTab.addEventListener('click',function()
    {
     console.log("nav-home-tab")
     localStorage.setItem("tab","nav-home-tab");
    })

    homeTabs.addEventListener('click',function()
    {
     console.log("nav-home-tabs")
     localStorage.setItem("tab","nav-home-tabs");
    })


</script>

    @include('include/footer')