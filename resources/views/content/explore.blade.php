<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Explore || Nuron - NFT Marketplace Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('include/header')
 
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Explore Items</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{route('index')}}">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Explore Items</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->
    <!-- Start product area -->
    <div class="rn-product-area rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Explore Items</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                     @if(isset($button) && $button==1)
                     <button class="discover-filter-button discover-filter-activation btn btn-primary open">Filter<i class="feather-filter"></i></button>
                     @else
                     <button class="discover-filter-button discover-filter-activation btn btn-primary">Filter<i class="feather-filter"></i></button>
                     @endif
                    </div>
                </div>
            </div>
         <form id="filterForm" action="{{route('exploreFilter')}}" method="POST">
            @csrf
            @if(isset($button) && $button==1)
            <div class="default-exp-wrapper default-exp-expand" style="display:block">
            @else
            <div class="default-exp-wrapper default-exp-expand" >
            @endif
                <div class="inner">
                    <div class="filter-select-option">
                        <label class="filter-leble">LIKES</label>
                        <select  value="" name="like">
                            <option  value="">Likes</option>
                            @if(isset($oldRequest) && $oldRequest['like']=='desc')
                            <option selected value="desc">Most liked</option>
                            <option  value="asc">Least liked</option>
                            @elseif(isset($oldRequest) && $oldRequest['like']=='asc')
                            <option  value="desc">Most liked</option>
                            <option selected value="asc">Least liked</option>
                            @else
                            <option  value="desc">Most liked</option>
                            <option  value="asc">Least liked</option>
                            @endif
                        </select>
                    </div>

                    <div class="filter-select-option">
                        <label class="filter-leble">Category</label>
                        <select  name="category">
                            <option value="" data-display="Category">Category</option>
                            @if(isset($oldRequest) && $oldRequest['category']=='Art')
                            <option selected value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Music')
                            <option value="Art">Art</option>
                            <option selected value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Metaverses')
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option selected value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Sports')
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option selected value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Collectibles')
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option selected value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Photograph')
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option selected value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Trading Card')
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option selected value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @elseif(isset($oldRequest) && $oldRequest['category']=='Virtual Worlds')
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option selected value="Virtual Worlds">Virtual Worlds</option>
                            @else
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Metaverses">Metaverses</option>
                            <option value="Sports">Sports</option>
                            <option value="Collectibles">Collectibles</option>
                            <option value="Photograph">Photograph</option>
                            <option value="Trading Card">Trading Card</option>
                            <option value="Virtual Worlds">Virtual Worlds</option>
                            @endif

                        </select>
                    </div>

                    <div class="filter-select-option">
                        <label class="filter-leble">Type</label>
                        <select  name="dataType">
                            <option value="">Type</option>
                            @if(isset($oldRequest) &&  $oldRequest['dataType']=='image')
                            <option selected value="image">Image</option>
                            <option value="audio">Audio</option>
                            <option value="video">Video</option>
                            @elseif(isset($oldRequest) && $oldRequest['dataType']=='audio')
                            <option value="image">Image</option>
                            <option selected value="audio">Audio</option>
                            <option value="video">Video</option>
                            @elseif(isset($oldRequest) && $oldRequest['dataType']=='video')
                            <option value="image">Image</option>
                            <option value="audio">Audio</option>
                            <option selected value="video">Video</option>
                            @else
                            <option value="image">Image</option>
                            <option value="audio">Audio</option>
                            <option value="video">Video</option>
                            @endif
                        </select>
                    </div>

                    <div class="filter-select-option">
                        <label class="filter-leble">Sale type</label>
                        <select  name="saleType">
                            <option value=""  data-display="Sale type">Sale type</option>
                            @if(isset($oldRequest) && $oldRequest['saleType']=='1')
                            <option selected value="1">Open for offers</option>
                            <option value="2">Instant sale</option>
                            <option value="3">Not for sale</option>
                            @elseif(isset($oldRequest) && $oldRequest['saleType']=='2')
                            <option value="1">Open for offers</option>
                            <option selected value="2">Instant sale</option>
                            <option value="3">Not for sale</option>
                            @elseif(isset($oldRequest) && $oldRequest['saleType']=='3')
                            <option value="1">Open for offers</option>
                            <option value="2">Instant sale</option>
                            <option selected value="3">Not for sale</option>
                            @else
                            <option value="1">Open for offers</option>
                            <option value="2">Instant sale</option>
                            <option value="3">Not for sale</option>
                            @endif
                        </select>
                    </div>

                    <div class="filter-select-option">
                        <label class="filter-leble">Price Range</label>
                        <div class="price_filter s-filter clear">
                            <form action="#" method="GET">
                                <div id="slider-range"></div>
                                <div class="slider__range--output">
                                    <div class="price__output--wrap">
                                        <div class="price--output">
                                            <span name="saleType">Price :</span><input name="value"
                                            @if(isset($oldRequestData[0]))
                                            value="ETH {{$oldRequestData[0]}} - ETH {{$oldRequestData[1]}}"
                                            @else
                                            value="ETH 5 - ETH 100"
                                            @endif
                                            type="text" id="amount" readonly>
                                            
                                            <input 
                                            @if(isset($oldRequestData[0]))
                                            value="{{$oldRequestData[0]}}"
                                            @else
                                            value="0"
                                            @endif
                                            type="hidden" name="min"  id="minValue">
                                           
                                            <input 
                                            @if(isset($oldRequestData[1]))
                                            value="{{$oldRequestData[1]}}"
                                            @else
                                            value="100"
                                            @endif
                                            type="hidden" name="max"  id="maxValue">
                                    
                                        </div>
                                        <div class="price--filter">
                                            <a class="btn btn-primary btn-small" onclick="filterFormClick()" href="javascript:void()">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <div class="row g-5">
                @if($explore!=null)
                @foreach ($explore as $i=>$nft)
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay with-placeBid">
                        <div class="card-thumbnail">
                            @if($nft->dataType=='image')
                            <a id="{{$nft->nftId}}" href="{{route('nftDetail',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                            <a href="{{route('nftDetail',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                            @elseif($nft->dataType=='audio')
                        <a id="{{$nft->nftId}}" href="{{route('nftDetail',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
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
                            <a href="{{route('nftDetail',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                            @elseif($nft->dataType=='video')
                            {{-- <a id="{{$nft->nftId}}" href="{{route('nftDetail',$nft->nftId)}}"><img style="" class="nftImage" src="{{asset('assets/images/icons/video.png')}}" alt="NFT_portfolio"></a> --}}
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
                                @foreach($exploreBid as $i=>$bid)
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
                                <a  class="more-author-text" href="{{route('nftDetail',$nft->nftId)}}">N/A Bids.</a>
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
                        <a href="{{route('nftDetail',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                @foreach ($exploreBid as $i=>$a)
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
                                    <a href="{{url('create')}}" class="btn btn-primary btn-large">Create NFT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end single product -->
 
                <!-- end single product -->
            </div>
        </div>
    </div>
    <!-- end product area -->
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

    <div style="display: none" id="loading-wrapper">
        <div id="loading-text">LOADING</div>
        <div id="loading-content"></div>
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
     console.log(heartIcon);
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
    
     console.log("unlike");

     $.ajax({
            method: "post",
            type: "post",
            url: '{{route('likeNft')}}',
            data: {'nftId':nftId,'stat':0},
            success: function (response) {
                console.log(response);
            },
            error:function (error)
            {
                console.log(error);
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
     
     console.log("like");

     $.ajax({
            method: "post",
            type: "post",
            url: '{{route('likeNft')}}',
            data: {'nftId':nftId,stat:1},
            success: function (response) {
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
        //   location.href = "/login";
         console.log("login");
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
            console.log(id);
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
       function filterFormClick()
        {
            var load=document.getElementById('loading-wrapper');
              load.style.display="block";
            document.getElementById('filterForm').submit()
        }
    </script>

@include('include/footer')