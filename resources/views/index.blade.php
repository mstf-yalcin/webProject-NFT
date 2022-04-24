   
   <!DOCTYPE html>
   <html lang="en">
   
   <head>
       <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Home || Nuron - NFT Marketplace Template</title>
       <meta name="csrf-token" content="{{ csrf_token() }}" />
       
   @include('include/header')
    <!-- End Header Area -->

    <!-- start banner area -->
    <div class="slider-one rn-section-gapTop">
        <div class="container">
            <div class="row row-reverce-sm align-items-center">
                <div class="col-lg-5 col-md-6 col-sm-12 mt_sm--50">
                    <h2 class="title" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">Discover Digital Art, Collect and Sell Your Specific NFTs.</h2>
                    <p class="slide-disc" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">Partner with one of the world’s largest retailers to showcase your brand and
                        products.</p>
                    <div class="button-group">
                        <a class="btn btn-large btn-primary" href="{{route('createPage')}}" data-sal-delay="400" data-sal="slide-up" data-sal-duration="800">Create</a>
                        <a class="btn btn-large btn-primary-alta" href="{{route('explore')}}" data-sal-delay="500" data-sal="slide-up" data-sal-duration="800">Explore</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 offset-lg-1">
                    <div class="slider-thumbnail">
                        <img src="{{asset('assets/images/bg/slider-1.png')}}" alt="Slider Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End banner area -->

    <!-- Explore Style Carousel -->
    <div class="en-product-area one rn-section-gapTop">
        <div class="container">
            <div class="row mb--30">
                <div class="col-12">
                    <h3 class="title">Explore Carousel Both</h3>
                </div>
            </div>
            <div class="row g-5">
                    <!-- start single product -->
                        @if($index!=null)
                @foreach ($index as $i=>$nft)
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
                                <source src="{{$nft->data}}" />
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
                                @foreach($indexBid as $i=>$bid)
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
                @foreach ($indexBid as $i=>$a)
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

    <!-- New items Start -->
    <div class="rn-new-items rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Newest Items</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <form id="newestForm" class="search-form-wrapper" method="GET" action="{{route('explore','search')}}">
                        <input type="hidden" value="newest" name="search" >
                        <a class="btn-transparent" href="javascript:void()" onclick="document.getElementById('newestForm').submit();">VIEW ALL<i data-feather="arrow-right"></i></a>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <!-- start single product -->
                @if($indexOrderBy!=null)
                @foreach ($indexOrderBy as $i=>$nft)
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay with-placeBid">
                        <div class="card-thumbnail">
                            @if($nft->dataType=='image')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                            <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                            @elseif($nft->dataType=='audio')
                        <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                            <div  onclick="playAudio('Newest{{$i}}')" >
                                <div  class="input-box">
                                    <button  id="playButtonNewest{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                        Play <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                              <audio  controls="controls" id="audioPreviewModalNewest{{$i}}" controlsList="noplaybackrate nodownload preload" style="display:none;width: 100%;">
                                <source src="{{$nft->data}}" />
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
                                @foreach($indexOrderByBid as $i=>$bid)
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal3{{$nft->nftId}}">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal3{{$nft->nftId}}">
                                        Report
                                    </button>
                                    {{-- <a type="button" href="{{url('create',$nft->nftId)}}" class="btn-setting-text report-text" >
                                        Update
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <a href="{{url('nft',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                @foreach ($indexOrderByBid as $i=>$a)
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

                <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal3{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
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
                <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal3{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{url('create')}}" class="btn btn-primary btn-large">Create NFT</a>
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
    <!-- New items End -->


      <!-- Start product area -->


      <div class="rn-new-items rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Explore NFT Based Video and Audio</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <form id="mediaForm" class="search-form-wrapper" method="GET" action="{{route('explore','search')}}">
                        <input type="hidden" name="search" value="media">
                        <a class="btn-transparent"  href="javascript:void()" onclick="document.getElementById('mediaForm').submit();">VIEW ALL<i data-feather="arrow-right"></i></a>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <!-- start single product -->
                @if($nftBased!=null)
                @foreach ($nftBased as $i=>$nft)
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay with-placeBid">
                        <div class="card-thumbnail">
                            @if($nft->dataType=='image')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                            <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                            @elseif($nft->dataType=='audio')
                        <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                            <div  onclick="playAudio('NftBased{{$i}}')" >
                                <div  class="input-box">
                                    <button  id="playButtonNftBased{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                        Play <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                              <audio  controls="controls" id="audioPreviewModalNftBased{{$i}}" controlsList="noplaybackrate nodownload preload" style="display:none;width: 100%;">
                                <source src="{{$nft->data}}" />
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
                                @foreach($nftBasedBid as $i=>$bid)
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
                                    <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal4{{$nft->nftId}}">
                                        Share
                                    </button>
                                    <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal4{{$nft->nftId}}">
                                        Report
                                    </button>
                                    {{-- <a type="button" href="{{url('create',$nft->nftId)}}" class="btn-setting-text report-text" >
                                        Update
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <a href="{{url('nft',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                @foreach ($nftBasedBid as $i=>$a)
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

                <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal4{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
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
                <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal4{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{url('create')}}" class="btn btn-primary btn-large">Create NFT</a>
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
    <!-- end product area -->



      <!-- top top-seller start -->
      <div class="rn-top-top-seller-area nice-selector-transparent rn-section-gapTop">
        <div class="container">
            <div class="row  mb--30">
                <div class="col-12 justify-sm-center d-flex">
                    <h3 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Creater</h3>
                </div>
            </div>
            <div class="row justify-sm-center g-5 top-seller-list-wrapper">
                <!-- start single top-seller -->
                @if($users!=null)
                @foreach ($users as $user)
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-3 col-md-4 col-sm-6 top-seller-list">
                    <div class="top-seller-inner-one">
                        <div class="top-seller-wrapper">
                            <div class="thumbnail varified">

                                <a href="{{url($user->userId)}}" target="_blank" class="avatar">
                                    <img style="width:54px;height:54px" src="
                                    @if($user->pp==null && $user->gender==1) {{asset('assets/images/icons/boy-avater.png')}}
                                    @elseif($user->pp==null && $user->gender==0) {{asset('assets/images/icons/girl-avater.png')}}
                                    @elseif($user->pp!=null) {{asset($user->pp)}}
                                    @endif
                                    " alt="{{$user->first_name}}"></a>
                            </div>
                            <div class="top-seller-content">
                                <a href="{{url($user->userId)}}">
                                    <h6 class="name">{{$user->first_name}} {{$user->last_name}} </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                <!-- End single top-seller -->
            </div>
        </div>
    </div>
    <!-- top top-seller end -->


    
    <!-- start service area -->
    <div class="rn-service-area rn-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-12 mb--50">
                    <h3 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Create and sell your NFTs</h3>
                </div>
            </div>
            <div class="row g-5">
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="rn-service-one color-shape-7">
                        <div class="inner">
                            <div class="icon">
                                <img src="assets/images/icons/shape-7.png" alt="Shape">
                            </div>
                            <div class="subtitle">Step-01</div>
                            <div class="content">
                                <h4 class="title"><a href="{{route('my')}}">Set up your wallet</a></h4>
                                <p class="description">Powerful features and inclusions, which makes Nuron standout,
                                    easily customizable and scalable.</p>
                                <a class="read-more-button" href="{{route('my')}}"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="{{route('my')}}"></a>
                    </div>
                </div>
                <!-- End single service -->
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="200" data-sal-duration="800" class="rn-service-one color-shape-1">
                        <div class="inner">
                            <div class="icon">
                                <img src="assets/images/icons/shape-1.png" alt="Shape">
                            </div>
                            <div class="subtitle">Step-02</div>
                            <div class="content">
                                <h4 class="title"><a href="{{route('explore')}}">Create your collection</a></h4>
                                <p class="description">A great collection of beautiful website templates for your need.
                                    Choose the best suitable template.</p>
                                <a class="read-more-button" href="{{route('explore')}}"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="{{route('explore')}}"></a>
                    </div>
                </div>
                <!-- End single service -->
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="250" data-sal-duration="800" class="rn-service-one color-shape-5">
                        <div class="inner">
                            <div class="icon">
                                <img src="assets/images/icons/shape-5.png" alt="Shape">
                            </div>
                            <div class="subtitle">Step-03</div>
                            <div class="content">
                                <h4 class="title"><a href="{{route('createPage')}}">Add your NFT's</a></h4>
                                <p class="description">We've made the template fully responsive, so it looks great on
                                    all devices: desktop, tablets and.</p>
                                <a class="read-more-button" href="{{route('createPage')}}"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="{{route('createPage')}}"></a>
                    </div>
                </div>
                <!-- End single service -->
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="300" data-sal-duration="800" class="rn-service-one color-shape-6">
                        <div class="inner">
                            <div class="icon">
                                <img src="assets/images/icons/shape-6.png" alt="Shape">
                            </div>
                            <div class="subtitle">Step-04</div>
                            <div class="content">
                                <h4 class="title"><a href="{{route('createPage')}}">Sell Your NFT's</a></h4>
                                <p class="description">I throw myself down among the tall grass by the stream as I
                                    lie close to the earth NFT's.</p>
                                <a class="read-more-button" href="{{route('createPage')}}"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="{{route('createPage')}}"></a>
                    </div>
                </div>
                <!-- End single service -->
            </div>
        </div>
    </div>
    <!-- End service area -->
 

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



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="{{asset('assets/css/toastr.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>


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

    <script>
        function copy(nftId)
        {
            var copyText = document.getElementById(`${nftId}`);
            navigator.clipboard.writeText(copyText.href);
            toastr.info("Copy",'Copy',({ "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "150",
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
        function copyUser(userId)
    {
        navigator.clipboard.writeText('http://localhost:8000/'+userId);
        toastr.info("",'Link copied!',({ "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "150",
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


   @include('include/footer')


 