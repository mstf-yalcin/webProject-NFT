<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$user->userId}} -Profile || Nuron - NFT Marketplace Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- End Header Area -->

 @include('include/header')

 <style>.toast {
    top: 10px;
}
 
/* #F64E60; */
/* #48d0c9 */
</style>

   
  {{-- cover --}}
  @if($user->cover==null)
  <div class="rn-author-bg-area bg_image--9 bg_image ptb--150">
  @else
  <div  class="rn-author-bg-area bg_image--9 bg_image ptb--150"  style='background-image: url({{asset($user->cover)}}'>
  @endif

        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>

    <div class="rn-author-area mb--30 mt_dec--120">
        <div class="container">
            <div class="row padding-tb-50 align-items-center d-flex">
                <div class="col-lg-12">
                    <div class="author-wrapper">
                        <div class="author-inner">
                            <div class="user-thumbnail">
                                {{-- 140x140 --}}
                                @if($user->pp==null && $user->gender==1)
                                <a href="javascript:void()"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:140px;height:140px" alt="Images"></a>
                                @elseif($user->pp==null && $user->gender==0)
                                <a href="javascript:void()"><img src="{{asset('assets/images/icons/girl-avater.png')}}"style="width:140px;height:140px" alt="Images"></a>
                                @else
                                <a href="javascript:void()"><img src="{{asset($user->pp)}}" style="width:140px;height:140px"   alt="Images"></a>
                                @endif
                            </div>
                            <div class="rn-author-info-content">
                                <h4 class="title">{{$user->first_name}} {{$user->last_name}}</h4>
                               <span> {{$user->bio}} </span>
                                <div class="follow-area">
                                    <div class="follow followers">
                                        <span>186k <a href="#" class="color-body">followers</a></span>
                                    </div>
                                    <div class="follow following">
                                        <span>156 <a href="#" class="color-body">following</a></span>
                                    </div>
                                </div>
                                <div class="author-button-area">
                                    <span class="btn at-follw follow-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> Follow</span>
                                    <span class="btn at-follw share-button" data-bs-toggle="modal" data-bs-target="#shareModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg></span>
                                    <div class="count at-follw">
                                        <div class="share-btn share-btn-activation dropdown">
                                            <button class="icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                                </svg>
                                            </button>

                                            <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                                <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                    Report
                                                </button>
                                                <button type="button" class="btn-setting-text report-text">
                                                    Claim Owenership
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rn-authore-profile-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-wrapper-one">
                        <nav class="tab-button-one">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">On Sale</button>
                                <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Owned</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Created</button>
                                <button class="nav-link" id="nav-liked-tab" data-bs-toggle="tab" data-bs-target="#nav-liked" type="button" role="tab" aria-controls="nav-liked" aria-selected="false">Liked</button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
           {{-- On Sale --}}
            <div class="tab-content rn-bid-content" id="nav-tabContent">
                <div class="tab-pane row g-5 d-flex fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!-- start single product -->
                    @if($onSaleNft!=null)
                    @foreach ($onSaleNft as $i=>$nft)
                    <div  data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay with-placeBid">
                            <div class="card-thumbnail">
                                @if($nft->dataType=='image')
                                <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                                <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                                @elseif($nft->dataType=='audio')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                                <div  onclick="playAudio('OnSale{{$i}}')" >
                                    <div  class="input-box">
                                        <button  id="playButtonOnSale{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                            Play <i class="bi bi-play-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                  <audio   controls="controls" id="audioPreviewModalOnSale{{$i}}" controlsList="noplaybackrate nodownload preload " style="display:none;width: 100%;">
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
                                    @foreach($ownerNftBid as $i=>$bid)
                                @if($bid->nftId==$nft->nftId)
                                     @php  $bidCounter++; @endphp
                                   @if($counter<=3)
                                      @php $counter++; @endphp
                                    <a href="{{url($bid->userId)}}" target="_blank" class="avatar"  data-tooltip="{{$bid->first_name}} {{$bid->last_name}}">
                                        <img style="width:30px;height:30px" src="
                                        @if($bid->pp==null && $bid->gender==1) {{asset('assets/images/icons/boy-avater.png')}}
                                        @elseif($bid->pp==null && $bid->gender==0) {{asset('assets/images/icons/girl-avater.png')}}
                                        @elseif($bid->pp!=null) {{asset($bid->pp)}}
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
                                        <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal1{{$nft->nftId}}">
                                            Share
                                        </button>
                                        <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal1{{$nft->nftId}}">
                                            Report
                                        </button>
                                        {{-- <a type="button" href="{{url('create',$nft->nftId)}}" class="btn-setting-text report-text" >
                                            Update
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                           <a href="{{url('nft',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                    @foreach ($ownerNftBid as $i=>$a)
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

                    <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal1{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
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
                    <div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal1{{$nft->nftId}}" tabindex="-1" aria-hidden="true">
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
                                        <p>{{$user->first_name}} {{$user->last_name}} has not any NFT for sale!</p>
                                        {{-- <a href="{{url('create')}}" class="btn btn-primary btn-large">Explore NFT</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end single product -->
                </div>
                 {{-- On Sale end--}}

                 {{-- owned --}}
                <div class="tab-pane row g-5 d-flex fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!-- start single product -->
                    @if($ownerNft!=null)
                    @foreach ($ownerNft as $i=>$nft)
                    <div  data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay with-placeBid">
                            <div class="card-thumbnail">
                                @if($nft->dataType=='image')
                                <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                                <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                                @elseif($nft->dataType=='audio')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                                <div  onclick="playAudio('Owned{{$i}}')" >
                                    <div  class="input-box">
                                        <button  id="playButtonOwned{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                            Play <i class="bi bi-play-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                  <audio  controls="controls" id="audioPreviewModalOwned{{$i}}" controlsList="noplaybackrate nodownload preload" style="display:none;width: 100%;">
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
                                    @foreach($ownerNftBid as $i=>$bid)
                                @if($bid->nftId==$nft->nftId)
                                     @php  $bidCounter++; @endphp
                                   @if($counter<=3)
                                      @php $counter++; @endphp
                                    <a href="{{url($bid->userId)}}" class="avatar" target="_blank"  data-tooltip="{{$bid->first_name}} {{$bid->last_name}}">
                                        <img style="width:30px;height:30px" src="
                                        @if($bid->pp==null && $bid->gender==1) {{asset('assets/images/icons/boy-avater.png')}}
                                        @elseif($bid->pp==null && $bid->gender==0) {{asset('assets/images/icons/girl-avater.png')}}
                                        @elseif($bid->pp!=null){{asset($bid->pp)}}
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
                    @foreach ($ownerNftBid as $i=>$a)
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
                                        <p>{{$user->first_name}} {{$user->last_name}} has not any NFT!</p>
                                        {{-- <a href="{{url('create')}}" class="btn btn-primary btn-large">Explore NFT</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end single product -->
                </div>
                  {{-- edn owned --}}

                  {{-- Created --}}
                <div class="tab-pane row g-5 d-flex fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- start single product -->
                    @if($createNft!=null)
                    @foreach ($createNft as $i=>$nft)
                    <div  data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay with-placeBid">
                            <div class="card-thumbnail">
                                @if($nft->dataType=='image')
                                <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                                <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                                @elseif($nft->dataType=='audio')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                                <div  onclick="playAudio('Created{{$i}}')" >
                                    <div  class="input-box">
                                        <button  id="playButtonCreated{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                            Play <i class="bi bi-play-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                  <audio controls="controls" id="audioPreviewModalCreated{{$i}}" controlsList="noplaybackrate nodownload preload" style="display:none;width: 100%;">
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
                                    @foreach($createNftBid as $i=>$bid)
                                @if($bid->nftId==$nft->nftId)
                                     @php  $bidCounter++; @endphp
                                   @if($counter<=3)
                                      @php $counter++; @endphp
                                    <a href="{{url($bid->userId)}}" class="avatar" target="_blank" data-tooltip="{{$bid->first_name}} {{$bid->last_name}}">
                                        <img style="width:30px;height:30px" src="
                                        @if($bid->pp==null && $bid->gender==1) {{asset('assets/images/icons/boy-avater.png')}}
                                        @elseif($bid->pp==null && $bid->gender==0) {{asset('assets/images/icons/girl-avater.png')}}
                                        @elseif($bid->pp!=null) {{asset($bid->pp)}}
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
                                    </div>
                                </div>
                            </div>
                           <a href="{{url('nft',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                    @foreach ($ownerNftBid as $i=>$a)
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
                                        <p>{{$user->first_name}} {{$user->last_name}} has not any created NFT!</p>
                                      {{-- <a href="{{url('create')}}" class="btn btn-primary btn-large">Create NFT</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end single product -->
                </div>
                  {{-- end Created --}}

                  {{-- liked --}}
                <div class="tab-pane row g-5 d-flex fade" id="nav-liked" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- start single product -->
                    @if($likesNft!=null)
                    @foreach ($likesNft as $i=>$nft)
                    <div  data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay with-placeBid">
                            <div class="card-thumbnail">
                                @if($nft->dataType=='image')
                                <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset($nft->data)}}" alt="NFT_portfolio"></a>
                                <a href="{{url('nft',$nft->nftId)}}" class="btn btn-primary">Place Bid</a>
                                @elseif($nft->dataType=='audio')
                            <a id="{{$nft->nftId}}" href="{{url('nft',$nft->nftId)}}"><img class="nftImage" src="{{asset('assets/images/icons/audio.png')}}" alt="{{$nft->name}}"></a>
                                <div  onclick="playAudio('Liked{{$i}}')" >
                                    <div  class="input-box">
                                        <button  id="playButtonLiked{{$i}}"  type="button" style="width: 100%;position: absolute;bottom:0%" class="btn btn-primary-alta" >
                                            Play <i class="bi bi-play-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                  <audio   controls="controls" id="audioPreviewModalLiked{{$i}}" controlsList="noplaybackrate nodownload preload" style="display:none;width: 100%;">
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
                                    @foreach($likesNftBid as $i=>$bid)
                                @if($bid->nftId==$nft->nftId)
                                     @php  $bidCounter++; @endphp
                                   @if($counter<=3)
                                      @php $counter++; @endphp
                                    <a href="{{url($bid->userId)}}" class="avatar" target="_blank" data-tooltip="{{$bid->first_name}} {{$bid->last_name}}">
                                        <img style="width:30px;height:30px" src="
                                        @if($bid->pp==null && $bid->gender==1) {{asset('assets/images/icons/boy-avater.png')}}
                                        @elseif($bid->pp==null && $bid->gender==0) {{asset('assets/images/icons/girl-avater.png')}}
                                        @elseif($bid->pp!=null){{asset($bid->pp)}}
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
                                    </div>
                                </div>
                            </div>
                           <a href="{{url('nft',$nft->nftId)}}"><span class="product-name">{{$nft->name}}</span></a>
                    @foreach ($likesNftBid as $i=>$a)
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
                                        <p>{{$user->first_name}} {{$user->last_name}} has not any liked NFT!</p>
                                      {{-- <a href="{{url('create')}}" class="btn btn-primary btn-large">Explore NFT</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end single product -->
                </div>
                {{-- end created --}}
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


    <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content share-wrapper">
                <div class="modal-header share-area">
                    <h5 class="modal-title">Share this User</h5>
                </div>
                <div class="modal-body">
                    <ul class="social-share-default">
                        <li><a href="http://github.com/mstf-ylcn" target="_blank"><span class="icon"><i data-feather="github"></i></span><span class="text">github</span></a></li>
                                        <li><a href="javascript:void(0)"><span class="icon"><i data-feather="twitter"></i></span><span class="text">twitter</span></a></li>
                                        <li><a href="https://www.linkedin.com/in/mstf-ylcn/" target="_blank"><span class="icon"><i data-feather="linkedin"></i></span><span class="text">linkedin</span></a></li>
                                        <li><a href="https://www.instagram.com/mustafayalcin.jpg" target="_blank"><span class="icon"><i data-feather="instagram"></i></span><span class="text">instagram</span></a></li>
                                        <li><a href="javascript:void(0)" onclick="copyUser('{{$user->userId}}')"><span class="icon"><i data-feather="copy"></i></span><span class="text">Copy</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Start Footer Area -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="{{asset('assets/css/toastr.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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
            },
            error:function (error)
            {
       
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
         console.log("login");
     }

       }
  
  
    </script>
 
<script>
    function copy(nftId)
    {
        var copyText = document.getElementById(`${nftId}`);
        navigator.clipboard.writeText(copyText.href);
        toastr.info("Link copied!",'Link copied!',({ "closeButton": false,
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
    
    function copyUser(userId)
    {
        navigator.clipboard.writeText('{{Request::url()}}');
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






{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<link href="{{asset('assets/css/toastr.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

<script>
   function likeNft(nftId)
   {
 var heartIcon=document.getElementById(`heartIcon${nftId}`);
 var likeButton=document.getElementById(`likeButton${nftId}`);
 var likeArea=document.getElementById(`likeArea${nftId}`);
 var likeCount=document.getElementById(`likeCount${nftId}`);
 var count=parseInt(likeCount.innerText);

    $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 
if(likeButton.value==1)
 {
 likeArea.classList.remove('heartButton');
 heartIcon.style.color="currentColor";
 heartIcon.style.fill="none";
 likeCount.style.color="";
 likeCount.innerText=count-1;
 likeButton.value=0;
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
 else if(likeButton.value==0)
 {

 likeArea.classList.add('heartButton');
 heartIcon.style.color="white";
 heartIcon.style.fill="white";
 likeCount.style.color="white";
 likeCount.innerText=count+1;
 likeButton.value=1;
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
      location.href = "/login";
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
</script> --}}
    @include('include/footer')
