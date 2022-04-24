
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    <!-- CSS 
    ============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/feature.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/load.css')}}">


    <style>
       .form-control.is-invalid:focus, .was-validated .form-control:invalid:focus {
           border: 2px solid #ff0000 !important;
          -webkit-box-shadow: 0 0 0 0.25rem rgb(220 53 69 / 25%) !important;
          box-shadow: 0 0 0 0.25rem rgb(220 53 69 / 25%) !important;
          background:#242435 !important;
          color: white !important;
         }
      
      .active-light-mode .form-wrapper-one .form-control.is-invalid:focus, .was-validated .form-control:invalid:focus {
           border: 2px solid #ff0000 !important;
          -webkit-box-shadow: 0 0 0 0.25rem rgb(220 53 69 / 25%) !important;
          box-shadow: 0 0 0 0.25rem rgb(220 53 69 / 25%) !important;
          background:#f5f8fa !important;
          color: black !important;
      }

      </style>

</head>
 


<body class="template-color-1 with-particles">
    <div id="particles-js"></div>
    <!-- Preloader -->
   {{-- <div class="preloader">
        <div class='loader'>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
        </div>
    </div>   --}}
  
    {{-- loader2 --}}
    {{-- <div style="display: block" id="loading-wrapper">
        <div id="loading-text">LOADING</div>
        <div id="loading-content"></div>
      </div>
      --}}
   
    @if(Route::current()->getName()=='index')
    <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
    {{-- <header class="rn-header haeder-default black-logo-version header--transparent header--fixed header--sticky"> --}}
    @elseif(Route::current()->getName()=='nftDetail')
    <header class="rn-header haeder-default black-logo-version header--fixed">
    @else
    <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
    @endif


    {{-- rn-header rn-header-four haeder-default black-logo-version header--transparent --}}
    <div class="container">
        <div class="header-inner">
            <div class="header-left">
                <div class="logo-thumbnail logo-custom-css">
                    <a class="logo-light" href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo-white.png')}}" alt="nft-logo"></a>
                    <a class="logo-dark" href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo-dark.png')}}" alt="nft-logo"></a>
                </div>
                <div class="mainmenu-wrapper">
                    <nav id="sideNav" class="mainmenu-nav d-none d-xl-block">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('createPage')}}">Create</a></li>
                            <li><a href="{{route('explore')}}">Explore</a></li>
                            <li><a href="{{route('soon')}}">Coin</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>

                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                </div>
            </div>
            <div class="header-right">
                <div class="setting-option d-none d-lg-block">
                    <form class="search-form-wrapper" method="GET" action="{{route('explore','search')}}">
                        @if(isset($search) && $search!=null)
             
                        <input onblur="blurTest()" onclick="myFunction(this.value)"  oninput="myFunction(this.value)" name="search" value="{{$search}}" type="search" placeholder="Search Here" aria-label="Search">
                        @else
                        <input onblur="blurTest()" onclick="myFunction(this.value)"  oninput="myFunction(this.value)" name="search" type="search" placeholder="Search Here" aria-label="Search">
                        @endif
                        <div class="search-icon">
                            <button><i class="feather-search"></i></button>
                        </div>
                    </form>

                    <form id="searchForm" action="{{route('searchUser')}}">
                        @csrf
                        <input type="hidden" name="search" id="searchFormInput">
                    </form>
                    
                      <div id="searchUser" style="display: none;position:absolute">
                        <div style="" class="setting-option rn-icon-list user-account">
                            <div style="margin-left:50px;visibility:visible;opacity:1;top:25%!important;display:block;z-index:999;position: absolute;right:-290px;padding:10px 10px;" class="rn-dropdown">
                                <ul id="userList" style="margin-top: -20px;" class="list-inner">
                                    <li style="padding: 2px 0;" >
                                        <div style="margin-top: 5px;text-align:center" class="thumbnail"> We couldn't find any users. </div>
                                    </li>
                                </ul>
                            </div>
                      </div>
                    </div>  
                    
                </div>
                <div class="setting-option rn-icon-list d-block d-lg-none">
                    <div class="icon-box search-mobile-icon">
                        <button><i class="feather-search"></i></button>
                    </div>
                    <form id="header-search-1" action="{{route('explore')}}" method="GET" class="large-mobile-blog-search">
                        <div class="rn-search-mobile form-group">
                            <button type="submit" class="search-button"><i class="feather-search"></i></button>
                            @if(isset($search) && $search!=null)
                            <input name="search" value="{{$search}}" type="search" placeholder="Search Here" aria-label="Search">
                            @else
                            <input name="search" type="search" placeholder="Search Here" aria-label="Search">
                            @endif
                        </div>
                    </form>
                </div>

               
<!-- ********************************** login   -->
   <style>
        @media only screen and (max-width: 767px)
       {
        .rn-icon-list.user-account .rn-dropdown 
        {
            right: -150px
        }
       }
  
   </style>

   @if(!Auth::check())
                <div class="setting-option rn-icon-list user-account">
                    <div class="icon-box">
                        <a href="{{route('login')}}"><i class="feather-user"></i><span class="badge"></span></a>
                    </div>
                    <div style="margin-left:50px" class="rn-dropdown">
                        <ul style="margin-top: -20px;" class="list-inner">
 
                            <li style="padding: 2px 0;" ><a href="{{route('login')}}">Login<i data-feather="log-in"></i> </a></li>
                            <li style="padding: 2px 0;"><a href="{{route('sign-up')}}">Sing Up<i data-feather="user-plus"></i></a></li>
                            <li style="padding: 2px 0;"><a href="{{route('forget')}}">Forget Password<i data-feather="key"></i></a></li>
                        </ul>
                    </div>
                </div>


          @else
 
                    <div class="setting-option rn-icon-list user-account">
                        <div class="icon-box">
                            @if(@Auth::user()->pp==null && @Auth::user()->gender==1)
                            <a href="{{route('my')}}"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:39px;height:39px" alt="Images"></a>
                            @elseif(@Auth::user()->pp==null && @Auth::user()->gender==0)
                            <a href="{{route('my')}}"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:39px;height:39px" alt="Images"></a>
                            @else
                            <a href="{{route('my')}}"><img src="{{asset(@Auth::user()->pp)}}"  style="width:39px;height:39px" alt="Images"></a>
                            @endif
                            <div class="rn-dropdown">
                                <!-- <div class="rn-inner-top">
                                    <h4 class="title"><a href="product-details.html">Christopher William</a></h4>
                                </div> -->
                                <div class="rn-product-inner">
                                    <ul class="product-list">
                                        <li class="single-product-list">
                                            <div class="thumbnail">
                                                @if(@Auth::user()->pp==null && @Auth::user()->gender==1)
                                                <a href="{{route('my')}}"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                                @elseif(@Auth::user()->pp==null && @Auth::user()->gender==0)
                                                <a href="{{route('my')}}"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                                @else
                                                <a href="{{route('my')}}"><img src="{{asset(@Auth::user()->pp)}}"  style="width:40px;height:40px"  alt="Images"></a>
                                                @endif
                                            </div>
                                            <div class="content">
                                              
                                            
                                                <h4 class="title"><a href="{{route('my')}}">{{@Auth::user()->first_name}} {{@Auth::user()->last_name}}</a></h4>
                                            </div>
                                            <div class="button"></div>
                                        </li>
                                        <li class="single-product-list">
                                            <div class="thumbnail">
                                                <a href="javascript:void()"><img src="{{asset('assets/images/icons/wallet.png')}}"  width="40px" height="40px" alt="Nft Product Images"></a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="javascript:void()">Balance</a></h6>
                                                <span class="price"><a href="javascript:void()">{{@Auth::user()->balance}} ETH<img style="margin-top: -5px;" src="{{asset('assets/images/icons/toke.png')}}"  width="25px" height="25px" alt=""></a>  </span>
                                            </div>
                                            <div class="button"></div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>

                                <ul style="margin-top: -20px;" class="list-inner">
                                    <li><a href="{{route('my')}}">My Profile  </a></li>
                                    <li><a href="{{route('editProfile')}}">Edit Profile</a></li>
                                    <li><a href="{{route('bids')}}">Top Bids</a></li>
                                    <li><a href="{{route('sign-out')}}">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                </div>
          @endif

                <div class="setting-option mobile-menu-bar d-block d-xl-none">
                    <div class="hamberger">
                        <button class="hamberger-button">
                            <i class="feather-menu"></i>
                        </button>
                    </div>
                </div>

                <div id="my_switcher" class="my_switcher setting-option">
                    <ul>
                        <li>
                            <a href="javascript: void(0);" data-theme="light" class="setColor light">
                                <img class="sun-image" src="{{asset('assets/images/icons/sun-01.svg')}}" alt="Sun images">
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                                <img class="Victor Image" src="{{asset('assets/images/icons/vector.svg')}}" alt="Vector Images">
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</header>

<div class="popup-mobile-menu">
    <div class="inner">
        <div class="header-top">
            <div class="logo logo-custom-css">
                <a class="logo-light" href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo-white.png')}}" alt="nft-logo"></a>
                <a class="logo-dark" href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo-dark.png')}}" alt="nft-logo"></a>
            </div>
            <div class="close-menu">
                <button class="close-button">
                    <i class="feather-x"></i>
                </button>
            </div>
        </div>
        <nav>
            <!-- Start Mainmanu Nav -->
            <ul class="mainmenu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('createPage')}}">Create</a></li>
                <li><a href="{{route('explore')}}">Explore</a></li>
                <li><a href="{{route('soon')}}">Coin</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
            <!-- End Mainmanu Nav -->
        </nav>
    </div>
</div>