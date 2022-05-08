<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> {{$nft->name}} -Asset Details || Nuron - NFT Marketplace Template</title>

    <style>.toast {
        top: 10px
    }

    </style>
 @include('include/header')

    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Product Details</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="index.html">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->

    <!-- start product details area -->
    <div class="product-details-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <!-- product image area -->

                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="product-tab-wrapper rbt-sticky-top-adjust">
                        <div  style="justify-content: center;" class="pd-tab-inner">
                            <div style="width: 100%;" class="tab-content rn-pd-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="rn-pd-thumbnail">
                                        @if($nft->dataType=='image')
                                        <img src="{{asset($nft->data)}}" alt="Nft_Profile">
                                        @elseif($nft->dataType=='audio')
                                        <div style="display: flex;justify-content:center;align-items:center">
                                            <img src="{{asset('assets/images/icons/audio.png')}}" style="width:75%" alt="Nft_Profile">
                                        </div>
                                        <div onclick="playAudio('Explore{{$nft->dataType}}')" >
                                            <div class="input-box">
                                                <button id="playButtonExplore{{$nft->dataType}}"  type="button" style="width:100%;" class="btn btn-primary-alta" >
                                                    Play <i class="bi bi-play-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                          <audio  controls="controls" id="audioPreviewModalExplore{{$nft->dataType}}" controlsList="noplaybackrate nodownload" style="display:none;width: 100%;">
                                            <source src="{{asset($nft->data)}}" />
                                         </audio>
                                         @elseif($nft->dataType=="video")
                                         <video  style="width:100%;height:100%" id="video" controlslist="nodownload" loop="true" autoplay="autoplay" muted   controls>
                                            <source src="{{asset($nft->data)}}" style="" id="">
                                              Your browser does not support HTML5 video.
                                          </video>
                                        @endif
                                        {{-- <video data-testid="video-asset" style="width:100%;height:auto" role="video" src="{{asset($nft->data)}}" alt="{{$nft->name}}" controls="" autoplay controlslist="nodownload" loop="true" autoplay="autoplay" muted></video> --}}
                                    </div>
                                </div>
                             
                            </div>

                        </div>
                    </div>
                </div>
                <!-- product image area end -->

                <div class="col-lg-5 col-md-12 col-sm-12 mt_md--50 mt_sm--60">
                    <div class="rn-pd-content-area">
                        <div class="pd-title-area">
                            <h4 class="title">{{$nft->name}}</h4>
                            <div class="pd-react-area">
                                <div style="display: flex;justify-content:flex-end;align-items:center;margin-right:15px">
                                    <label class="toggle">
                                        <input id="buttonCheck"  onclick="switchDate()" class="toggle-checkbox" type="checkbox">
                                        <div class="toggle-switch"></div>
                                    </label>
                                   </div>
                                <form action="javascript:void(null)" id="likeNftFormAsset"> 
                                    <input type="hidden" id="likeNftAsset" value="{{$nft->nftId}}">
                                    @if(Auth::check() && $like==1)
                                <button value="1"  id="likeButton" class="heart-count btn btn-primary-alta heartButton">
                                    <svg  id="heartIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <span id="likeCount" >{{$likeCount}}</span>
                                </button>
                                    @elseif(Auth::check() && $like==0)
                                    <button value="0" id="likeButton" class="heart-count btn btn-primary-alta">
                                        <svg  id="heartIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                        <span id="likeCount" >{{$likeCount}}</span>
                                    </button>
                                    @else
                                    <button value="3" id="likeButton" class="heart-count btn btn-primary-alta">
                                        <svg  id="heartIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                        <span id="likeCount" >{{$likeCount}}</span>
                                    </button>
                                    @endif
                            </form>
                                <div class="count">
                                    <div class="share-btn share-btn-activation dropdown">
                                        <button class="icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                            </svg>
                                        </button>

                                        <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                            <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                                Share
                                            </button>
                                            <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                Report
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                @if(Auth::check() && Auth::user()->userId == $owner->userId)
                                <div class="count">
                                    <div class="share-btn share-btn-activation dropdown">
                                        <button onclick="location.href=`{{route('nftUpdatePage',$nft->nftId)}}`" class="icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="count">
                                    <div class="share-btn share-btn-activation dropdown">
                                        <form action="{{route('bids','nft')}}" method="GET">
                                            <input type="hidden" name="nft" value="{{$nft->nftId}}">
                                        <button  class="icon" type="submit" >
                                               <img src="{{asset('assets/images/icons/hammer.png')}}" style="height: 20px;width:20px; filter:  brightness(0) invert(1);" alt="">
                                        </button>
                                    </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <span class="bid"><span style="font-size:18px" id="nftPrice"  class="price">{{$nft->amount}}</span> ETH<img style="margin-top: -5px;" src="{{asset('assets/images/icons/toke.png')}}"  width="30px" height="30px" alt=""><span>(${{number_format($ethDollar, 2, ',', '.')}})</span>
                        <h6   class="title-name">
                            #{{$nft->size}}  <span style="color:#acacac;font-size:15px"> &nbsp;&nbsp;Size</span>
                        </h6>
                        <div class="catagory-collection">
                            <div class="catagory">
                                <span>Creater <span class="color-body">
                                        {{$nft->royality}}% Royalties</span></span>
                                <div class="top-seller-inner-one">
                                    <div class="top-seller-wrapper">
                                        <div class="thumbnail">
                                            @if($creater->pp==null && $creater->gender==1)
                                            <a href="@if(Auth::check() && Auth::user()->userId==$creater->userId){{route('my')}}
                                                     @else
                                                     {{route('userProfile',$creater->userId)}}
                                                @endif"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                            @elseif($creater->pp==null &&$creater->gender==0)
                                            <a href="@if(Auth::check() && Auth::user()->userId==$creater->userId){{route('my')}} 
                                                @else
                                                {{route('userProfile',$creater->userId)}}
                                                @endif"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                            @else
                                            <a href="@if(Auth::check() && Auth::user()->userId==$creater->userId){{route('my')}} 
                                                @else
                                               {{route('userProfile',$creater->userId)}}
                                                @endif"><img src="{{asset($creater->pp)}}"  style="width:40px;height:40px" alt="Images"></a>
                                            @endif
                                        </div>
                                        <div class="top-seller-content">
                                            <a href="@if(Auth::check() && Auth::user()->userId==$owner->userId){{route('my')}} 
                                                @else
                                                {{route('userProfile',$creater->userId)}}
                                                @endif">
                                                <h6 class="name">{{$creater->first_name}} {{$creater->last_name}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($nft->instantSale==1)
                            <div  class="collection">
                                <span>Instant Sale</span>
                                <div class="top-seller-inner-one">
                                    <div style="display:flex;justify-content:center"  class="top-seller-wrapper">
                                        <div class="input-box pb--20 rn-check-box">
                                            <input style="width:32px;height:32px;opacity:0.9;margin-top:10px" name="putonsale" value="1" class="rn-check-box-input"  disabled checked  type="checkbox" id="putonsale">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       @endif

                        </div>

                        <div class="rn-bid-details">
                            <div class="tab-wrapper-one">
                                <nav class="tab-button-one">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Bids</button>
                                        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Details</button>
                                    </div>
                                </nav>
                                <div class="tab-content rn-bid-content" id="nav-tabContent">
                                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <!-- bid history -->

                                        @foreach($bidHistory as $bidder)
                                        <div class="top-seller-inner-one">
                                            <div class="top-seller-wrapper">
                                                <div class="thumbnail">
                                                    @if($bidder->pp==null && $bidder->gender==1)
                                                    <a href="@if(Auth::check() && Auth::user()->userId==$bidder->userId){{route('my')}} 
                                                        @else
                                                        {{ route('userProfile',$bidder->userId) }}
                                                        @endif"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:39px;height:39px" alt="Images"></a>
                                                    @elseif($bidder->pp==null && $bidder->gender==0)
                                                    <a href="@if(Auth::check() && Auth::user()->userId==$bidder->userId){{route('my')}} 
                                                        @else
                                                        {{ route('userProfile',$bidder->userId) }}
                                                        @endif"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:39px;height:39px" alt="Images"></a>
                                                    @else
                                                    <a href="@if(Auth::check() && Auth::user()->userId==$bidder->userId){{route('my')}} 
                                                        @else
                                                        {{ route('userProfile',$bidder->userId) }}
                                                        @endif"><img src="{{asset($bidder->pp)}}"  style="width:39px;height:39px" alt="Images"></a>
                                                    @endif
                                                </div>
                                    
                                                <div class="top-seller-content">
                                                    <span>{{$bidder->bid}} ETH by <a href="@if(Auth::check() && Auth::user()->userId==$bidder->userId){{route('my')}} 
                                                        @else
                                                        {{ route('userProfile',$bidder->userId) }}
                                                        @endif">{{$bidder->first_name}} {{$bidder->last_name}}</a></span>
                                                    <span id="date" class="count-number">
                                                        @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($bidder->created_at))->diffForHumans() @endphp
                                                    </span>
                                                    <span style="display: none" id="date2">
                                                        @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($bidder->created_at)) @endphp
                                                    </span>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <!-- single -->
                                        <div class="rn-pd-bd-wrapper">
                                            <div class="top-seller-inner-one">
                                                <!-- <p class="disc">Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    elit. Doloribus debitis nemo deserunt.</p> -->
                                                    <div class="catagory-collection">
                                                        <div class="catagory">
                                                            <span>Owner</span>
                                                        </div>
                                                    </div>


                                                <div style="margin-top: -15px;" class="top-seller-wrapper">
                                                    <div class="thumbnail">
                                                        @if($owner->pp==null && $owner->gender==1)
                                                        <a href="@if(Auth::check() && Auth::user()->userId==$owner->userId){{route('my')}}
                                                            @else
                                                            {{ route('userProfile',$owner->userId) }}
                                                            @endif"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                                        @elseif($owner->pp==null && $owner->gender==0)
                                                        <a href="@if(Auth::check() && Auth::user()->userId==$owner->userId){{route('my')}}
                                                            @else
                                                            {{ route('userProfile',$owner->userId) }}
                                                            @endif"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                                        @else
                                                        <a href="@if(Auth::check() && Auth::user()->userId==$owner->userId){{route('my')}}
                                                            @else
                                                            {{ route('userProfile',$owner->userId) }}
                                                            @endif"><img src="{{asset($owner->pp)}}"  style="width:40px;height:40px" alt="Images"></a>
                                                        @endif
                                                    </div>
                                                    <div class="top-seller-content">
                                                        <a href="@if(Auth::check() && Auth::user()->userId==$owner->userId){{route('my')}}
                                                            @else
                                                            {{ route('userProfile',$owner->userId) }}
                                                            @endif">
                                                            <h6 class="name">{{$owner->first_name}} {{$owner->last_name}}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                                 <!-- single -->
                                                 <div class="rn-pd-sm-property-wrapper">
                                                    <h6 class="pd-property-title">
                                                        Discription
                                                    </h6>
                                                    <div class="place-bet-area">
                                                        <div style="flex-direction: column;justify-content:flex-start;transform: translateX(0%);" class="rn-bet-create">
                                                              {{$nft->discription}}
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <!-- single -->

                                            <!-- property -->
                                            <div class="rn-pd-sm-property-wrapper">
                                                <h6 class="pd-property-title">
                                                    Property
                                                </h6>
                                                <div class="property-wrapper">
                                                    <!-- single property -->
                                                    @foreach ($property as $i=> $a)
                                                        
                                                    <div class="pd-property-inner">
                                                        <span class="color-body type">Property #{{$i+1}}</span>
                                                        <span class="color-white value">{{$a}}</span>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <!-- propertyend -->
                                       
                                        </div>
                                        <!-- single -->
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- bid -->
                            {{-- <button id="switchButton" onclick="switchDate()"  class="heart-count btn btn-primary-alta">Switch Date Format</button> --}}
                            @if($nft->sellStatus==1)
                            <div class="place-bet-area">
                                <div class="rn-bet-create">
                                </div>
                                <!-- <a class="btn btn-primary-alta mt--30" href="#">Place a Bid</a> -->
                                  @auth 
                                  @if(Auth::user()->userId==$owner->userId)
                                  <button disabled type="button" class="btn btn-primary-alta mt--30" data-bs-toggle="modal" data-bs-target="#placebidModal">Place a Bid</button>
                                  @else
                                  <button   type="button" class="btn btn-primary-alta mt--30" data-bs-toggle="modal" data-bs-target="#placebidModal">Place a Bid</button>
                                  @endif
                                  @else
                                  <a href="{{route('login')}}"><button type="button"  class="btn btn-primary-alta mt--30">Place a Bid</button></a> 
                                  @endauth
                           </div>
                            @else
                            @if($winningBid && $winningBid[0])
                            <div class="place-bet-area">
                               <div class="rn-bet-create">
                                  <div class="bid-list winning-bid">
                                    <h6 class="title">Winning bid</h6>
                                       <div class="top-seller-inner-one">
                                          <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                @if($winningBid[0]->pp==null && $winningBid[0]->gender==1)
                                                <a href="@if(Auth::check() && Auth::user()->userId==$winningBid[0]->userId){{route('my')}}
                                                    @else
                                                    {{ route('userProfile',$winningBid[0]->userId) }}
                                                    @endif"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                                @elseif($winningBid[0]->pp==null && $winningBid[0]->gender==0)
                                                <a href="@if(Auth::check() && Auth::user()->userId==$winningBid[0]->userId){{route('my')}} @endif"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:40px;height:40px" alt="Images"></a>
                                                @else
                                                <a href="@if(Auth::check() && Auth::user()->userId==$winningBid[0]->userId){{route('my')}} @endif"><img src="{{asset($winningBid[0]->pp)}}"  style="width:40px;height:40px" alt="Images"></a>
                                                @endif
                                            </div>
                                            <div class="top-seller-content">
                                                <span class="heighest-bid">Heighest bid <a href="@if(Auth::check() && Auth::user()->userId==$winningBid[0]->userId){{route('my')}}
                                                    @else
                                                    {{ route('userProfile',$winningBid[0]->userId) }}
                                                    @endif">{{$winningBid[0]->first_name}} {{$winningBid[0]->last_name}}</a></span>
                                                <span class="count-number">
                                                    {{$winningBid[0]->bid}} ETH
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bid-list left-bid">
                                    <h6 class="title">Auction has ended</h6>
                                    <span id="date">
                                        @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($winningBid[0]->updated_at))->diffForHumans() @endphp
                                        {{-- @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($winningBid[0]->created_at))->diffForHumans() @endphp --}}
                                    </span>
                                    <span style="display: none" id="date2">
                                        @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($winningBid[0]->updated_at)) @endphp
                                    </span>
                                </div>
                            </div>
                            @endif
                            @endif
                              <!-- endbid -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End product details area -->



    
    <!-- Explore Style Carousel -->
    <div class="en-product-area one rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                    <!-- start single product -->
                        @if($randomNft!=null)
                @foreach ($randomNft as $i=>$nft)
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay with-placeBid">
                        <div class="card-thumbnail">
                            @if($nft->dataType=='image')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                            <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                            @elseif($nft->dataType=='audio')
                        <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                            <div  onclick="playAudio('Explore{{$i}}')" >
                                <div  class="input-box">
                                    <button  id="playButtonExplore{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                        Play <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                              <audio  controls="controls" id="audioPreviewModalExplore{{$i}}" controlsList="noplaybackrate nodownload preload" style="display:none;width: 100%;">
                                <source src="{{asset($nft->data)}}" />
                             </audio>
                            <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                            @elseif($nft->dataType=='video')
                            {{-- <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img style="" class="nftImage" src="{{asset('assets/images/icons/video.png')}}" alt="NFT_portfolio"></a> --}}
                            <video width="100%"  height="240" style="object-fit: cover" id="video" controlslist="nodownload" loop="true"  muted   controls>
                                <source src="{{asset($nft->data)}}" style="" id="">
                                  Your browser does not support HTML5 video.
                              </video>
                            @endif
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                {{-- No items to display --}}
                                @php $counter=1; $bidCounter=1;  @endphp
                                @foreach($randomNftBid as $i=>$bid)
                            @if($bid->nftId==$nft->nftId)
                                 @php  $bidCounter++; @endphp
                               @if($counter<=3)
                                  @php $counter++; @endphp
                                <a href="{{url($bid->userId)}}" class="avatar" target="_blank" data-tooltip="{{$bid->first_name}} {{$bid->last_name}}">
                                    <img style="width:30px;height:30px" src="
                                    @if($bid->pp==null && $bid->gender==1) {{asset('assets/images/icons/boy-avater.png')}}
                                    @elseif($bid->pp==null && $bid->gender==0) {{asset('assets/images/icons/girl-avater.png')}}
                                    @elseif($bid->pp!=null)  {{asset($bid->pp)}} 
                                    @endif
                                    " alt="Nft_Profile"></a>
                                @endif
                            @endif
                                @endforeach
                                @if($counter==1)
                                <a  class="more-author-text" href="{{url('nft',$nft->nftId)}}">N/A Bids.</a>
                                @else
                              @php $moreBids=($bidCounter-$counter);     
                           
                              if($moreBids>0)
                              {
                                  if($moreBids>9)
                                  echo '<a style="margin-left: 0px" class="more-author-text" href="'.url('nft',$nft->nftId).'">9+ Place Bids.</a>';

                                  else
                                  echo '<a style="margin-left: 0px" class="more-author-text" href="'.url('nft',$nft->nftId).'">'.$moreBids.'+ Place Bids.</a>';
                              }
                              else
                               echo '<a style="margin-left: 0px" class="more-author-text" href="'.url('nft',$nft->nftId).'">No More Bids</a>';

                              @endphp
                                </a>
                                @endif
                            </div>
                            <div class="share-btn share-btn-activation dropdown">
                                <button class="icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                    </svg>
                                </button>

                                <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal2{{$nft->nftId}}">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal2{{$nft->nftId}}">
                                        Report
                                    </button>
                                    {{-- <a type="button" href="{{url('create',$nft->nftId)}}" class="btn-setting-text report-text" >
                                        Update
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <a href="{{url('nft',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                @foreach ($randomNftBid as $i=>$a)
                    @if($a->nftId==$nft->nftId)
                        <span class="latest-bid">Highest bid {{$a->bid}} ETH</span>
                          @break
                        @else
                        @if($loop->last)
                        @if($a->nftId==$nft->nftId)
                        <span class="latest-bid">Highest bid {{$a->bid}} ETH</span>
                        @else
                        <span class="latest-bid">Highest bid N/A</span>
                        @endif
                        @endif
                     @endif
                @endforeach
                        <div class="bid-react-area">
                            <div class="last-bid">{{$nft->amount}} ETH</div>
                              <form action="javascript:void(null)" id="likeNftForm{{$nft->nftId}}"> 
                                @csrf
                                @if(Auth::check())
                                @php  $index=array_search(Auth::user()->userId,json_decode($nft->likes));
                                @endphp
                                @if($index==0)
                            <div onclick="likeNft('{{$nft->nftId}}')" class="react-area" id="likeArea{{$nft->nftId}}">
                                <input id="nftId" type="hidden" value="{{$nft->nftId}}">
                                <button   value="0" id="likeButton{{$nft->nftId}}" class="none-button">
                                    <svg style="margin-top: -3px"  id="heartIcon{{$nft->nftId}}" viewBox="0 0 17 16" fill="none" width="16" height="16" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart" >
                                     <path d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z" stroke="currentColor" stroke-width="2"></path>
                                    </svg>
                                    <span id="likeCount{{$nft->nftId}}">{{(count(json_decode($nft->likes))-1)}}</span>
                                </button> 
                            </div>
                            @else
                            <div onclick="likeNft('{{$nft->nftId}}')" class="react-area heartButton" id="likeArea{{$nft->nftId}}">
                                <input id="nftId" type="hidden" value="{{$nft->nftId}}">
                                <button   value="1" id="likeButton{{$nft->nftId}}" class="none-button">
                                    <svg style="margin-top: -3px"  id="heartIcon{{$nft->nftId}}" viewBox="0 0 17 16" fill="white" width="16" height="16" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart" >
                                     <path d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z" stroke="white" stroke-width="2"></path>
                                    </svg>
                                    <span style="color: white" id="likeCount{{$nft->nftId}}">{{(count(json_decode($nft->likes))-1)}}</span>
                                </button> 
                            </div>
                            @endif
                            {{-- login --}}
                            @else
                            <div onclick="likeNft('{{$nft->nftId}}')" class="react-area" id="likeArea{{$nft->nftId}}">
                                <input id="nftId" type="hidden" value="{{$nft->nftId}}">
                                <button   value="2" id="likeButton{{$nft->nftId}}" class="none-button">
                                    <svg style="margin-top: -3px"  id="heartIcon{{$nft->nftId}}" viewBox="0 0 17 16" fill="none" width="16" height="16" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart" >
                                     <path d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z" stroke="currentColor" stroke-width="2"></path>
                                    </svg>
                                    <span id="likeCount{{$nft->nftId}}">{{(count(json_decode($nft->likes))-1)}}</span>
                                </button> 
                            </div>
                            @endif
                        </form>  
                        </div>
                    </div>
                </div>

                <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal2{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
                    <button type="button" class="btn-close" data-bs-dismiss="modal{{$nft->nftId}}" aria-label="Close"><i data-feather="x"></i></button>
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content share-wrapper">
                            <div class="modal-header share-area">
                                <h5 class="modal-title">Share this NFT</h5>
                            </div>
                            <div class="modal-body">
                                <ul class="social-share-default">
                                    <li><a href="http://github.com/mstf-ylcn" target="_blank"><span class="icon"><i data-feather="github"></i></span><span class="text">github</span></a></li>
                                    <li><a href="javascript:void(0)"><span class="icon"><i data-feather="twitter"></i></span><span class="text">twitter</span></a></li>
                                    <li><a href="https://www.linkedin.com/in/mstf-ylcn/" target="_blank"><span class="icon"><i data-feather="linkedin"></i></span><span class="text">linkedin</span></a></li>
                                    <li><a href="https://www.instagram.com/mustafayalcin.jpg" target="_blank"><span class="icon"><i data-feather="instagram"></i></span><span class="text">instagram</span></a></li>
                                    <li><a href="javascript:void(0)" onclick="copy('{{$nft->nftId}}')"><span class="icon"><i data-feather="copy"></i></span><span class="text">Copy</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal2{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
                    <button type="button" class="btn-close" data-bs-dismiss="modal{{$nft->nftId}}" aria-label="Close"><i data-feather="x"></i></button>
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

                @endforeach
                @else
                <div class="rn-not-found-area rn-section-gapTop">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="rn-not-found-wrapper">
                                    <h3 class="title">No items to display</h3>
                                    <p> ANY NFT!</p>
                                    <a href="{{url('explore')}}" class="btn btn-primary btn-large">Explore NFT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                    <!-- end single product -->
                </div>
            </div>
        </div>
    </div>
    <!-- Explore Style Carousel End-->


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
                        <li><a href="http://github.com/mstf-ylcn" target="_blank"><span class="icon"><i data-feather="github"></i></span><span class="text">github</span></a></li>
                        <li><a href="javascript:void(0)"><span class="icon"><i data-feather="twitter"></i></span><span class="text">twitter</span></a></li>
                        <li><a href="https://www.linkedin.com/in/mstf-ylcn/" target="_blank"><span class="icon"><i data-feather="linkedin"></i></span><span class="text">linkedin</span></a></li>
                        <li><a href="https://www.instagram.com/mustafayalcin.jpg" target="_blank"><span class="icon"><i data-feather="instagram"></i></span><span class="text">instagram</span></a></li>
                        <li><a href="javascript:void(0)" onclick="copy('{{$nft->nftId}}')"><span class="icon"><i data-feather="copy"></i></span><span class="text">Copy</span></a></li>
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
    <!-- Modal -->
    <div class="rn-popup-modal placebid-modal-wrapper modal fade" id="placebidModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Place a bid</h3>
                </div>
    <form id="bidForm" action="javascript:void(null)">
                <div class="modal-body">
                    <p>You are about to purchase This Product Form</p>
                    <div class="placebid-form-box">
                        <h5 class="title">Your bid</h5>
                        <div class="bid-content">
                            <div class="bid-content-top">
                                <div class="bid-content-left">
                                    <input  type="number" min="0.00001" step="any"  oninput="total()" id="bidValue" type="text" name="value" required>
                                    {{-- <input onkeydown="return /[0-9|/b|.]/i.test(event.key)" type="number" step="any" min="0.000001" oninput="total()" id="bidValue" type="text" name="value" required> --}}
                                    <span>ETH</span>
                                </div>
                            </div>

                            <div class="bid-content-mid">
                                <div class="bid-content-left">
                                    <span>Your Balance</span>
                                    <span>Service fee %2.5</span>
                                    <span>Total bid amount</span>
                                </div>
                                <div class="bid-content-right">
                                    @auth
                                    <span>{{Auth::user()->balance}} ETH</span>
                                    <span id="fee" >@php $service=$nft->amount*$serviceFee;$service=substr($service,0,((strpos($service,"."))+4)); echo $service @endphp ETH</span>
                                    <span id="totalBid"> 0 ETH</span>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <span style="display: none" id="eth">{{$eth}}</span>

                        <div class="bit-continue-button">
                            @auth
                            @if(($service+$nft->amount)>Auth::user()->balance)
                           <button  class="btn btn-primary w-100">Place a bid</button>
                            @else 
                            <button type="submit" id="bid"  class="btn btn-primary w-100">Place a bid</button>
                            @endif
                            <button type="button" class="btn btn-primary-alta mt--10" data-bs-dismiss="modal">Cancel</button>
                           @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer Area -->
     @auth
    <input id="balance" style="display: none" type="text" value="{{Auth::user()->balance}}">
    @endauth
    {{-- <input id="nftId" style="display: none" type="text" value="{{$nft->nftId}}"> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="{{asset('assets/css/toastr.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    
    <script>
         var date=document.querySelectorAll('#date');
         var date2=document.querySelectorAll('#date2');
         var switchButton=document.getElementById('switchButton');
         var buttonCheck=document.getElementById('buttonCheck');
          
       
    if(localStorage.getItem('click')==1)
    {
        for (let index = 0; index < date.length; index++) {
            
            date[index].style.display="none";
            date2[index].style.display="block";
        }
        localStorage.setItem("click",1);
        buttonCheck.checked =true;
    }
    else
    {
        for (let index = 0; index < date.length; index++) {
            
            date[index].style.display="block";
            date2[index].style.display="none";
        }
        localStorage.setItem("click",0);
        buttonCheck.checked =false;

    }

        function switchDate()
        {
    
        if(localStorage.getItem('click')==0)
        {
 
         for (let index = 0; index < date.length; index++) {
            
             date[index].style.display="none";
             date2[index].style.display="block";
         }
         localStorage.setItem("click",1);
         buttonCheck.checked =true;

        }
        else
        {

         for (let index = 0; index < date.length; index++) {
            
             date[index].style.display="block";
             date2[index].style.display="none";
         }
         localStorage.setItem("click",0);
         buttonCheck.checked =false;

        }
 
        }
     </script>

<script>
  
  $(document).ready(function() {
    var fee=document.getElementById('fee');
      var temp=fee.innerText;
      var feeIndex=temp.indexOf(' ');
      var parseFee =(temp.slice(0,feeIndex));

        $('#bidForm').submit(function()
        {

      var balance=$('#balance').val();
      var bidValue=$('#bidValue').val();
      var nftId=$('#nftId').val();

        if((parseFloat(bidValue)+parseFloat(parseFee))<parseFloat(balance))
      {
        $('body, html').animate({scrollTop:$('form').offset().top}, 'slow');
        $('#placebidModal').modal('toggle');
        //  location.reload();
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 
        $.ajax({
            type: "post",
            method: "post",
            url: '{{route('placeBid')}}',
            data: {'nftId':'{{$nft->nftId}}','bid':(parseFloat(bidValue)),'serviceFee':parseFee},
            success: function (response) {
            setTimeout(() => {
            location.reload();
                
            }, 1000);

            },
            error:function (error)
            {
                console.log(error);
                console.log(JSON.parse(error));
            }
     
        });

        toastr.success("You have bidded successfully.",'Success',({ "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
        }))

        // setTimeout(() => {
        //     location.reload();
        // }, 2300);

    }
      else
      {

        toastr.error("You don't have enough ETH.",'Error',({ "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
        }))

      }
      })
 
});

  function total()
  {
      var totalBid=document.getElementById('totalBid');
      var bidValue=document.getElementById('bidValue');
      var eth=document.getElementById('eth');
      var nftPrice=document.getElementById('nftPrice');
      var fee=document.getElementById('fee');
      var temp=fee.innerText;
      var feeIndex=temp.indexOf(' ');
      var parseFee =(temp.slice(0,feeIndex));

    //    var index=((parseFloat(parseFee)+parseFloat(bidValue.value))).toString().indexOf('.');
    //  totalBid.innerText=(((parseFloat(parseFee)+parseFloat(bidValue.value)).toString()).slice(0,index+4)) +' ETH';

     totalBid.innerText=(parseFloat(parseFee)+parseFloat(bidValue.value)) +' ETH';

  }

  $('#likeNftFormAsset').submit(function()
     {
     var heartIcon=document.getElementById('heartIcon');
     var likeButton=document.getElementById('likeButton');
     var likeCount=document.getElementById('likeCount');
     var count=parseInt(likeCount.innerText);
     var nftId=$('#likeNftAsset').val();
     console.log(nftId);
     console.log(likeButton.value);

          $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     if(likeButton.value==1)
     {
     
       likeButton.classList.remove('heartButton');
    //  likeButton.style.background="";
     heartIcon.style.color="none";
     heartIcon.style.fill="none";
     likeCount.innerText=count-1;
     likeButton.value=0;
     console.log("unlike")

     $.ajax({
            method: "post",
            type: "post",
            url: '{{route('likeNft')}}',
            data: {'nftId':nftId,'stat':0},
            success: function (response) {
                console.log(response);
                console.log("asdasd");
            },
            error:function (error)
            {
                console.log(error);
                console.log(JSON.parse(error));
            }
        });

     }
     else if(likeButton.value==0)
     {
    //  likeButton.style.background="#00a3ff";
     likeButton.classList.add('heartButton');
     heartIcon.style.color="white";
     heartIcon.style.fill="white";
     likeCount.innerText=count+1;
     likeButton.value=1;
     console.log("like");

        $.ajax({
            method: "post",
            type: "post",
            url: '{{route('likeNft')}}',
            data: {'nftId':nftId,stat:1},
            success: function (response) {
                console.log("like asdasd")
                console.log(response);
            },
            error:function (error)
            {
                console.log(error);
                console.log(JSON.parse(error));
            }
        });

     }
     else
     {
        location.href = "/login";
         console.log("login");
     }



        
    })
 
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<script>
    var playClick=0;
    function playAudioAsset()
    {
        var playButton=document.getElementById('playButton');
        if(playClick==0)
        {
            playButton.classList.add('heartButton');
            playButton.innerHTML="Pause <i class='bi bi-pause-fill'></i>";
            document.getElementById('audioPreviewModal').play();
            playClick=1;
        }
        else
        {
        
            playButton.classList.remove('heartButton');
            playButton.innerHTML="Play <i class='bi bi-play-fill'></i>";
            document.getElementById('audioPreviewModal').pause();
            playClick=0;
        }
        // =!document.getElementById('audioPreviewModal').pause();

        // document.getElementById('audioPreviewModal').muted=!document.getElementById('audioPreviewModal').muted
    }
</script>


<script>
    function copy(nftId)
    {
        // var copyText = document.getElementById(`${nftId}`);
        navigator.clipboard.writeText('{{Request::url()}}');
        toastr.info("Copy",'Copy',({ "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "500",
  "timeOut": "1500",
  "extendedTimeOut": "500",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
        }))
    }
</script>

<script>
    var playClick=0;
    var id;
    var control=0;
    function playAudio(id)
    {
        if(this.id==null)
        this.id=id;

        var playButton=document.getElementById(`playButton${id}`);
        var audioAll=document.querySelectorAll('audio');
        var clickedButton=document.getElementById(`playButton${this.id}`);

        if(this.id!=id)
        {
            this.id=id;
            this.playClick=0;
            this.control=1;
        }

        if(playClick==0)
        {
            audioAll.forEach(audio => {
                audio.pause();
            });
            if(this.control==1)
            {
                clickedButton.classList.remove('heartButton');
                clickedButton.innerHTML="Play <i class='bi bi-play-fill'></i>";
                this.control=0;
            }
            playButton.classList.add('heartButton');
            playButton.innerHTML="Pause <i class='bi bi-pause-fill'></i>";
            document.getElementById(`audioPreviewModal${id}`).play();
            playClick=1;
        
        }
        else
        {
            playButton.classList.remove('heartButton');
            playButton.innerHTML="Play <i class='bi bi-play-fill'></i>";
            document.getElementById(`audioPreviewModal${id}`).pause();
            playClick=0;

            if(this.control==1)
            {
                clickedButton.classList.add('heartButton');
                clickedButton.innerHTML="Play <i class='bi bi-pause-fill'></i>";
                this.control=0;
            }
        }
        // =!document.getElementById('audioPreviewModal').pause();
        // document.getElementById('audioPreviewModal').muted=!document.getElementById('audioPreviewModal').muted
    }
</script>

<script>
    function likeNft(nftId)
    {
  var heartIcon=document.querySelectorAll(`#heartIcon${nftId}`);
  var likeButton=document.querySelectorAll(`#likeButton${nftId}`);
  var likeArea=document.querySelectorAll(`#likeArea${nftId}`);
  var likeCount=document.querySelectorAll(`#likeCount${nftId}`);
  var count=parseInt(likeCount[0].innerText);

     $.ajaxSetup({
 headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

 if(likeButton[0].value==1)
  {
  heartIcon.forEach(heartIcon_ => {
     heartIcon_.style.color="currentColor";
     heartIcon_.style.fill="none";
 });

 likeArea.forEach(likeArea_ => {
     likeArea_.classList.remove('heartButton');
 });
 
 likeCount.forEach(likeCount_ => {
     likeCount_.style.color="";
     likeCount_.innerText=count-1;
 });

 likeButton.forEach(likeButton_ => {
     likeButton_.value=0;
 });
 
 //  console.log("unlike");

  $.ajax({
         method: "post",
         type: "post",
         url: '{{route('likeNft')}}',
         data: {'nftId':nftId,'stat':0},
         success: function (response) {
             // console.log(response);
         },
         error:function (error)
         {
             // console.log(error);
             console.log(JSON.parse(error));
         }
     });


  }
  else if(likeButton[0].value==0)
  {


 heartIcon.forEach(heartIcon_ => {
     heartIcon_.style.color="white";
     heartIcon_.style.fill="white";
 });

 likeArea.forEach(likeArea_ => {
     likeArea_.classList.add('heartButton');
 });
 
 likeCount.forEach(likeCount_ => {
     likeCount_.style.color="white";
     likeCount_.innerText=count+1;
 });

 likeButton.forEach(likeButton_ => {
     likeButton_.value=1;
 });
  
 //  console.log("like");

  $.ajax({
         method: "post",
         type: "post",
         url: '{{route('likeNft')}}',
         data: {'nftId':nftId,stat:1},
         success: function (response) {
         },
         error:function (error)
         {
         }
     });

  }
  else
  {
     location.href = "/login";
  }

    }


 </script>

@include('include/footer')
 
