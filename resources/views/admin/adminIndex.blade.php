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
                    <div class="box-table table-responsive">
                        <table class="table upcoming-projects">
                            <thead>
                                <tr>
                                    <th>
                                        <span>SL</span>
                                    </th>
                                    <th>
                                        <span>User</span>
                                    </th>
                                    <th>
                                        <span>Bio</span>
                                    </th>
                                    <th>
                                        <span>Mail</span>
                                    </th>
                                    <th>
                                        <span>Gender</span>
                                    </th>
                                    <th>
                                        <span>Balance</span>
                                    </th>
                                    <th>
                                        <span>Account Status</span>
                                    </th>
                                    <th>
                                        <span>Update User</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="ranking">
                                @foreach ($users as  $i=> $user)
                                    @if($i%2==0)
                                <tr class="color-light">
                                    <td><span>{{$i+1}}</span></td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('adminUserNft',$user->userId)}}" class="thumbnail">

                                                @if($user->pp==null && $user->gender==1)
                                                <img src="{{asset('assets/images/icons/boy-avater.png')}}" alt="{{$user->first_name}}" style="width:60px;height:60px" >
                                                @elseif($user->pp==null && $user->gender==0)
                                               <img src="{{asset('assets/images/icons/girl-avater.png')}}" alt="{{$user->first_name}}" style="width:60px;height:60px" >
                                                @else
                                                <img src="{{asset($user->pp)}}" alt="{{$user->first_name}}" style="width:60px;height:60px">
                                                @endif
                                                
                                            </a>
                                            <a href="{{route('adminUserNft',$user->userId)}}" target="_blank" style="text-decoration: none" >{{$user->first_name}} {{$user->last_name}}</a>
                                        </div>
                                    </td>
                                    <td><span class="text_" >{{$user->bio}}</span></td>
                                    <td><span class="text_"  >{{$user->email}}</span></td>
                                    <td><span class="text_" >{{$user->gender}}</span></td>
                                    <td><span class="color-green text_">{{$user->balance}} ETH</span></td>
                                    <td><span>
                                        <div style="display: flex;align-items:center;justify-content:center">
                                            <label class="toggle">
                                              @if($user->accountStatus==1)
                                             <input checked onchange="userStat('{{$user->userId}}','{{$i}}')" id="buttonCheck{{$i}}"   class="toggle-checkbox" type="checkbox">
                                             @else
                                             <input   onchange="userStat('{{$user->userId}}','{{$i}}')" id="buttonCheck{{$i}}"   class="toggle-checkbox" type="checkbox">
                                             @endif
                                                <div class="toggle-switch"></div>
                                            </label>
                                           </div>    
                                    </span></td>
                                    <td>
                                        <span style="display:flex;justify-content:center">
                                            <button  onclick="location.href='{{url('admin',$user->userId)}}'" value="3" id="likeButton" class="btn btn-primary-alta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                                @else
                                <tr >
                                    <td><span>{{$i+1}}</span></td>
                                    <td>
                                        <div class="product-wrapper d-flex align-items-center">
                                            <a href="{{route('adminUserNft',$user->userId)}}" class="thumbnail">

                                                @if($user->pp==null && $user->gender==1)
                                                <img src="{{asset('assets/images/icons/boy-avater.png')}}" alt="{{$user->first_name}}" style="width:60px;height:60px" >
                                                @elseif($user->pp==null && $user->gender==0)
                                               <img src="{{asset('assets/images/icons/girl-avater.png')}}" alt="{{$user->first_name}}" style="width:60px;height:60px" >
                                                @else
                                                <img src="{{asset($user->pp)}}" alt="{{$user->first_name}}" style="width:60px;height:60px">
                                                @endif
                                                
                                            </a>
                                            <a href="{{route('adminUserNft',$user->userId)}}" target="_blank" style="text-decoration: none" >{{$user->first_name}} {{$user->last_name}}</a>
                                        </div>
                                    </td>
                                    <td><span >{{$user->bio}}</span></td>
                                    <td><span >{{$user->email}}</span></td>
                                    <td><span>{{$user->gender}}</span></td>
                                    <td><span class="color-green">{{$user->balance}} ETH</span></td>
                                    <td><span>
                                        <div style="display: flex;align-items:center;justify-content:center">
                                            <label class="toggle">
                                              @if($user->accountStatus==1)
                                             <input checked onchange="userStat('{{$user->userId}}','{{$i}}')" id="buttonCheck{{$i}}"   class="toggle-checkbox" type="checkbox">
                                             @else
                                             <input   onchange="userStat('{{$user->userId}}','{{$i}}')" id="buttonCheck{{$i}}"   class="toggle-checkbox" type="checkbox">
                                             @endif
                                                <div class="toggle-switch"></div>
                                            </label>
                                           </div>
                                    </span></td>
                                    <td>
                                        <span style="display:flex;justify-content:center">
                                            <button  onclick="location.href='{{url('admin',$user->userId)}}'"  value="3" id="likeButton" class="btn btn-primary-alta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                                @endif
                                @endforeach

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