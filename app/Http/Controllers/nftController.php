<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\nftModel;
use APP\Models\sellModel;
use App\Models\userModel;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class nftController extends Controller
{
    //

    public function index()
    {
   
      $data['users']=DB::select("select first_name,last_name,gender,pp,users.userId from users order by rand()  limit 10");

      $data['index']=DB::select("select * from createNft where sellStatus=1 order by rand() limit 5");

      $indexId="";
      foreach ($data['index'] as $key => $nft) {
       $indexId.="'".$nft->nftId."',";

      }
      if($indexId!="")
      {
        $indexId[-1]=" ";
        $data['indexBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$indexId.')  order by bidNft.bid desc');
      }
      else
      $data['indexBid']=[];
 

      $data['indexOrderBy']=DB::select("select * from createNft where sellStatus=1 order by created_at desc limit 5");

      $indexOrderById="";
      foreach ($data['indexOrderBy'] as $key => $nft) {
       $indexOrderById.="'".$nft->nftId."',";

      }
      if($indexOrderById!="")
      {
        $indexOrderById[-1]=" ";
        $data['indexOrderByBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$indexOrderById.')  order by bidNft.bid desc');
      }
      else
      $data['indexOrderByBid']=[];



      $data['nftBased']=DB::select("select * from createNft where sellStatus=1 and (dataType='audio' or dataType='video')  order by rand() limit 10");

      $nftBasedId="";
      foreach ($data['nftBased'] as $key => $nft) {
       $nftBasedId.="'".$nft->nftId."',";

      }
      if($nftBasedId!="")
      {
        $nftBasedId[-1]=" ";
        
        $data['nftBasedBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$nftBasedId.')  order by bidNft.bid desc');
      }
      else
      $data['nftBasedBid']=[];
     

      return view('index',$data);
    }
    
    public function createPage()
    {
     
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        // //   CURLOPT_URL => "https://rest.coinapi.io/v1/exchangerate/BTC?invert=false",
        //   CURLOPT_URL => "https://rest.coinapi.io/v1/exchangerate/ETH/USD",

        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "GET",
        //   CURLOPT_HTTPHEADER => array(
        //     "cache-control: no-cache",
        //     "X-CoinAPI-Key: 7E2D038C-0780-40A9-9086-1D39868CC309"
        //   ),
        // ));

        // // 57892D2F-120E-48F3-88D8-CCDB9614C703
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // $response = json_decode($response, true); //because of true, it's in an array
 
        // curl_close($curl);
        
 
      //  $index= strpos($response["rate"], ".");
      
      //  $data["eth"]=substr($response["rate"],0,$index+4);
       


      // https://nomics.com/docs/
      // f123d8b839a502fa03553e1dd037a44c2c86d509


      // 6ed4c357ff81c34c0f9ced496018ed56153c7dcfa430a906f51fc405cde7ef42
      
      if(Auth::check())
      {
        $response=file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=USD,EUR&api_key=6ed4c357ff81c34c0f9ced496018ed56153c7dcfa430a906f51fc405cde7ef42");
        $data["eth"]=json_decode($response)->ETH->USD;
  
  
        // $response=file_get_contents("https://data.messari.io/api/v1/assets?fields=id,slug,symbol,metrics/market_data/price_usd");
        //  $response=json_decode($response)->data[1]->metrics->market_data->price_usd;
        //  $index= strpos( $response, ".");
        //  $data["eth"]=substr($response,0,$index+4);
  
  
         return view('content/create',$data);
      }
      else
      {
        return redirect()->to('login');

      }

    }
   

    public function createNft(Request $request)
    {
        
      $extention=$request->createinputfile->getClientOriginalExtension();

      // $base64 ='data:audio/'. $extention. ';base64,'. base64_encode(file_get_contents($request->createinputfile));
           
          
        if($request->putonsale==null)
        $request->putonsale=0;

        if($request->instantSale==null)
        $request->instantSale=0;

        $size=$request->size;

        $rndStr=Str::random(30);
        $hashId=Carbon::now()->timestamp.$rndStr;
        $nftId=sha1($hashId);
        $data=$nftId.'.'.$extention;
        if($request->fileType=='image')   
        {
           $request->createinputfile->move(public_path('nft/images/'.Auth::user()->userId),$data);
           for ($i=0; $i <$size ; $i++) { 
            // sleep(0.1);
            $rndStr=Str::random(30);
            $hashId=Carbon::now()->timestamp.$rndStr;
            $nftId='0x'.sha1($hashId);
            if($i==0)
            $firstNftId=$nftId;
            ucfirst(strtolower($request->firstName));
            nftModel::create([
                'nftId'=>$nftId,
                'createrId'=>Auth::user()->userId,
                'ownerId'=>Auth::user()->userId,
                'name'=>ucfirst(strtolower($request->productName)),
                'discription'=>$request->discription,
                'category'=>$request->category,
                'amount'=>$request->price,
                'size'=>($i+1).'/'.$size,
                'royality'=>$request->royality,
                'property'=>$request->property,
                'sellStatus'=>$request->putonsale,
                'instantSale'=>$request->instantSale,
                'data'=>"nft/images/".Auth::user()->userId.'/'.$data,
                'dataType'=>$request->fileType,
                'likes'=>'["test"]'
              ]);
    
                  }

        }
        elseif($request->fileType=='audio')
        {
           $request->createinputfile->move(public_path('nft/audio/'.Auth::user()->userId),$data);

           for ($i=0; $i <$size ; $i++) { 
            // sleep(0.1);
            $rndStr=Str::random(30);
            $hashId=Carbon::now()->timestamp.$rndStr;
            $nftId='0x'.sha1($hashId);
            if($i==0)
            $firstNftId=$nftId;
            ucfirst(strtolower($request->firstName));
            nftModel::create([
                'nftId'=>$nftId,
                'createrId'=>Auth::user()->userId,
                'ownerId'=>Auth::user()->userId,
                'name'=>ucfirst(strtolower($request->productName)),
                'discription'=>$request->discription,
                'category'=>$request->category,
                'amount'=>$request->price,
                'size'=>($i+1).'/'.$size,
                'royality'=>$request->royality,
                'property'=>$request->property,
                'sellStatus'=>$request->putonsale,
                'instantSale'=>$request->instantSale,
                'data'=>"nft/audio/".Auth::user()->userId.'/'.$data,
                'dataType'=>$request->fileType,
                'likes'=>'["test"]'
               ]);
                  }
        }
        else if($request->fileType=='video')
        {
          $request->createinputfile->move(public_path('nft/video/'.Auth::user()->userId),$data);

          for ($i=0; $i <$size ; $i++) { 
           // sleep(0.1);
           $rndStr=Str::random(30);
           $hashId=Carbon::now()->timestamp.$rndStr;
           $nftId='0x'.sha1($hashId);
           if($i==0)
           $firstNftId=$nftId;
           ucfirst(strtolower($request->firstName));
           nftModel::create([
               'nftId'=>$nftId,
               'createrId'=>Auth::user()->userId,
               'ownerId'=>Auth::user()->userId,
               'name'=>ucfirst(strtolower($request->productName)),
               'discription'=>$request->discription,
               'category'=>$request->category,
               'amount'=>$request->price,
               'size'=>($i+1).'/'.$size,
               'royality'=>$request->royality,
               'property'=>$request->property,
               'sellStatus'=>$request->putonsale,
               'instantSale'=>$request->instantSale,
               'data'=>"nft/video/".Auth::user()->userId.'/'.$data,
               'dataType'=>$request->fileType,
               'likes'=>'["test"]'
              ]);
        }
      }


    
              return redirect()->to('nft/'.$firstNftId);
          //  }

    // catch (\Throwable $th) 
    //      {
    //       $errors = ['error'=>'Nft not created.'];
    //       return redirect()->to('create')->withErrors($errors);     
    //       }
    }

    public function nftUpdatePage($nftId)
    {

      // $bid= DB::select("select * from users inner join bidNft on users.userId=bidNft.bidAccount 
      // where nftId= ? and sellId is null and bid>= ? ORDER BY bidNft.bid desc, bidNft.updated_at;",[$nftId,12]);
      
      // dd($bid==null);


      // $bidIsNull=DB::table('bidNft')->where('nftId',$nftId)->where('sellId',null)->first();


      // dd($bidIsNull!=null);

      // $bid= DB::select("select * from users inner join bidNft on users.userId=bidNft.bidAccount 
      // where nftId= ? and sellId is null and bid>= ? ORDER BY bidNft.bid desc, bidNft.updated_at;",[$nftId,10])[0];
      
      // dd($bid);
      $data['nft']=nftModel::where('nftId',$nftId)->where('sellStatus','!=',-1)->first();
      if(Auth::check() && $data['nft']!=null  && Auth::user()->userId==$data['nft']->ownerId)
    {
      try {
        
        $data['nft']=nftModel::where('nftId',$nftId)->where('sellStatus','!=',-1)->first();
        $response=file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=USD,EUR&api_key=6ed4c357ff81c34c0f9ced496018ed56153c7dcfa430a906f51fc405cde7ef42");
        $eth=json_decode($response)->ETH->USD;

        $ethDollar=($eth*$data['nft']->amount);

        $index= strpos($eth,".");
        $index2= strpos( $ethDollar, ".");

        $data['eth']=substr($eth,0,$index+4);
        $data['ethDollar']=substr($ethDollar,0,$index2+4);
        $data['serviceFee']=(2.5/100);
        
        return view('content/nftUpdate',$data);
      } 
      catch (\Throwable $th) {
        return redirect()->back();
          //yonlendirmeleri düzelt
      }
    }
    else
    {
      try {
        //yonlendirmeleri düzelt
        return redirect()->to('nft/'.$nftId);
      } catch (\Throwable $th) {
        return redirect()->to('');
      }
    }
    

    }


    public function nftUpdate(Request $request,$nftId)
    {

      $bidIsNull=DB::table('bidNft')->where('nftId',$nftId)->where('sellId',null)->first();
      
      //teklif var mı ?

      if($request->putonsale==null)
      $request->putonsale=0;

      if($request->instantSale==null)
      $request->instantSale=0;



      if($bidIsNull != null)
      {

        //Anında satış varsa satışı gercekleştir
        if($request->instantSale==1 && $request->putonsale==1 )
        {
         
        
          // $bid=DB::table('bidNft')->where('nftId',$nftId)->whereNull('sellId')->where('bid',$request->price)->orderBy('bid','desc')->orderBy('updated_at')->first(); 
         $bid= DB::select("select * from users inner join bidNft on users.userId=bidNft.bidAccount 
           where bidNft.nftId=? and bidNft.sellId is null and users.balance>=? and bidNft.bid>=? and users.balance>=bidNft.bid ORDER BY bidNft.bid desc, bidNft.created_at",[$nftId,$request->price,$request->price]);

          //  $bid= DB::select("select * from users inner join bidNft on users.userId=bidNft.bidAccount 
          //  where nftId= ? and sellId is null and bid>= ? ORDER BY bidNft.bid desc, bidNft.updated_at;",[$nftId,10])[0];
          //  dd($bid);
             //Güncellenen fiyatta teklif var satış yap.
           if($bid!=null)
           {
            $bid=$bid[0];
            $time=Carbon::now();
            $userId=$bid->userId;
            $nft=nftModel::where('nftId',$nftId)->first();

            $rndStr=Str::random(30);
            $hashId=$time->timestamp.$rndStr;
            $sellId=sha1($hashId);
    
            DB::table('sellNft')->insert([
              'sellId'=>$sellId,
              'nftId'=>$nftId,
              'fromAccount'=>$nft->ownerId,
              'toAccount'=>$userId,
              'created_at'=>$time,
            ]);
    
            //reddedilen
            DB::table('bidNft')->where('nftId',$nftId)->where('sellId',null)->update([
              'status'=>3,
              'updated_at'=>$time,
              'sellId'=>$sellId
            ]);
    
            //satılan
            DB::table('bidNft')->where('bidAccount',$userId)->where('nftId',$nftId)->where('sellId',$sellId)->update([
              'status'=>2,
              'updated_at'=>$time,
            ]);
    
            //satıs sonrası nft tablosu guncelle
            
            //royality 
            // $royality=($nft->royality/100);
            // $royalityUpdate=((double)$request->price)*((double)$royality);
            // $balanceUpdate=((double)$request->price)-((double)$royalityUpdate);

            $royality=($nft->royality/100);
            $royalityUpdate=((double)$request->price)*((double)$royality);
            $balanceUpdate=((double)$request->price)-((double)$royalityUpdate);
            // $serviceFee=($nft->amount*(2.5/100));
            $serviceFee=($request->price*(2.5/100));
            $balanceUpdate=((double)$balanceUpdate)-((double)$serviceFee);
    
           if(((double)$nft->royality)>0)
           {
            //creater royality
            $createrUser=userModel::where('userId',$nft->createrId)->first('balance');
            $royalityUpdate=((double)$createrUser->balance+(double)$royalityUpdate);
    
            userModel::where('userId',$nft->createrId)->update([
              'balance'=>$royalityUpdate
            ]);
       
           }
            
           //owner update
            $ownerUser=userModel::where('userId',$nft->ownerId)->first('balance');
            $balanceUpdate=((double)$ownerUser->balance+(double)$balanceUpdate);
    
            userModel::where('userId',$nft->ownerId)->update([
              'balance'=>$balanceUpdate
            ]);
    
            //bidder
            $sellUser=userModel::where('userId',$userId)->first();
            $balance=((double)$sellUser->balance)-((double)$request->price);
             userModel::where('userId',$userId)->update([
               'balance'=>$balance
             ]);

             nftModel::where('nftId',$nftId)->update([
              'ownerId'=>$userId,
              'amount'=>$request->price,
              'sellStatus'=>0,
              'instantSale'=>0
            ]);

             //yonlendir
            //  dd("teklif var satıs gercekleşti");

            $user=userModel::where('userId',$userId)->first();

            if($user->orderNotification==1)
            {
              $array['email'] = $user->email;
              $array['nftId'] = $request->nftId;
              $array['text']="Offer accepted.";
        
              Mail::send('company/mail',$array,function($message) use ($array){
                      $message->subject('Nuron NFT');
                      $message->to($array['email']);
               });
              //mail gonder kabul;
            }

            if(Auth::user()->orderNotification==1)
            {
              $array['email'] = Auth::user()->email;
              $array['nftId'] = $request->nftId;
              $array['text']="Offer accepted.";
        
              Mail::send('company/mail',$array,function($message) use ($array){
                      $message->subject('Nuron NFT');
                      $message->to($array['email']);
               });
              //mail gonder kabul;
            }

             return redirect()->to('nft/'.$nftId);

           }
           //Güncellenen fiyatta teklif veren yok 
           else
           {
            nftModel::where('nftId',$nftId)->update([
              'sellStatus'=>$request->putonsale,
              'instantSale'=>$request->instantSale,
              'amount'=>$request->price,
              'category'=>$request->category
             ]);
           
            //  dd("güncellenen fiyatta teklif yok");
             return redirect()->to('nft/'.$nftId);
             //yonlendir
           }
  
        }
        else
        {
          nftModel::where('nftId',$nftId)->update([
            'sellStatus'=>$request->putonsale,
            'instantSale'=>$request->instantSale,
            'amount'=>$request->price,
            'category'=>$request->category
           ]);
          //  dd("anında satiş yok");
           return redirect()->to('nft/'.$nftId);
        }
      }

      //teklif yok.
      else
      {
          
        nftModel::where('nftId',$nftId)->update([
          'sellStatus'=>$request->putonsale,
          'instantSale'=>$request->instantSale,
          'amount'=>$request->price,
          'category'=>$request->category
         ]);
        
        //  dd("teklif yok");
         return redirect()->to('nft/'.$nftId);
         //yonlendir

      }
      
     
    }

 
    public function nftDetail($nftId)
    {


     try {
        
        $data['nft']=nftModel::where('nftId',$nftId)->where('sellStatus','!=',-1)->first();
        $data['property']= str_word_count($data['nft']->property,1);
        $data['creater']=DB::table('users')->where('userId',$data['nft']->createrId)->first();
        $data['owner']=DB::table('users')->where('userId',$data['nft']->ownerId)->first();
         

        $data['winningBid']=DB::select('select users.userId,
        users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.created_at,bidNft.updated_at from users 
        inner join bidNft on  users.userId = bidNft.bidAccount 
        where bidNft.nftId=? and bidNft.status=2 order by updated_at desc',[$nftId]);
       

        //nft satışta mı
        $control=DB::select("select * from createNft where nftId=? and sellStatus=1 limit 1",[$nftId]);
 
        //satıştaysa
        if($control)
        {
          $data['bidHistory']=DB::select('select users.userId,
          users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.created_at from users 
          inner join bidNft on  users.userId = bidNft.bidAccount 
          where bidNft.sellId is null and bidNft.nftId=? order by bidNft.bid desc,bidNft.created_at;',[$nftId]);

        }
        else
        {
          if($data['winningBid']!=null)
          {
            $data['bidHistory']=DB::select("
            select users.userId,
            users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.created_at from users 
            inner join bidNft on  users.userId = bidNft.bidAccount 
            where bidNft.sellId =
              (select sellId from sellNft where nftId=? and  toAccount=?  order by created_at limit 1) order by bidNft.bid desc,bidNft.created_at",[
                $nftId,$data['winningBid'][0]->userId]);
          }
          else
          {
            $data['bidHistory']=[];
          }
  
        }



        $data['randomNft']=DB::select('select * from createNft where nftId != ? and sellStatus=1 order by rand() limit 5',[$nftId]);
       
        $randomNftBid="";
        foreach ($data['randomNft'] as $key => $nft) {
          $randomNftBid.="'".$nft->nftId."',";
   
         }
         if($randomNftBid!="")
         {
           $randomNftBid[-1]=" ";
           $data['randomNftBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
           bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$randomNftBid.') order by bidNft.bid desc ');
         }
         else
         $data['randomNftBid']=[];

        // $data['bidHistory']=DB::select('select users.userId,
        // users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.created_at from users 
        // inner join bidNft on  users.userId = bidNft.bidAccount 
        // where bidNft.sellId is null and bidNft.nftId=? order by bidNft.bid desc,bidNft.created_at;',[$nftId]);


        // select users.userId,
        // users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.updated_at from users 
        // inner join bidNft on  users.userId = bidNft.bidAccount and bidNft.sellerId="02dbdab56884c06473242376c558656a7eef6663"
        // where bidNft.nftId="5e04820b834dc7921617b8e8b4da20f1f252b562"  order by bidNft.bid desc,bidNft.updated_at desc;

  
      
        // select users.userId,
        // users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.updated_at from users 
        // inner join bidNft on  users.userId = bidNft.bidAccount and bidNft.sellerId="02dbdab56884c06473242376c558656a7eef6663"
        // where bidNft.nftId="0bac1a2c584a7643ff1410f3d7da649c67ac5643"  order by bidNft.bid desc,bidNft.updated_at desc;
 
        // $data['bidHistory']=DB::select('select users.userId,
        // users.first_name,users.last_name,users.pp,users.gender,bidNft.bid,bidNft.updated_at from users 
        // inner join bidNft on  users.userId = bidNft.bidAccount 
        // where bidNft.nftId=? and bidNft.status!=2 ORDER BY updated_at desc;',[$nftId]);

    

        //sellNft tablosuna nftId ve  

        

        // $response=file_get_contents("https://data.messari.io/api/v1/assets?fields=id,slug,symbol,metrics/market_data/price_usd");
        // $eth=json_decode($response)->data[1]->metrics->market_data->price_usd;
        
        // https://www.cryptocompare.com/cryptopian/api-keys
        $response=file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=USD,EUR&api_key=6ed4c357ff81c34c0f9ced496018ed56153c7dcfa430a906f51fc405cde7ef42");
        $eth=json_decode($response)->ETH->USD;
        

        $ethDollar=($eth*$data['nft']->amount);

        $index= strpos($eth,".");
        $index2= strpos( $ethDollar, ".");

        $data['eth']=substr($eth,0,$index+4);
        $data['ethDollar']=substr($ethDollar,0,$index2+4);
        $data['serviceFee']=(2.5/100);

        $like=json_decode($data['nft']->likes);

        if($like!=null)
        {
          if(Auth::check())
          $index=array_search(Auth::user()->userId,$like);
          else
          $index=false;

          if($index!=0)
          {
            $data['like']=1;
            $data['likeCount']=(count($like)-1);
          }
          else
          {
            $data['like']=0;
            $data['likeCount']=(count($like)-1);
          }
          
        }
        else
        {
          $data['like']=0;
          $data['likeCount']=0;
        }
        return view('content/asset',$data);
      } 
      catch (\Throwable $th) {
        return view('content/nftNotFound');

      }
    }

    public function nft()
    {
        return redirect()->back();
    }

   
    public function placeBid(Request $request)
    {
      
      // $instantSale=nftModel::where('nftId',$request->nftId)->first();


 
      $time=Carbon::now();
      $userId=Auth::user()->userId;
      $nft=nftModel::where('nftId',$request->nftId)->first();
 

      $bidDublicate=DB::table('bidNft')->where('nftId',$request->nftId)->where('sellId',null)->where('bidAccount',$userId)->first();

      $user=userModel::where('userId',$userId)->first();

      if($user->newBid==1)
      {
        $array['email'] = Auth::user()->email;
        $array['nftId'] = $request->nftId;
        $array['text']="New offer for your nft";

        Mail::send('company/mail',$array,function($message) use ($array){
                $message->subject('Nuron NFT');
                $message->to($array['email']);
         });
        //mail gonder kabul;
      }


      // $bid=DB::table('sellControl')->where('bidId',$nft->ownerId)->where('nftId',$nft->nftId)->orderBy('date','desc')->first();


      // DB::table('sellControl')->where('winnerId',$nft->ownerId)->where('nftId',$nft->nftId);
   
      //daha once teklif verilmisse guncelle
      if($bidDublicate)
      {
        DB::table('bidNft')->where('bidAccount',$userId)->update([
          'bid'=>$request->bid,
          'created_at'=>$time,
          'updated_at'=>$time
        ]);

      }
      else
      {
        $rndStr=Str::random(30);
        $hashId=$time->timestamp.$rndStr;
        $bidId=sha1($hashId);

        DB::table('bidNft')->insert([
          'bidId'=>$bidId,
          'nftId'=>$request->nftId,
          'bidAccount'=>$userId,
          'bid'=>$request->bid,
          'status'=>1,
          'created_at'=>$time,
          'updated_at'=>$time,
          'sellId'=>null
        ]);
      }
      
      //insta sale   para kontrolu yap
      if($nft->sellStatus==1 && $nft->instantSale==1 &&  $request->bid >= $nft->amount)
      {

        $rndStr=Str::random(30);
        $hashId=$time->timestamp.$rndStr;
        $sellId=sha1($hashId);


        DB::table('sellNft')->insert([
          'sellId'=>$sellId,
          'nftId'=>$request->nftId,
          'fromAccount'=>$nft->ownerId,
          'toAccount'=>$userId,
          'created_at'=>$time,
        ]);
        

        //reddedilen
        DB::table('bidNft')->where('nftId',$request->nftId)->where('sellId',null)->update([
          'status'=>3,
          'updated_at'=>$time,
          'sellId'=>$sellId
        ]);

        //satılan
        DB::table('bidNft')->where('bidAccount',$userId)->where('nftId',$request->nftId)->where('sellId',$sellId)->update([
          'status'=>2,
          'updated_at'=>$time,
        ]);

   
     
        //royality 
    
        $royality=($nft->royality/100);
        $royalityUpdate=((double)$request->bid)*((double)$royality);
        $balanceUpdate=((double)$request->bid)-((double)$royalityUpdate);
        // $serviceFee=($nft->amount*(2.5/100));
        $serviceFee=($request->bid*(2.5/100));
        $balanceUpdate=((double)$balanceUpdate)-((double)$serviceFee);
        
        

       if(((double)$nft->royality)>0)
       {

        $createrUser=userModel::where('userId',$nft->createrId)->first('balance');
        $royalityUpdate=((double)$createrUser->balance+(double)$balanceUpdate);

        userModel::where('userId',$nft->createrId)->update([
          'balance'=>$royalityUpdate
        ]);

   
       }

        $ownerUser=userModel::where('userId',$nft->ownerId)->first('balance');
        $balanceUpdate=((double)$ownerUser->balance+(double)$balanceUpdate);

        userModel::where('userId',$nft->ownerId)->update([
          'balance'=>$balanceUpdate
        ]);

        //bidder
        // $balance=((double)Auth::user()->balance)-((double)$request->serviceFee+(double)$request->bid);
        $balance=((double)Auth::user()->balance)-((double)$request->bid);
         userModel::where('userId',$userId)->update([
           'balance'=>$balance
         ]);


              //satıs sonrası nft tablosu guncelle
        nftModel::where('nftId',$request->nftId)->update([
          'ownerId'=>$userId,
          'sellStatus'=>0,
          'instantSale'=>0
        ]);

        $user=userModel::where('userId',$userId)->first();

        if($user->orderNotification==1)
        {
          $array['email'] = $user->email;
          $array['nftId'] = $request->nftId;
          $array['text']="Offer accepted.";
  
          Mail::send('company/mail',$array,function($message) use ($array){
                  $message->subject('Nuron NFT');
                  $message->to($array['email']);
           });
          //mail gonder kabul;
        }

        if(Auth::user()->orderNotification==1)
        {
          $array['email'] = Auth::user()->email;
          $array['nftId'] = $request->nftId;
          $array['text']="Offer accepted.";
  
          Mail::send('company/mail',$array,function($message) use ($array){
                  $message->subject('Nuron NFT');
                  $message->to($array['email']);
           });
          //mail gonder kabul;
        }
     

      }

               
      return response()->json($bidDublicate);
    }
   

    public function userProfile($userId)
    {
      $data['user']=userModel::where('userId',$userId)->first();
      
      if($data['user']!=null)
      {

        //    $data['ownerNft']=nftModel::where('ownerId',$userId)->get();
        //    $data['createNft']=nftModel::where('createrId',$userId)->get();
        //    $data['onSaleNft']=nftModel::where('ownerId',$userId)->where('sellStatus',1)->get();
           
        $data['ownerNft']=DB::select("select * from createNft inner join users on users.userId=createNft.ownerId where createNft.sellStatus!=-1 and createNft.ownerId='".$userId."' order by createNft.updated_at desc");
        // $data['ownerNftBid']=DB::select("select first_name,last_name,pp,userId from users where userId in (select bidAccount from bidNft where sellId is null  and nftId in (select nftId from createNft inner join users on users.userId=createNft.ownerId where createNft.ownerId='".$userId."'))");
        // $data['ownerNftBid']=DB::select("select  users.first_name,users.last_name,users.pp,users.userId,bidNft.nftId,
        // bidNft.bid
        //  from users inner join bidNft on users.userId=bidNft.bidAccount
        //  where  userId in (select bidAccount from bidNft where  nftId in 
        //  (select nftId from createNft  where createNft.ownerId='".$userId."')) order by bidNft.bid desc, bidNft.created_at ");
    
       
         $data['ownerNftBid']=DB::select("select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
         bidNft.bid
          from users inner join bidNft on users.userId=bidNft.bidAccount
          where bidNft.sellId is null and userId in (select bidAccount from bidNft where  nftId in 
          (select nftId from createNft  where createNft.ownerId='".$userId."'))  order by bidNft.bid desc, bidNft.created_at ");
          
    
         
        $data['createNft']=DB::select("select * from createNft inner join users on users.userId=createNft.createrId where createNft.sellStatus!=-1 and createNft.createrId='".$userId."' order by createNft.updated_at desc");
    
        
        $data['createNftBid']=DB::select("select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid
         from users inner join bidNft on users.userId=bidNft.bidAccount
         where bidNft.sellId is null and userId in (select bidAccount from bidNft where  nftId in 
         (select nftId from createNft  where createNft.createrId='".$userId."'))  order by bidNft.bid desc, bidNft.created_at ");
    
        $data['onSaleNft']=DB::select("select * from createNft inner join users on users.userId=createNft.ownerId where sellStatus=1 and createNft.createrId='".$userId."' order by createNft.updated_at desc");
    
           if(Auth::check())
           {
           $jsonNft=(json_decode(Auth::user()->likesNft));
           if($jsonNft!=null || $jsonNft!=[])
           {
            $arrayNft="";
            foreach ($jsonNft as $key => $value) {
              $arrayNft.="'".$value."',";
            }
            
            $arrayNft=substr($arrayNft, 0, -1);
            // tekrar bak
            $data['likesNft']=DB::select('select * from createNft inner join users on users.userId=createNft.ownerId where createNft.sellStatus!=-1 and nftId IN ('.$arrayNft.')');
         
            $data['likesNftBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
            bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$arrayNft.') order by bidNft.bid desc ');
           }
            else
            {
             $data['likesNft']=[];
            $data['likesNftBid']=[];
            }
          }
          else
          {
          
            $jsonNft=(json_decode($data['user']->likesNft));
           if($jsonNft!=null || $jsonNft!=[])
           {
            $arrayNft="";
            foreach ($jsonNft as $key => $value) {
              $arrayNft.="'".$value."',";
            }
            
            $arrayNft=substr($arrayNft, 0, -1);
            $data['likesNft']=DB::select('select * from createNft inner join users on users.userId=createNft.ownerId where createNft.sellStatus!=-1 and nftId IN ('.$arrayNft.')');
           }
           else
           {
            $data['likesNft']=[];
           }

          }

        if(Auth::check() && Auth::user()->userId==$userId)
        {
          return redirect()->to('my');
        }
        else
        {
          return view('content/contentProfile',$data);
        }

      }
      else
      {
        return view('content/userNotFound');
      }
    
    }

    public function likeNft(Request $request)
    {
      $like=nftModel::where('nftId',$request->nftId)->first('likes');
      $likeArray=json_decode($like->likes);

      //like
      if($request->stat==1)
      {
        if(Auth::user()->likesNft!=null)
        { 
        $userNftLike=json_decode(Auth::user()->likesNft);
        array_push($userNftLike,$request->nftId);
        userModel::where('userId',Auth::user()->userId)->update([
          'likesNft'=>json_encode($userNftLike)
        ]);
        }
        else
        {
          $userNftLike=[];
          array_push($userNftLike,$request->nftId);
          userModel::where('userId',Auth::user()->userId)->update([
            'likesNft'=>json_encode($userNftLike)
          ]);
        }
        
        if($like!=null)
        {
          array_push($likeArray,Auth::user()->userId);
           nftModel::where('nftId',$request->nftId)->update([
         'likes'=>json_encode($likeArray)
          ]);
          $data['alert']="like";
        }
      }
      //unlike
      else if($request->stat==0)
      {

        if(Auth::user()->likesNft!=null)
        { 
          $userNftLike=json_decode(Auth::user()->likesNft);
          $index=array_search($request->nftId,$userNftLike);
          array_splice($userNftLike,$index,1);

          userModel::where('userId',Auth::user()->userId)->update([
            'likesNft'=>json_encode($userNftLike)
          ]);
        }

        $index=array_search(Auth::user()->userId,$likeArray);
        array_splice($likeArray,$index,1);
             nftModel::where('nftId',$request->nftId)->update([
            'likes'=>json_encode($likeArray)
             ]);
          $data['alert']="unlike";

      }
    }


    public function explore(Request $request)
    {

     if($request->search=='media')
     {

      $data['explore']=DB::select("select * from createNft where sellStatus=1 and dataType='video' or dataType='audio' order by rand()");
      $data['search']=$request->search;
      $exploreBid="";
      foreach ($data['explore'] as $key => $nft) {
       $exploreBid.="'".$nft->nftId."',";

      }
      if($exploreBid!="")
      {
        $exploreBid[-1]=" ";
        $data['exploreBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$exploreBid.')  order by bidNft.bid desc');
      }
      else
      $data['exploreBid']=[];

 
      if(!Auth::check())
      $data['likesNft']=[];
      

     }
     else if($request->search=='newest')
     {

      $data['explore']=DB::select("select * from createNft where sellStatus=1 order by created_at desc");
      $data['search']=$request->search;

      $exploreBid="";
      foreach ($data['explore'] as $key => $nft) {
       $exploreBid.="'".$nft->nftId."',";

      }
      if($exploreBid!="")
      {
        $exploreBid[-1]=" ";
        $data['exploreBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$exploreBid.')  order by bidNft.bid desc');
      }
      else
      $data['exploreBid']=[];
      

      if(!Auth::check())
      $data['likesNft']=[];

     }
     else if($request->search!=null)
     {
      $w="select * from createNft WHERE Match(name,discription,property) against('".$request->search."*' IN BOOLEAN MODE) order by created_at desc";
      $data['explore']=DB::select($w);
      $data['search']=$request->search;


      $exploreBid="";
      foreach ($data['explore'] as $key => $nft) {
       $exploreBid.="'".$nft->nftId."',";

      }
      if($exploreBid!="")
      {
        $exploreBid[-1]=" ";
        $data['exploreBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$exploreBid.')  order by bidNft.bid desc');
      }
      else
      $data['exploreBid']=[];



      if(!Auth::check())
      $data['likesNft']=[];

     }
     else
     {
      $data['explore']=DB::select("select * from createNft where sellStatus=1 order by rand()");

      $exploreBid="";
      foreach ($data['explore'] as $key => $nft) {
       $exploreBid.="'".$nft->nftId."',";

      }
      if($exploreBid!="")
      {
        $exploreBid[-1]=" ";
        $data['exploreBid']=DB::select('select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
        bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null and bidNft.nftId IN ('.$exploreBid.')  order by bidNft.bid desc');
      }
      else
      $data['exploreBid']=[];

      if(!Auth::check())
      $data['likesNft']=[];
       }
   
      
      return view('content/explore',$data);
    }

    public function exploreFilter(Request $request)
    {
     

    if($request->max!=null)
    $max=$request->max;
    if($request->min!=null)
    $min=$request->min;



   $query='select *,JSON_LENGTH(likes) as likeCount from createNft where amount between '.$min.' and '.$max;

   $bidQuery='select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
   bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId  order by bidNft.bid desc';
 


    if($request->category!=null)
    $query.=' and category="'.$request->category.'"';
     
    if($request->dataType!=null)
    $query.=' and dataType="'.$request->dataType.'"';

    if($request->saleType!=null && $request->saleType=='1')
    {
      $query.=' and sellStatus="'.$request->saleType.'"';
      $bidQuery.=' is null';
    }
    else if($request->saleType!=null && $request->saleType=='2')
    {
      $query.=' and sellStatus=1 and instantsale=1';
      $bidQuery.=' is null';
    }
    else if($request->saleType!=null && $request->saleType=='3')
    {
      $query.=' and sellStatus=0';
      $bidQuery.=' is not null';
    }
    else
    {
      $query.=' and sellStatus=1';
      $bidQuery.=' is null';
    }


    if($request->like!=null && $request->like=="desc" )
     $query.='  order by likeCount desc';
    else if($request->like!=null && $request->like=="asc")
     $query.=' order by likeCount asc';
    else
     $query.=' order by rand()';


    $data['explore']=DB::select($query);
    $data['exploreBid']=DB::select($bidQuery);
    $data['oldRequest']=$request->all();
    $data['oldRequestData']=array($min,$max);
    $data['button']=1;



    // $data['exploreBid']=DB::select("select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
    // bidNft.bid from users inner join bidNft on users.userId=bidNft.bidAccount and bidNft.sellId is null");
    // return redirect()->to('explore')->withInput()->with($data);
    return view('content/explore',$data);
 
    //  SELECT  *,JSON_LENGTH(likes) as likeCount FROM createNft  order by likeCount desc;

    //  SELECT  *,JSON_LENGTH(likes) as likeCount FROM createNft  order by likeCount asc;
     

  }

  public function deleteNft(Request $request)
  {
    
    nftModel::where('nftId',$request->nftId)->update([
      'sellStatus'=>-1
    ]);

    return response()->json($request->all());

  }

  public function accept(Request $request)
  {
    //refused
     if($request->stat==0)
     {
      
     DB::table('bidNft')->where('nftId',$request->nftId)->where('bidAccount',$request->userId)->update([
       'status'=>3,
       'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
     ]);

     $data['stat']="true";
     
     $user=userModel::where('userId',$request->userId)->first();

     if($user->orderNotification==1)
     {
      $array['email'] = $user->email;
      $array['nftId'] = $request->nftId;
      $array['text']="Offer refused.";

      Mail::send('company/mail',$array,function($message) use ($array){
              $message->subject('Nuron NFT');
              $message->to($array['email']);
       });
       //mail gonder reddedildi;
     }
   

     }
     //accept
     else if($request->stat==1)
     {
     
     $user=userModel::where('userId',$request->userId)->first();

     $bid=DB::table('bidNft')->where('bidAccount',$request->userId)->where('nftId',$request->nftId)->where('sellId',null)->get()[0];
     $nft=nftModel::where('nftId',$request->nftId)->first();

     
     if($user->balance>=($bid->bid+($bid->bid*(2.5/100))))
     {

      $time=Carbon::now();
  


        $rndStr=Str::random(30);
        $hashId=$time->timestamp.$rndStr;
        $sellId=sha1($hashId);


        DB::table('sellNft')->insert([
          'sellId'=>$sellId,
          'nftId'=>$request->nftId,
          'fromAccount'=>$nft->ownerId,
          'toAccount'=>$user->userId,
          'created_at'=>$time,
        ]);
        

        //reddedilen
        DB::table('bidNft')->where('nftId',$request->nftId)->where('sellId',null)->update([
          'status'=>3,
          'updated_at'=>$time,
          'sellId'=>$sellId
        ]);

        //satılan
        DB::table('bidNft')->where('bidAccount',$user->userId)->where('nftId',$request->nftId)->where('sellId',$sellId)->update([
          'status'=>2,
          'updated_at'=>$time,
        ]);


        //royality 
        $royality=($nft->royality/100);
        $royalityUpdate=((double)$bid->bid)*((double)$royality);
        $balanceUpdate=((double)$bid->bid)-((double)$royalityUpdate);
        // $serviceFee=($nft->amount*(2.5/100));
        $serviceFee=($bid->bid*(2.5/100));
        $balanceUpdate=((double)$balanceUpdate)-((double)$serviceFee);


       if(((double)$nft->royality)>0)
       {

        $createrUser=userModel::where('userId',$nft->createrId)->first('balance');
        $royalityUpdate=((double)$createrUser->balance+(double)$royalityUpdate);
        //creater update
        userModel::where('userId',$nft->createrId)->update([
          'balance'=>$royalityUpdate
        ]);

   
       }
        
       //owner update
        $ownerUser=userModel::where('userId',$nft->ownerId)->first('balance');
        $balanceUpdate=((double)$ownerUser->balance+(double)$balanceUpdate);

        userModel::where('userId',$nft->ownerId)->update([
          'balance'=>$balanceUpdate
        ]);
         
        //bidder
        $balance=((double)$user->balance)-((double)$bid->bid);
         userModel::where('userId',$user->userId)->update([
           'balance'=>$balance
         ]);


        //satıs sonrası nft tablosu guncelle
        nftModel::where('nftId',$request->nftId)->update([
          'ownerId'=>$user->userId,
          'sellStatus'=>0,
          'instantSale'=>0
        ]);


        $user=userModel::where('userId',$request->userId)->first();

        if($user->orderNotification==1)
        {
          //mail gonder kabul;
          $array['email'] = $user->email;
          $array['nftId'] = $request->nftId;
          $array['text']="Offer accepted.";
  
          Mail::send('company/mail',$array,function($message) use ($array){
                  $message->subject('Nuron NFT');
                  $message->to($array['email']);
           });
        }


         $data['stat']="true";
     }


     else
     {

      DB::table('bidNft')->where('nftId',$request->nftId)->where('bidAccount',$request->userId)->update([
        'status'=>3,
        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
      ]);
      $data['stat']="insufficient fund";

      $user=userModel::where('userId',$request->userId)->first();

      if($user->orderNotification==1)
      {
        //mail gonder red para yetersiz;

        $array['email'] = $user->email;
        $array['nftId'] = $request->nftId;
        $array['text']="Insufficient fund. Offer refused!";

        Mail::send('company/mail',$array,function($message) use ($array){
                $message->subject('Nuron NFT');
                $message->to($array['email']);
         });

      }

      
     }


     }
    return response()->json($data);
  }

  public function searchUser(Request $request)
  {

    $search="select pp,userId,gender,first_name,last_name from users  WHERE Match(first_name,last_name) against('".$request->search."*' IN BOOLEAN MODE) order by created_at desc";


    $data['users']=DB::select($search);

      return response()->json($data);

  }

}
