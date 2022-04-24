<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Nft || Nuron - NFT Marketplace Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('include/header')

    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Update a File</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="index.html">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Update a File</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->


    <!-- create new product area -->
    <form onsubmit="load()" action="{{route('nftUpdate',$nft->nftId)}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="create-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 offset-1 ml_md--0 ml_sm--0">
                    <!-- file upload area -->
                    <div class="upload-area">

                        <div class="upload-formate mb--30">
                            <h6 class="title">
                                Upload file
                            </h6>
                            <p class="formate">
                                Choose your file to upload
                            </p>
                        </div>

                        <div  class="brows-file-wrapper">
                            <!-- actual upload which is hidden -->
                            {{-- <input name="createinputfile" id="createinputfile" type="file" class="inputfile" disabled  required/> --}}
                            @if($nft->dataType=="image")
                            <img id="createfileImage" src="{{asset($nft->data)}}" alt="" data-black-overlay="6">
                            @elseif($nft->dataType=="audio")
                            <img id="createfileImage" src="{{asset('assets/images/icons/audio.png')}}" alt="" data-black-overlay="6">
                            @elseif($nft->dataType=="video")
                            <video style="width: 100%;height: 100%;object-fit: cover;position: absolute;" id="video" controlslist="nodownload" loop="true" autoplay="autoplay" muted   controls>
                                <source src="{{asset($nft->data)}}" style="" id="">
                                  Your browser does not support HTML5 video.
                              </video>
                            @endif
                            <!-- our custom upload button -->
                            <label   for="createinputfile" title="No File Choosen">
                                {{-- <i class="feather-upload"></i>
                                <span style="background: rgba(0, 0, 0, 0.527) !important" class="text-center">Choose a File</span>
                                <p  style="background: rgba(0, 0, 0, 0.527) !important" class="text-center mt--10">PNG, GIF, WEBP, MP4 or MP3. <br>    Max 1Gb.</p> --}}
                            </label>
                        </div>
                    </div>
                    @if($nft->dataType=="audio")
                    <div style="margin-top: 15px" class="brows-file-wrapper">
                        <audio controls="controls" controlsList="noplaybackrate volume=0.2"  style="width: 100%;">
                            <source src="{{asset($nft->data)}}" />
                        </audio>
                        </div>
                    @elseif($nft->dataType=="video")
                    {{-- <div style="margin-top: 15px" class="brows-file-wrapper">
                    <video style="width:100%;height: auto !important;transition: 1s opacity;" id="video" controlslist="nodownload" loop="true" autoplay="autoplay" muted  controls>
                        <source src="{{asset($nft->data)}}" style="width:%100;height:250px" id="">
                          Your browser does not support HTML5 video.
                      </video>
                    </div> --}}
                    @endif

                    <!-- end upoad file area -->

                    <div class="mt--100 mt_sm--30 mt_md--30 d-none d-lg-block">
                        <h5> Note: </h5>
                        <span> Service fee : <strong>2.5%</strong> </span> <br>
                        <span  > You will receive : <strong id="receive">{{$nft->amount}} ETH ${{number_format($ethDollar, 2, ',', '.')}}</strong></span>
                    </div>

                </div>

                <div  class="col-lg-7">
                    <div class="form-wrapper-one">
                            <div class="col-md-12">
                                <div class="input-box pb--20">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input id="name" name="productName" placeholder="{{$nft->name}}" disabled required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-box pb--20">
                                    <label for="Discription" class="form-label">Discription</label>
                                    <textarea name="discription" id="Discription" rows="3"  disabled  required>{{$nft->discription}}</textarea>
                                </div>
                            </div>

                            <div style="display: flex;justify-content: space-between;flex-wrap: wrap;flex-shrink: 1;">

                            <div class="col-md-4 createPageInput">
                                <div class="input-box pb--20">
                                    <label for="dollerValue" class="form-label">Item Price in ETH</label>
                                    <input oninput="ethToDollar()" min="0.00001" step="any" id="itemPrice" name="price" id="dollerValue" type="number" required value="{{$nft->amount}}">
                                </div>
                            </div>

                            <div class="col-md-4 createPageInput">
                                <div class="input-box pb--20">
                                    <label for="Size" class="form-label">Size</label>
                                    <input name="size" id="Size" type="number" min="1" max="10" required disabled  placeholder="{{$nft->size}}">
                                    <!-- max="999" -->
                                </div>
                            </div>

                            <div class="col-md-4 createPageInput">
                                <div class="input-box pb--20">
                                    <label for="Royality" class="form-label">Royality</label>
                                    <input name="royality" id="Royality" disabled  type="number" min="0" max="50" required placeholder="{{$nft->royality}}%">
                                </div>
                            </div>
    
                        </div>

  
                        <div style="margin-top: 0!important;align-items:flex-start;display:flex; width:102.5%;flex-shrink: 1;" class="input-two-wrapper mt--25">
                            <div class="half-wid currency">
                                <div class="col-md-12">
                                    <div class="input-box pb--10">
                                        <label for="Propertie" class="form-label">Propertie</label>
                                        <input name="property" id="Propertie"  disabled  onkeydown="return /[a-z ]/i.test(event.key)"  type="text" required placeholder="{{$nft->property}}">
                                    </div> 
                                </div>
                            </div>
                            <div    class="half-wid currency">
                                <!-- select category -->
                                <label for="Propertie" class="form-label">Category</label>

                                <select name="category" class="profile-edit-select2">
                                    <option  data-display="{{$nft->category}}" value="">Select Category</option>
                                    <option value="Art">Art</option>
                                    <option value="Music">Music</option>
                                    <option value="Metaverses">Metaverses</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Collectibles">Collectibles</option>
                                    <option value="Photograph">Photograph</option>
                                    <option value="Trading Card">Trading Card</option>
                                    <option value="Virtual Worlds">Virtual Worlds</option>
                                </select>
                                <!-- end category -->
                            </div>
                        </div>

                            <div style="display: flex;">

                            <div class="col-md-4 col-sm-4">
                                <div class="input-box pb--20 rn-check-box">
                                @if($nft->sellStatus==1)
                                    <input name="putonsale" value="1" class="rn-check-box-input" checked  type="checkbox" id="putonsale">
                                @else
                                    <input name="putonsale" value="1" class="rn-check-box-input"  type="checkbox" id="putonsale">
                                  @endif

                                    <label  class="rn-check-box-label" for="putonsale">
                                        Put on Sale
                                    </label>
                                </div>
                            </div>

                            <div style="margin-left: 10px;" class="col-md-4 col-sm-4">
                                <div class="input-box pb--20 rn-check-box">
                                @if($nft->instantSale==1)
                                    <input name="instantSale" value="1" class="rn-check-box-input" checked type="checkbox" id="instantsaleprice">
                                @else
                                <input name="instantSale" value="1" class="rn-check-box-input" type="checkbox" id="instantsaleprice">
                                @endif

                                    <label  class="rn-check-box-label" for="instantsaleprice">
                                        Instant Sale Price
                                    </label>
                                </div>
                            </div>
                        </div>

                     
                           
                        <div style="display: flex;justify-content: space-between;">
                            <div style="width: 30%;"  >
                                <div class="input-box">
                                    <button onclick="modal()" type="button" style="width: 100%;" class="btn btn-primary-alta   " data-bs-toggle="modal" data-bs-target="#uploadModal">Preview</button>
                                </div>
                            </div>

                            {{-- <div style="width: 15%;"  >
                                <div class="input-box">
                                    <button onclick="modal()" type="button" style="width: 100%;" class="btn btn-danger   " data-bs-toggle="modal" data-bs-target="#uploadModal">Delete</button>
                                </div>
                            </div> --}}

                            <div style="width: 65%;"  >
                                <div class="input-box">
                                    <button  type="submit" style="width: 100%;" class="btn btn-primary  ">Submit Item</button>
                                </div>
                            </div>
                        </div>

                        <div style="width: 30%;margin-top:15px;float: right;margin-bottom:15px "  >
                            <div class="input-box" style="background: #212e48;border-radius:10px">
                                <button  onclick="deleteItem('{{$nft->nftId}}')" type="button" style="width: 100%;" class="btn btn-outline-danger" >Delete Item</button>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="mt--100 mt_sm--30 mt_md--30 d-block d-lg-none">
                    <h5> Note: </h5>
                    <span> Service fee : <strong>2.5%</strong> </span> <br>
                    <span  > You will receive : <strong id="receive2">{{$nft->amount}} ETH ${{number_format($ethDollar, 2, ',', '.')}}</strong></span>  
                    <span id="eth" style="display: none" >{{$eth}}</span> 
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- create new product area -->


    <!-- Modal -->
    <div class="rn-popup-modal upload-modal-wrapper modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content share-wrapper">
                <div class="modal-body">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            @if($nft->dataType=='image')
                            <a href="javascript:void()"><img id="image" src="{{asset('assets/images/icons/toke.png')}}" alt="NFT_portfolio"></a>
                            @elseif($nft->dataType=='audio')
                            <a href="javascript:void()"><img id="image" src="{{asset('assets/images/icons/audio.png')}}" alt="NFT_portfolio"></a>
                            <div onclick="playAudio()" style="width: 30%;"  >
                                <div class="input-box">
                                    <button id="playButton"  type="button" style="width: 100%;position: absolute;bottom:0" class="btn btn-primary-alta" >
                                        Play <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                              <audio  controls="controls" id="audioPreviewModal" controlsList="noplaybackrate nodownload" style="display:none;width: 100%;">
                                <source src="{{asset($nft->data)}}" />
                             </audio>
                            @elseif($nft->dataType=='video')
                            <video  width="100%"  height="350" style="object-fit: cover" id="modalVideo" controlslist="nodownload" loop="true" autoplay="autoplay" muted   controls>
                                <source src="{{asset($nft->data)}}" style="" id="video_here">
                                  Your browser does not support HTML5 video.
                              </video>
                            @endif
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="javascript:void()" class="avatar" data-tooltip="Nathan"><img src="{{asset('assets/images/icons/boy-avater.png')}}" alt="Nft_Profile"></a>
                                <a href="javascript:void()" class="avatar" data-tooltip="Adelyn"><img src="{{asset('assets/images/icons/girl-avater.png')}}" alt="Nft_Profile"></a>
                                <a href="javascript:void()" class="avatar" data-tooltip="Moon"><img src="{{asset('assets/images/icons/girl.png')}}"  alt="Nft_Profile"></a>
                                <a class="more-author-text" href="javascript:void()">9+ Place Bit.</a>
                            </div>
                            <div class="share-btn share-btn-activation dropdown">

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
                        <a href="javascript:void()"><span  class="product-name">{{$nft->name}}</span></a>
                        <span class="latest-bid">Highest bid 1/20</span>
                        <div class="bid-react-area">
                            <div id="price" class="last-bid">0.244 ETH</div>
                            <div class="react-area">
                                <svg viewBox="0 0 17 16" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN kBvkOu">
                                    <path d="M8.2112 14L12.1056 9.69231L14.1853 7.39185C15.2497 6.21455 15.3683 4.46116 14.4723 3.15121V3.15121C13.3207 1.46757 10.9637 1.15351 9.41139 2.47685L8.2112 3.5L6.95566 2.42966C5.40738 1.10976 3.06841 1.3603 1.83482 2.97819V2.97819C0.777858 4.36443 0.885104 6.31329 2.08779 7.57518L8.2112 14Z" stroke="currentColor" stroke-width="2"></path>
                                </svg>
                                <span class="number">322</span>
                            </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css"> --}}
<link rel="stylesheet" href="{{asset('assets/css/sweetAlertCss.css')}}">
<script src="{{asset('assets/js/sweetAlert.js')}}"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


<script>
$("#Discription").each(function () {
  this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
}).on("input", function () {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});

</script>

<script>
$("#putonsale").change( function(){
    var instantsaleprice=document.getElementById('instantsaleprice');
   if( $(this).is(':checked') ) {
       instantsaleprice.checked=false;
    }else{
        instantsaleprice.checked=false;
   }
});

$("#instantsaleprice").change( function(){
    var putonsale=document.getElementById('putonsale');
   if( $(this).is(':checked') ) {
    putonsale.checked=true;
    }
});

</script>
    
    <script>
     

     function ethToDollar()
     {
   
        
        var eth =  document.getElementById('eth');
        var price =  document.getElementById('itemPrice');
        var receive = document.getElementById('receive');
        var receive2 = document.getElementById('receive2');

        var calc= price.value- (price.value*0.025);
        var dollar=price.value*eth.innerText;
        var index=dollar.toString().indexOf('.');

        var formatterDollar = new Intl.NumberFormat('en-US', {
         style: 'currency',
         currency: 'USD',
        });

        var formatterETh = new Intl.NumberFormat('en-US', {
        });


        // receive.innerText=calc+' ETH $'+dollar.toString().slice(0,index+4);
        // receive2.innerText=calc+' ETH $'+dollar.toString().slice(0,index+4);

        receive.innerText=formatterETh.format(calc)+' ETH '+formatterDollar.format(dollar);
        receive2.innerText=formatterETh.format(calc)+' ETH '+formatterDollar.format(dollar);
     }
  
     function modal()
      {
       var price =  document.getElementById('itemPrice');
      var productName =  document.getElementById('name');
      var image=document.getElementById('createfileImage');
      var modalPrice =  document.getElementById('price');
    //   var modalProductName =  document.getElementById('productName');
      var modalImage =  document.getElementById('image');

        if(price.value!="" || productName.value!="")
        {
        // modalProductName.innerText=productName.value;
        modalPrice.innerText=price.value+' ETH';
        }
        
        modalImage.src=image.src;

      }

  

      
    </script>

<script>
    var playClick=0;
    function playAudio()
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
    function deleteItem(nftId)
    {
      
        Swal.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#28a745',
         cancelButtonColor: '#dc3545',
         confirmButtonText: 'Yes, delete it!',
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
            url: '{{route('deleteNft')}}',
            data: {'nftId':nftId},
            success: function (response) {
                Swal.fire(
                     'Deleted!',
                    'Your NFT ITEM has been deleted.',
                    'success'
                 ).then(function() {
                    // location.href = "/";
                    location.reload();

                });
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
               

 





     
            

</script>


    @include('include/footer')