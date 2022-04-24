<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create New || Nuron - NFT Marketplace Template</title>

    @include('include/header')
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Crete a New File</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="index.html">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Crete a New File</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->


    <!-- create new product area -->
    <form onsubmit="load()" action="{{route('createNft')}}" method="post" enctype="multipart/form-data">
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
                            <input name="createinputfile" onchange="preview(this, $('#audioPreview'))"  accept="audio/*,video/*,image/*"  id="createinputfile" type="file" class="inputfile" required/>

                            {{-- <input name="createinputfile" onchange="preview(this, $('#audioPreview'))"  accept="audio/*,image/*"  id="createinputfile" type="file" class="inputfile" required/> --}}
                             <input type="hidden" name="fileType" id="fileType">
                            <img id="createfileImage" src="assets/images/icons/toke.png" alt="" data-black-overlay="6">
                            <video style="width: 100%;height: 100%;object-fit: cover;position: absolute;display: none" id="video" controlslist="nodownload" loop="true" autoplay="autoplay" muted   controls>
                                <source src="" style="" id="video_here">
                                  Your browser does not support HTML5 video.
                              </video>

                            <!-- our custom upload button -->
                            <label   for="createinputfile" title="No File Choosen">
                                <i class="feather-upload"></i>
                                <span style="background: rgba(0, 0, 0, 0.527) !important" class="text-center">Choose a File</span>
                                <p  style="background: rgba(0, 0, 0, 0.527) !important" class="text-center mt--10">PNG, GIF, WEBP, MP4 or MP3. <br>    Max 1Gb.</p>
                            </label>
                        </div>
                    </div>
                    <div style="margin-top: 15px" class="brows-file-wrapper">
                    <audio controls="controls" id="audioPreview" controlsList="noplaybackrate nodownload" style="display:none;width: 100%;">
                        <source src="" />
                    </audio>


                    <video style="width:100%;height: auto !important;transition: 1s opacity;display: none" id="video" controlslist="nodownload" loop="true" autoplay="autoplay" muted  controls>
                        <source src="" style="width:%100;height:250px" id="video_here">
                          Your browser does not support HTML5 video.
                      </video>

                    </div>
                    <!-- end upoad file area -->

                    <div class="mt--100 mt_sm--30 mt_md--30 d-none d-lg-block">
                        <h5> Note: </h5>
                        <span> Service fee : <strong>2.5%</strong> </span> <br>
                        <span  > You will receive : <strong id="receive">1.00 ETH ${{$eth}}</strong></span>
                    </div>

                </div>

                <div  class="col-lg-7">
                    <div class="form-wrapper-one">
                            <div class="col-md-12">
                                <div class="input-box pb--20">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input id="name" name="productName" placeholder="e. g. `Digital Awesome Game`" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-box pb--20">
                                    <label for="Discription" class="form-label">Discription</label>
                                    <textarea name="discription" id="Discription" rows="3" placeholder="e. g. “After purchasing the product you can get item...”" required></textarea>
                                </div>
                            </div>

                            <div style="display: flex;justify-content: space-between;flex-wrap: wrap;flex-shrink: 1;">

                                <div   class="col-md-4 createPageInput">
                                <div class="input-box pb--20">
                                    <label for="dollerValue" class="form-label">Item Price in ETH</label>
                                    <input oninput="ethToDollar()" id="itemPrice" min="0.00001" step="any" name="price" id="dollerValue" type="number" required placeholder="e. g. `20ETH`">
                                </div>
                            </div>

                            <div  class="col-md-4 createPageInput">
                                <div class="input-box pb--20">
                                    <label for="Size" class="form-label">Size</label>
                                    <input name="size" id="Size"  type="number" min="1" max="1000" required  placeholder="e. g. `Size`">
                                    <!-- max="999" -->
                                </div>
                            </div>

                            <div   class="col-md-4 createPageInput">
                                <div class="input-box pb--20">
                                    <label for="Royality" class="form-label">Royality</label>
                                    <input name="royality" id="Royality"  type="number" min="0" max="50" required placeholder="e. g. `20%`">
                                </div>
                            </div>
                            
                        </div>

 

                            <div style="margin-top: 0!important;align-items:flex-start;display:flex; width:102.5%;flex-shrink: 1;" class="input-two-wrapper mt--25">
                                <div class="half-wid currency">
                                    <div class="col-md-12">
                                        <div class="input-box pb--10">
                                            <label for="Propertie" class="form-label">Propertie</label>
                                            <input name="property" id="Propertie"   onkeydown="return /[a-z ]/i.test(event.key)"  type="text" required placeholder="e. g. `Propertie`">
                                        </div> 
                                    </div>
                                </div>
                                <div   class="half-wid currency">
                                    <!-- select category -->
                                    <label for="Propertie" class="form-label">Category</label>
                                    <select  name="category" class="profile-edit-select2">
                                        <option value="" selected>Select Category</option>
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
                                    <input name="putonsale" value="1" class="rn-check-box-input"  type="checkbox" id="putonsale">
                                    <label  class="rn-check-box-label" for="putonsale">
                                        Put on Sale
                                    </label>
                                </div>
                            </div>

                            <div style="margin-left: 10px;" class="col-md-4 col-sm-4">
                                <div class="input-box pb--20 rn-check-box">
                                    <input name="instantSale" value="1" class="rn-check-box-input" type="checkbox" id="instantsaleprice">
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

                            <div style="width: 65%;"  >
                                <div class="input-box">
                                    <button id="submitButton"  type="submit" style="width: 100%;" class="btn btn-primary" >Submit Item</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="mt--100 mt_sm--30 mt_md--30 d-block d-lg-none">
                    <h5> Note: </h5>
                    <span> Service fee : <strong>2.5%</strong> </span> <br>
                    <span  > You will receive : <strong id="receive2">1.00 ETH ${{$eth}}</strong></span>
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
                            <a href="javascript:void()"><img id="modalImage" src="assets/images/icons/toke.png" alt="NFT_portfolio"></a>
                            <div id="buttonDiv" onclick="playAudio()" style="width: 30%;"  >
                                <div class="input-box">
                                    <button id="playButton"  type="button" style="width: 100%;position: absolute;" class="btn btn-primary-alta" >
                                        Play <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <video  width="100%"  height="350" style="object-fit: cover;display:none" id="modalVideo" controlslist="nodownload" loop="true" autoplay="autoplay" muted   controls>
                                <source src="" style="" id="video_here">
                                  Your browser does not support HTML5 video.
                              </video>
                              <audio  controls="controls" id="audioPreviewModal" controlsList="noplaybackrate nodownload" style="display:none;width: 100%;">
                                <source src="" />
                             </audio>
   
                            {{-- <button >Play</button>
                            <button onclick="document.getElementById('audioPreviewModal').pause();">Pause</button>
                            <button onclick="document.getElementById('audioPreviewModal').muted=!document.getElementById('audioPreviewModal').muted">Mute/ Unmute</button> --}}
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <a href="javascript:void()" class="avatar" data-tooltip="Nathan"><img src="assets/images/icons/boy-avater.png" alt="Nft_Profile"></a>
                                <a href="javascript:void()" class="avatar" data-tooltip="Adelyn"><img src="assets/images/icons/girl-avater.png" alt="Nft_Profile"></a>
                                <a href="javascript:void()" class="avatar" data-tooltip="Moon"><img src="assets/images/icons/girl.png"  alt="Nft_Profile"></a>
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
                        <a href="javascript:void()"><span id="productName" class="product-name">Preatent</span></a>
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
     
    <!-- Start Footer Area -->
   
<link rel="stylesheet" href="{{asset('assets/css/sweetAlertCss.css')}}">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
{{-- <script src="{{asset('assets/js/sweetAlert.js')}}"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    function preview(inputFile, previewElement) {

        const fileSize = inputFile.files[0].size / 1024 / 1024; // in MiB
      if (fileSize > 10) {
        inputFile.files[0]="";
        document.getElementById('submitButton').disabled=true;
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
//   text: 'The file size exceeds configured limit!',
  text:'Please enter a file with a valid file size no larger than 10MB.',
  confirmButtonText: 'OK',
  confirmButtonColor: '#00a3ff',
})

   } else {
    // Proceed further
    document.getElementById('submitButton').disabled=false;
    console.log(fileSize);
  }


        console.log("asda");
     
      
        var extension = inputFile.files[0].type;
        extension=extension.split('/',1);
        var image=document.getElementById('createfileImage');
        var video=document.querySelectorAll('video');
        var audio=document.getElementById('audioPreview');
        var fileType=document.getElementById('fileType');
        console.log(extension[0]);  
       
    
        if(extension[0]=='audio')
        {
            fileType.value='audio';
            console.log(fileType);
            audio.style.display="block";
            image.style.display="none";
            video.forEach(video_ => {
            video_.style.display="none";
            });
            setTimeout(() => {
                image.src="assets/images/icons/audio.png";
                image.style.display="block";
            },);
         
            if (inputFile.files && inputFile.files[0] && $(previewElement).length > 0) {

           $(previewElement).stop();
             var reader = new FileReader();
             reader.onload = function (e) {

    $(previewElement).attr('src', e.target.result);
    var playResult = $(previewElement).get(0).play();

    if (playResult !== undefined) {
        playResult.then(_ => {

            $(previewElement).show();
          })
            .catch(error => {
   
            $(previewElement).hide();
              });
             }
          };

          reader.readAsDataURL(inputFile.files[0]);
          }
        }
        else if(extension[0]=='video')
        {
            fileType.value='video';
            image.style.display="none";
            audio.style.display="none";
            audio.src="";
            video.forEach(video_ => {
            video_.style.display="block";
            video_.src = URL.createObjectURL(inputFile.files[0]);
            });
            
            // var $source = $('#video');

            // video.parent()[0].load();

            // $(document).on("change", ".file_multi_video", function(evt) {
            // var $source = $('#');
            //  $source[0].src = URL.createObjectURL(this.files[0]);
            //  $source.parent()[0].load();
            // });

        }
        else if(extension[0]=='image')
        {
            fileType.value='image';
            audio.style.display="none";
            audio.src="";
            video.forEach(video_ => {
            video_.style.display="none";
            });
            image.style.display="block";

        }
    }

    $(document).ready(function(){
    $(document).on('hide.bs.modal','.modal', function () {
     document.getElementById('audioPreviewModal').pause();
    });
});

    function modal()
     {
        var buttonDiv=document.getElementById('buttonDiv');
    var inputFile=document.getElementById('createinputfile'); 
    if( inputFile.files[0]!=null)
    {
        var extension = inputFile.files[0].type;
        extension=extension.split('/',1);
        console.log(extension);
        var price =  document.getElementById('itemPrice');
     var productName =  document.getElementById('name');
     var image=document.getElementById('createfileImage');
     var modalPrice =  document.getElementById('price');
     var modalProductName =  document.getElementById('productName');
     var modalImage =  document.getElementById('modalImage');
     var modalVideo =  document.getElementById('modalVideo');
     var audioPreviewModal = document.getElementById('audioPreviewModal');


       if(price.value!="" || productName.value!="")
       {
       modalProductName.innerText=productName.value;
       modalPrice.innerText=price.value+' ETH';
       }
       if(extension[0]=='image')
       {
           buttonDiv.style.display="none";
           modalVideo.style.display="none";
           modalImage.style.display="block";
           audioPreviewModal.style.display="none";
           modalImage.src=image.src;
       }
       else if(extension[0]=='video')
       {
           buttonDiv.style.display="none";
           modalImage.style.display="none";
           audioPreviewModal.style.display="none";
           modalVideo.style.display="block";
           modalVideo.src = URL.createObjectURL(inputFile.files[0]);
       }
       else if(extension[0]=='audio')
       {
        buttonDiv.style.display="block";
        modalVideo.style.display="none";
        modalImage.style.display="block";
        modalImage.src="assets/images/icons/audio.png";
        audioPreviewModal.style.display="block";
        audioPreviewModal.style.visibility="hidden";
        audioPreviewModal.src = URL.createObjectURL(inputFile.files[0]);
       }

    }

    
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

{{-- <style>
    .swal2-container {
  zoom: 1.8;
}
</style> --}}

<script>
    function ethToDollar()
    {
       var eth =  document.getElementById('eth');
       console.log(eth.innerText);
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
 
   
   </script>


    @include('include/footer')