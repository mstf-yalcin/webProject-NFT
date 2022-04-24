<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget Page || Nuron - NFT Marketplace Template</title>

    @include('include/header')
    <!-- End Header Area -->
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Forget Password?</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{route('index')}}">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Forget Password?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->

    <div class="forget-password-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <div class="offset-4 col-lg-4">
                    <div class="form-wrapper-one">
                        <div class="logo-thumbnail logo-custom-css mb--30">
                            <a class="logo-light" href="index.html"><img src="assets/images/logo/logo-white.png" alt="nft-logo"></a>
                            <a class="logo-dark" href="index.html"><img src="assets/images/logo/logo-dark.png" alt="nft-logo"></a>
                        </div>

                        @if($errors->first('success'))
                        <div style="background-color:#3eb75e;border-color:#3eb75e;color:white;" class="alert alert-success" role="alert">
                            {{$errors->first('success')}}
                          </div>
                        <br>
                        @endif

                        <form onsubmit="load()" action="{{route('forgetSend')}}" method="POST">
                         @csrf
                        <div class="mb-5">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-5">
                            <input type="checkbox" class="rn-check-box-input" id="exampleCheck1" required>
                            <label class="rn-check-box-label" for="exampleCheck1">I agree to the <a target="_blank" href="{{route('policy')}}">privacy policy</a> </label>
                        </div>

                        <div class="mb-5">
                            <button  type="submit" class="btn btn-large btn-primary">Send</button>
                        </div>
                      </form>
                        <span class="mt--20 notice">Note: We will send a password to your email</span>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content share-wrapper">
                <div class="modal-header share-area">
                    <h5 class="modal-title">Share this NFT</h5>
                </div>
                <div class="modal-body">
                    <ul class="social-share-default">
                        <li><a href="#"><span class="icon"><i data-feather="facebook"></i></span><span class="text">facebook</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="twitter"></i></span><span class="text">twitter</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="linkedin"></i></span><span class="text">linkedin</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="instagram"></i></span><span class="text">instagram</span></a></li>
                        <li><a href="#"><span class="icon"><i data-feather="youtube"></i></span><span class="text">youtube</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content report-content-wrapper">
                <div class="modal-header report-modal-header">
                    <h5 class="modal-title">Why are you reporting?
                    </h5>
                </div>
                <div class="modal-body">
                    <p>Describe why you think this item should be removed from marketplace</p>
                    <div class="report-form-box">
                        <h6 class="title">Message</h6>
                        <textarea name="message" placeholder="Write issues"></textarea>
                        <div class="report-button">
                            <button type="button" class="btn btn-primary mr--10 w-auto">Report</button>
                            <button type="button" class="btn btn-primary-alta w-auto" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    @include('include/footer')