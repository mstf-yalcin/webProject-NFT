<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin || Nuron - NFT Marketplace Template</title>
    @include('admin/adminHeader')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  
                <!-- End Mainmanu Nav -->
            </nav>
        </div>
    </div>
    <!-- start page title area -->
 
    <!-- end page title area -->


    <div class="rn-upcoming-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- start Table Title -->
                    <div class="table-title-area d-flex">
                        <i data-feather="user"></i>
                        <h3>Users</h3>
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
                                        <span>User</span>
                                    </th>
                                    <th>
                                        <span>User Bid</span>
                                    </th>
                                    <th>
                                        <span>Amount</span>
                                    </th>
                                    <th>
                                        <span>Size</span>
                                    </th>
                                    <th>
                                        <span>Royality</span>
                                    </th>
                                    <th>
                                        <span>NFT Status</span>
                                    </th>
                                    <th>
                                        <span>Bid Status</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="ranking">
                                @foreach ($bids as  $i=> $nft)
                                    @if($i%2==0)
                                <tr class="color-light">
                                    <td><span>{{$i+1}}</span></td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('nftDetail',$nft->nftId)}}" class="thumbnail">

                                                @if($nft->dataType=="image")
                                                <img src="{{asset($nft->data)}}" alt="{{$nft->name}}" style="width:60px;height:60px">
                                                @elseif($nft->dataType=='audio')
                                                <img src="{{asset('assets/images/icons/audio.png')}}" style="width:60px;height:60px" alt="{{$nft->name}}">
                                                @elseif($nft->dataType=="video")
                                                <img src="{{asset('assets/images/icons/video.png')}}" style="width:60px;height:60px" alt="{{$nft->name}}">
                                                @endif
                                                
                                            </a>
                                            <a href="{{route('nftDetail',$nft->nftId)}}" target="_blank" style="text-decoration: none" >{{$nft->name}}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('adminUser',$nft->userId)}}" class="thumbnail">

                                                @if($nft->pp==null && $nft->gender==1)
                                                <img src="{{asset('assets/images/icons/boy-avater.png')}}" alt="{{$nft->first_name}}" style="width:60px;height:60px" >
                                                @elseif($nft->pp==null && $nft->gender==0)
                                               <img src="{{asset('assets/images/icons/girl-avater.png')}}" alt="{{$nft->first_name}}" style="width:60px;height:60px" >
                                                @else
                                                <img src="{{asset($nft->pp)}}" alt="{{$nft->first_name}}" style="width:60px;height:60px">
                                                @endif
                                                
                                            </a>
                                            <a href="{{route('adminUser',$nft->userId)}}" target="_blank" style="text-decoration: none" >{{$nft->first_name}} {{$nft->last_name}}</a>
                                        </div>
                                    </td>
                                    <td><span class="color-green text_"  >{{$nft->bid}} ETH</span></td>
                                    <td><span class="color-green text_"  >{{$nft->amount}} ETH</span></td>
                                    <td><span class="text_"  >#{{$nft->size}}</span></td>
                                    <td><span class="text_" >{{$nft->royality}}%</span></td>
                                    <td>
                                        @if($nft->sellStatus==1)
                                        <span class="color-green text_" >
                                         On Sale
                                        </span>
                                        @elseif($nft->sellStatus==-1)
                                        <span class="color-red text_" >
                                             Deleted
                                            </span>
                                        @elseif($nft->sellStatus==0)   
                                        <span class="color-red text_" >
                                            Not For Sale
                                            </span>
                                        @endif
                                    </td>
                                    <td><span>
                                     @if($nft->status==1)
                                     <span  >
                                        Pending
                                       </span>
                                     @elseif($nft->status==2)
                                     <span class="color-green text_" >
                                          Sold
                                            </span>
                                     @elseif($nft->status==3)
                                     <span class="color-red text_" >
                                        Refused
                                         </span>
                                     @elseif($nft->status==4)
                                     @endif
                                    </span></td>
                                </tr>
                                @else
                                <tr >
                                    <td><span>{{$i+1}}</span></td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('nftDetail',$nft->nftId)}}" class="thumbnail">

                                                @if($nft->dataType=="image")
                                                <img src="{{asset($nft->data)}}" alt="{{$nft->name}}" style="width:60px;height:60px">
                                                @elseif($nft->dataType=='audio')
                                                <img src="{{asset('assets/images/icons/audio.png')}}" style="width:60px;height:60px" alt="{{$nft->name}}">
                                                @elseif($nft->dataType=="video")
                                                <img src="{{asset('assets/images/icons/video.png')}}" style="width:60px;height:60px" alt="{{$nft->name}}">
                                                @endif
                                                
                                            </a>
                                            <a href="{{route('nftDetail',$nft->nftId)}}" target="_blank" style="text-decoration: none" >{{$nft->name}}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('adminUser',$nft->userId)}}" class="thumbnail">

                                                @if($nft->pp==null && $nft->gender==1)
                                                <img src="{{asset('assets/images/icons/boy-avater.png')}}" alt="{{$nft->first_name}}" style="width:60px;height:60px" >
                                                @elseif($nft->pp==null && $nft->gender==0)
                                               <img src="{{asset('assets/images/icons/girl-avater.png')}}" alt="{{$nft->first_name}}" style="width:60px;height:60px" >
                                                @else
                                                <img src="{{asset($nft->pp)}}" alt="{{$nft->first_name}}" style="width:60px;height:60px">
                                                @endif
                                                
                                            </a>
                                            <a href="{{route('adminUser',$nft->userId)}}" target="_blank" style="text-decoration: none" >{{$nft->first_name}} {{$nft->last_name}}</a>
                                        </div>
                                    </td>
                                    <td><span class="color-green text_"  >{{$nft->bid}} ETH</span></td>
                                    <td><span class="color-green text_"  >{{$nft->amount}} ETH</span></td>
                                    <td><span class="text_"  >#{{$nft->size}}</span></td>
                                    <td><span class="text_" >{{$nft->royality}}%</span></td>
                                    <td>
                                        @if($nft->sellStatus==1)
                                        <span class="color-green text_" >
                                         On Sale
                                        </span>
                                        @elseif($nft->sellStatus==-1)
                                        <span class="color-red text_" >
                                             Deleted
                                            </span>
                                        @elseif($nft->sellStatus==0)   
                                        <span class="color-red text_" >
                                            Not For Sale
                                            </span>
                                        @endif
                                </td>
                                <td><span>
                                    @if($nft->status==1)
                                    <span >
                                       Pending
                                      </span>
                                    @elseif($nft->status==2)
                                    <span class="color-green text_" >
                                        Sold
                                           </span>
                                    @elseif($nft->status==3)
                                    <span class="color-red text_" >
                                       Refused
                                        </span>
                                    @elseif($nft->status==4)
                                    @endif
                                   </span></td>
                                </tr>
                                @endif
                                @endforeach
                                @else
                    <div class="rn-not-found-area rn-section-gapTop">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="rn-not-found-wrapper">
                                        <h3 class="title">No items to display</h3>
                                        <p>You don't have any liked NFT!</p>
                                      <a href="index.html" class="btn btn-primary btn-large">Explore NFT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- table End -->
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        function userStat(userId,i)
        {
            var stat=document.getElementById(`buttonCheck${i}`).checked;
            if(stat==true)
            stat=1;
            else
            stat=2;

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }});
          $.ajax({
            method: "post",
            type: "post",
            url: '{{route('userStatus')}}',
            data: {'userId':userId,'userStat':stat},
            success: function (response) {
            console.log(response);
            },
            error:function (error)
            {
               console.log(error);
            }
                
        });
        }
            

            
    </script>

    <!-- Start Footer Area -->
     
    <!-- End Footer Area -->
@include('include/footer')