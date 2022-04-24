<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bids NFT || Nuron - NFT Marketplace Template</title>
    @include('include/header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

                <!-- End Mainmanu Nav -->
            </nav>
        </div>
    </div>
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start"></h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{route('index')}}">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Bids</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->


    <div class="rn-upcoming-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- start Table Title -->
                    <div class="table-title-area d-flex">
                        <i data-feather="briefcase"></i>
                        <h3>The top Bids on your NFTs</h3>
                    </div>
                    <!-- End Table Title -->

                    <!-- table area Start -->
                    @if($bids!=null)
                    <div class="box-table table-responsive">
                        <table class="table upcoming-projects">
                            <thead>
                                <tr>
                                    <th>
                                        <span>SL</span>
                                    </th>
                                    <th>
                                        <span>Items</span>
                                    </th>
                                    <th>
                                        <span>Bidder</span>
                                    </th>
                                    <th>
                                        <span>Bid</span>
                                    </th>
                                    <th>
                                        <span>Date</span>
                                    </th>
                                    <th style="text-align: center">
                                        <span style="text-align: center"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="ranking">
                                @foreach ($bids as $i=>$bid)
                                    @if($i%2==0)
                                   <tr id="{{$bid->nftId}}" class="color-light">
                                    <td><span>{{$i+1}}.</span></td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('nftDetail',$bid->nftId)}}" target="_blank" class="thumbnail">
                                                @if($bid->dataType=="image")
                                                <img src="{{$bid->data}}" alt="{{$bid->name}}" style="width:60px;height:60px">
                                                @elseif($bid->dataType=='audio')
                                                <img src="{{asset('assets/images/icons/audio.png')}}" style="width:60px;height:60px" alt="{{$bid->name}}">
                                                @elseif($bid->dataType=="video")
                                                <img src="{{asset('assets/images/icons/video.png')}}" style="width:60px;height:60px" alt="{{$bid->name}}">
                                                @endif
                                            </a>
                                            <a href="{{route('nftDetail',$bid->nftId)}}" target="_blank" style="text-decoration: none" >{{$bid->name}}</a>
                                        </div>
                                    </td>
                                    <td>     
                                        <div class="product-wrapper d-flex align-items-center">
                                            @if($bid->pp==null && $bid->gender==1)
                                            <a href="{{route('userProfile',$bid->userId)}}" target="_blank" class="thumbnail"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:60px;height:60px" alt="{{$bid->first_name}}"></a>
                                            @elseif($bid->pp==null && $bid->gender==0)
                                            <a href="{{route('userProfile',$bid->userId)}}" target="_blank" class="thumbnail"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:60px;height:60px" alt="{{$bid->first_name}}"></a>
                                            @else
                                            <a href="{{route('userProfile',$bid->userId)}}" target="_blank" class="thumbnail"><img src="{{asset($bid->pp)}}"  style="width:60px;height:60px" alt="Images"></a>
                                            @endif
                                        </a>
                                        <div class="top-seller-content">
                                        <a href="{{route('userProfile',$bid->userId)}}" target="_blank" style="text-decoration: none" >{{$bid->first_name}} {{$bid->last_name}}</a>
                                        </div>
                                      </div>
                                    </td>
                                    <td><span class="color-green" >{{$bid->bid}} ETH</span></td>
                                    <td><span class="color-danger">
                                        @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($bid->created_at))->diffForHumans() @endphp
                                       </span></td>
                                    <td> 
                                        <div style="display: flex;justify-content:space-evenly;align-items:center">
                                            <button onclick="accept('{{$bid->nftId}}','{{$bid->name}}','{{$bid->userId}}','{{$bid->first_name}} {{$bid->last_name}}','{{$bid->bid}}','{{$bid->balance}}',1)" style="width:45%"  type="button" class="btn btn-success" >Accept</button>
                                            <button onclick="accept('{{$bid->nftId}}','{{$bid->name}}','{{$bid->userId}}','{{$bid->first_name}} {{$bid->last_name}}','{{$bid->bid}}','{{$bid->balance}}',0)" style="width:45%"   type="button" class="btn btn-danger">Refuse</button>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                <tr id="{{$bid->nftId}}">
                                    <td><span>{{$i+1}}.</span></td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('nftDetail',$bid->nftId)}}" target="_blank" class="thumbnail">
                                                @if($bid->dataType=="image")
                                                <img src="{{$bid->data}}" alt="{{$bid->name}}" style="width:60px;height:60px">
                                                @elseif($bid->dataType=='audio')
                                                <img src="{{asset('assets/images/icons/audio.png')}}" style="width:60px;height:60px" alt="{{$bid->name}}">
                                                @elseif($bid->dataType=="video")
                                                <img src="{{asset('assets/images/icons/video.png')}}" style="width:60px;height:60px" alt="{{$bid->name}}">
                                                @endif
                                            </a>
                                            <a href="{{route('nftDetail',$bid->nftId)}}" target="_blank" style="text-decoration: none" >{{$bid->name}}</a>
                                        </div>
                                    </td>
                                    <td>     
                                        <div class="product-wrapper d-flex align-items-center">
                                            @if($bid->pp==null && $bid->gender==1)
                                            <a href="{{route('userProfile',$bid->userId)}}" target="_blank" class="thumbnail"><img src="{{asset('assets/images/icons/boy-avater.png')}}" style="width:60px;height:60px" alt="{{$bid->first_name}}"></a>
                                            @elseif($bid->pp==null && $bid->gender==0)
                                            <a href="{{route('userProfile',$bid->userId)}}" target="_blank" class="thumbnail"><img src="{{asset('assets/images/icons/girl-avater.png')}}" style="width:60px;height:60px" alt="{{$bid->first_name}}"></a>
                                            @else
                                            <a href="{{route('userProfile',$bid->userId)}}" target="_blank" class="thumbnail"><img src="{{asset($bid->pp)}}"  style="width:60px;height:60px" alt="Images"></a>
                                            @endif
                                        </a>
                                        <div class="top-seller-content">
                                        <a href="{{route('userProfile',$bid->userId)}}" target="_blank" style="text-decoration: none" >{{$bid->first_name}} {{$bid->last_name}}</a>
                                        </div>
                                      </div>
                                    </td>
                                    <td><span class="color-green" >{{$bid->bid}} ETH</span></td>
                                    <td><span class="color-danger">
                                        @php echo \Carbon\Carbon::createFromTimeStamp(strtotime($bid->created_at))->diffForHumans() @endphp
                                       </span></td>
                                    <td> 
                                        <div style="display: flex;justify-content:space-evenly;align-items:center">
                                            <button onclick="accept('{{$bid->nftId}}','{{$bid->name}}','{{$bid->userId}}','{{$bid->first_name}} {{$bid->last_name}}','{{$bid->bid}}','{{$bid->balance}}',1)" style="width:45%"  type="button" class="btn btn-success" >Accept</button>
                                            <button onclick="accept('{{$bid->nftId}}','{{$bid->name}}','{{$bid->userId}}','{{$bid->first_name}} {{$bid->last_name}}','{{$bid->bid}}','{{$bid->balance}}',0)" style="width:45%"   type="button" class="btn btn-danger">Refuse</button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- table End -->
                    <div class="row">
                        <div class="col-lg-12" data-sal="slide-up" data-sal-delay="550" data-sal-duration="800">
                            <nav class="pagination-wrapper" aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="rn-not-found-area rn-section-gapTop" >
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="rn-not-found-wrapper" style="max-width:800px !important">
                        <h3 class="title">No bids to display</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css"> --}}
<link rel="stylesheet" href="{{asset('assets/css/sweetAlertCss.css')}}">
<script src="{{asset('assets/js/sweetAlert.js')}}"></script>

    <script>
        function accept(nftId,name,userId,userName,bid,balance,stat)
        {
        if(stat==0)
        {
            Swal.fire({
         title: `<p style="color:red">${name}</p> refused for ${bid} ETH`,
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#28a745',
         cancelButtonColor: '#dc3545',
         confirmButtonText: 'Accept',
         cancelButtonText: 'Cancel',
         
         reverseButtons: true

        }).then((result) => {
            if (result.isConfirmed) {

                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }});

              
                         $.ajax({
            method: "post",
            type: "post",
            url: '{{route('accept')}}',
            data: {'nftId':nftId,'userId':userId,'stat':stat},
            success: function (response) {
               
                if(response.stat=='true')
                {
                    Swal.fire(
                     'Refused!',
                     `<p style="color:red">${name}</p> for ${bid} ETH`,
                     'success'
                 ).then(function() {
                    // location.href = "/";
                    location.reload();
                });
                }
                else if(response.stat=='false')
                {
                    Swal.fire(
                     'Error!',
                     `Want to sell <p style="color:red">${name}</p> for ${bid} ETH`,
                     'error'
                 ).then(function() {
                    // location.href = "/";
                    location.reload();
                });
                }
           


              
            },
            error:function (error)
            {
                Swal.fire(
                     'Error!',
                    'Error.',
                    'error'
                 ).then(function() {
                    location.reload();
                });
            }
                });

             }})
        }
        else if(stat==1)
        {
            Swal.fire({
         title: `Want to sell <p style="color:red">${name}</p> for ${bid} ETH`,
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#28a745',
         cancelButtonColor: '#dc3545',
         confirmButtonText: 'Accept',
         cancelButtonText: 'Cancel',
         
         reverseButtons: true

        }).then((result) => {
            if (result.isConfirmed) {

                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }});
              
                         $.ajax({
            method: "post",
            type: "post",
            url: '{{route('accept')}}',
            data: {'nftId':nftId,'userId':userId,'stat':stat,'bid':bid},
            success: function (response) {
               
                if(response.stat=='true')
                {
                    Swal.fire(
                     'Accepted!',
                     `<p style="color:red">${name}</p> for ${bid} ETH`,
                     'success'
                 ).then(function() {
                    // location.href = "/";
                    location.reload();
                });
                }
                else if(response.stat=='false')
                {
                    Swal.fire(
                     'Error!',
                     `Want to sell <p style="color:red">${name}</p> for ${bid} ETH`,
                     'error'
                 ).then(function() {
                    // location.href = "/";
                    location.reload();
                });
                }
                else if(response.stat=='insufficient fund')
                {
                    Swal.fire(
                     'Error!',
                     ` <p style="color:red">${name}</p> '${userName}' Insufficient balance!`,
                     'error'
                 ).then(function() {
                    // location.href = "/";
                   var th=document.getElementById(`${nftId}`);
                   th.style.display="none";
                   th.innertHTML="";
                    // location.reload();
                });
                }
            },
            error:function (error)
            {
                Swal.fire(
                     'Error!',
                    'Error.',
                    'error'
                 ).then(function() {
                    location.reload();
                });
            }
                });

             }})
        }
            
        }
    </script>

    <!-- Start Footer Area -->
    @include('include/footer')