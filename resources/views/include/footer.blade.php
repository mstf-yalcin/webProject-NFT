<div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="widget-content-wrapper">
                    <div class="footer-left">
                        <div class="logo-thumbnail logo-custom-css">
                            <a class="logo-light" href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo-white.png')}}" alt="nft-logo"></a>
                            <a class="logo-dark" href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo-dark.png')}}" alt="nft-logo"></a>
                        </div>
                        <p class="rn-footer-describe">
                            Created with the collaboration of over 60 of the world's best Nuron Artists.
                        </p>
                    </div>
                    <div class="widget-bottom mt--40 pt--40">
                        <h6 class="title">Get The Latest Nuron Updates </h6>
                        <div class="input-group">
                            <input type="text" class="form-control bg-color--2" placeholder="Your username" aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button class="btn btn-primary-alta btn-outline-secondary" type="button">Subscribe</button>
                            </div>
                        </div>
                        <div class="newsletter-dsc">
                            <p>Email is safe. We don't spam.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_mobile--40">
                <div class="footer-widget widget-quicklink">
                    <h6 class="widget-title">Nuron</h6>
                    <ul class="footer-list-one">
                        <li class="single-list"><a href="{{route('connect')}}">Protocol Explore</a></li>
                        <li class="single-list"><a href="{{route('maintanance')}}">System Token</a></li>
                        <li class="single-list"><a href="{{route('about')}}">Otimize Time</a></li>
                        <li class="single-list"><a href="{{route('soon')}}">Visual Checking</a></li>
                        <li class="single-list"><a href="{{route('term')}}">Fadeup System</a></li>
                        <li class="single-list"><a href="{{route('policy')}}">Activity Log</a></li>
                        <li class="single-list"><a href="{{route('support')}}">System Auto Since</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                <div class="footer-widget widget-information">
                    <h6 class="widget-title">Resources</h6>
                    <ul class="footer-list-one">
                        <li class="single-list"><a href="{{route('policy')}}">Privacy Policy</a></li>
                        <li class="single-list"><a href="{{route('support')}}">Support Center</a></li>
                        <li class="single-list"><a href="{{route('maintanance')}}">Product Checking</a></li>
                        <li class="single-list"><a href="{{route('term')}}">Terms & Condition</a></li>
                        <li class="single-list"><a href="{{route('maintanance')}}">News</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                <div class="footer-widget widget-information">
                    <h6 class="widget-title">Company</h6>
                    <ul class="footer-list-one">
                        <li class="single-list"><a href="{{route('about')}}">About</a></li>
                        <li class="single-list"><a href="{{route('support')}}">FAQ</a></li>
                        <li class="single-list"><a href="{{route('policy')}}">Privacy Policy</a></li>
                        <li class="single-list"><a href="{{route('policy')}}">Community Rules</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Area -->
<!-- Start Footer Area -->
<div class="copy-right-one ptb--20 bg-color--1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="copyright-left">
                    <span>©2022 Nuron, Inc. All rights reserved.</span>
                    <ul class="privacy">
                        <li><a href="{{route('term')}}">Terms</a></li>
                        <li><a href="{{route('policy')}}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="copyright-right">
                    <ul class="social-copyright">
                        <li><a href="http://github.com/mstf-ylcn" target="_blank"><i data-feather="github"></i></a></li>
                        <li><a href="javascript:void(0)"><i data-feather="twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/mustafayalcin.jpg" target="_blank"><i data-feather="instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/mstf-ylcn/" target="_blank"><i data-feather="linkedin"></i></a></li>
                        <li><a href="mailto:mstf.yalcin@outlook.com"><i data-feather="mail"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Area -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- Start Top To Bottom Area  -->
<div class="rn-progress-parent">
    <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<script>
  
    function blurTest()
    {
        setTimeout(() => {
            var searchUser=document.getElementById('searchUser');
        searchUser.style.display="none";
        }, 100);
   
    }
  
   
  
    function myFunction(value)
    {
        
   

        var searchUser=document.getElementById('searchUser');
        searchUser.style.display="block";
        console.log(value);
  
    var userList=document.getElementById('userList');
    searchFormInput.value=value;
   
    if(value=="")
    {
        searchUser.style.display="none";

    }

        $.ajax({
              method: "post",
              type: "post",
              url: '{{route('searchUser')}}',
              data: {'search':value,'_token': $('meta[name="csrf-token"]').attr('content')},
              success: function (response) {
                  var sum="";
                  console.log(response);
                  if(response.users.length!=0)
                  {
                    response.users.forEach(data => {
                      if(data.pp==null && data.gender==1)
                          sum+=`<li style="padding: 2px 0;" ><a href="${data.userId}"><div class="thumbnail"><img src="{{asset("assets/images/icons/boy-avater.png")}}" style="width:48px;height:48px;border-radius:50%;margin-right:10px" alt="Images"> ${data.first_name} ${data.last_name} </div> </a></li>`
                      else if(data.pp==null && data.gender==0)
                      sum+=`<li style="padding: 2px 0;" ><a href="${data.userId}"><div class="thumbnail"><img src="{{asset("assets/images/icons/girl-avater.png")}}" style="width:48px;height:48px;border-radius:50%;margin-right:10px" alt="Images"> ${data.first_name} ${data.last_name} </div> </a></li>`
                      else
                      sum+=`<li style="padding: 2px 0;" ><a href="${data.userId}"><div class="thumbnail"><img src="${data.pp}" style="width:48px;height:48px;border-radius:50%;margin-right:10px" alt="Images"> ${data.first_name} ${data.last_name} </div> </a></li>`
                        });
                  userList.innerHTML=sum;
                  }
                  else
                  {
                    userList.innerHTML=`<li style="padding: 2px 0;" > <div style="margin-top: 5px;text-align:center" class="thumbnail"> We couldn't find any users. </div></li>`
                  }
               
              },
              error:function (error)
              {
                  console.log(error);
  
              }
          });

     
  
    }
      
  </script>

 


 
<!-- End Top To Bottom Area  -->
<!-- JS ============================================ -->
<script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/vendor/modernizer.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/feather.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/sal.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/waypoint.js')}}"></script>
<script src="{{asset('assets/js/vendor/wow.js')}}"></script>
<script src="{{asset('assets/js/vendor/particles.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.style.swicher.js')}}"></script>
<script src="{{asset('assets/js/vendor/js.cookie.js')}}"></script>
<script src="{{asset('assets/js/vendor/count-down.js')}}"></script>
<script src="{{asset('assets/js/vendor/counter-up.js')}}"></script>
<script src="{{asset('assets/js/vendor/isotop.js')}}"></script>
<script src="{{asset('assets/js/vendor/imageloaded.js')}}"></script>
<script src="{{asset('assets/js/vendor/backtoTop.js')}}"></script>
<script src="{{asset('assets/js/vendor/scrolltrigger.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.custom-file-input.js')}}"></script>
<script src="{{asset('assets/js/vendor/savePopup.js')}}"></script>
<!-- main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<!-- Meta Mask  -->


<script>

var screenWidth = $(window).width();
            if (screenWidth > 500) {
    particlesJS('particles-js',

        {
            "particles": {
                "number": {
                    "value": 40,
                    "density": {
                        "enable": true,
                        "value_area": 1000
                    }
                },
                "color": {
                    "value": ["#7FC7BD", "#ffE7BD", ]
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 4
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.8,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.08,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 4,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 800,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true,
            "config_demo": {
                "hide_card": false,
                "background_color": "#b61924",
                "background_image": "",
                "background_position": "50% 50%",
                "background_repeat": "no-repeat",
                "background_size": "cover"
            }
        }
          
    )
            }
</script>
</body>
</html>