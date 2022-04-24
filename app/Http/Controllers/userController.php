<?php

namespace App\Http\Controllers;

use App\Models\nftModel;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use App\Models\userModel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    //

    public function login()
    {
        Session::put('url',url()->previous());

        
     return view('user/login');
    }

    public function forget()
    {
     return view('user/forgetPassword');
    }

    public function editProfile()
    { 
     return view('user/editProfile');
    }

    public function profile()
    {
     
     if(Auth::check())
     {

    $userId=Auth::user()->userId;


       
    $data['ownerNft']=DB::select("select * from createNft inner join users on users.userId=createNft.ownerId where createNft.sellStatus!=-1 and createNft.ownerId='".$userId."' order by createNft.updated_at desc");
    
   
     $data['ownerNftBid']=DB::select("select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
     bidNft.bid
      from users inner join bidNft on users.userId=bidNft.bidAccount
      where bidNft.sellId is null and userId in (select bidAccount from bidNft where  nftId in 
      (select nftId from createNft  where createNft.ownerId='".$userId."')) order by bidNft.bid desc, bidNft.created_at ");

     
    $data['createNft']=DB::select("select * from createNft inner join users on users.userId=createNft.createrId where createNft.sellStatus!=-1 and createNft.createrId='".$userId."' order by createNft.updated_at desc");

    
    $data['createNftBid']=DB::select("select users.first_name,users.last_name,users.gender,users.pp,users.userId,bidNft.nftId,
    bidNft.bid
     from users inner join bidNft on users.userId=bidNft.bidAccount
     where bidNft.sellId is null and userId in (select bidAccount from bidNft where  nftId in 
     (select nftId from createNft  where createNft.createrId='".$userId."')) order by bidNft.bid desc, bidNft.created_at ");

    $data['onSaleNft']=DB::select("select * from createNft inner join users on users.userId=createNft.ownerId where sellStatus=1 and createNft.createrId='".$userId."' order by createNft.updated_at desc");


    $data['bids']=DB::select("select * from bidNft inner join createNft on createNft.nftId=bidNft.nftId where bidNft.bidAccount=? order by status asc",[Auth::user()->userId]);


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
       }
       else
       {
        $data['likesNft']=[];
       }

     return view('user/profile',$data);
    }   
    else
    {
        return redirect()->to('login');
    }

    }

    public function loginRequest(Request $request)
    {
  

        try {
            $check=(Auth::attempt(['email'=>$request->email,'password'=>$request->password]));
            
       
            if($check && Auth::user()->accountStatus==1 )
            {
               $url=Session::get('url');
              return redirect()->to($url);
            }
            else if(Auth::user()->accountStatus!=1)
            {
                Auth::logout();
                $errors = ['errors'=>'This account has been suspended'];
                return redirect()->to('login')->withInput()->withErrors($errors);
            }

      
              $errors = ['errors'=>'Incorrect email or password'];
              return redirect()->to('login')->withInput()->withErrors($errors);
              
        }
         catch (\Throwable $th) {
            $errors = ['errors'=>'Incorrect email or password'];
              return redirect()->to('login')->withInput()->withErrors($errors);
        }
  

    }
    
    public function signOut()
    {

        Auth::logout();
        return redirect()->to('');
    }
  
    public function signUp()
    {
     return view('user/sign-up');
    }
    
    public function updateInfo(Request $request)
    {
       $dublicateMail= userModel::where('email','!=',Auth::user()->email)->where('email',$request->email)->first();
       
        try {
         if($dublicateMail)
         {
             $errors = ['email'=>'The email has already been taken.'];
             return redirect()->to('edit-profile')->withErrors($errors);
         }

         userModel::where('userId',Auth::user()->userId)->update([
            'first_name'=>ucfirst(strtolower($request->firstName)),
            'last_name'=>ucfirst(strtolower($request->lastName)),
            'email'=>strtolower($request->email),
            'bio'=>ucfirst($request->bio)
        ]);

        $errors = ['info'=>'true'];
        return redirect()->to('edit-profile')->withErrors($errors);

        }
         catch (\Throwable $th) {

              $errors = ['info'=>'Error.'];
             return redirect()->to('edit-profile')->withErrors($errors);
        }
    }
     
   public function updatePp(Request $request)
   {
       $extention=$request->fatima->getClientOriginalExtension();
    //    $base64 ='data:image/'. $extention. ';base64,'. base64_encode(file_get_contents($request->fatima));

    $time=Carbon::now()->timestamp;
    $image=Auth::user()->userId.'_'.$time.'.'.$extention;   
    $request->fatima->move(public_path('user/pp/'.Auth::user()->userId),$image);

       try {
        userModel::where('userId',Auth::user()->userId)->update(
            ['pp'=>'user/pp/'.Auth::user()->userId.'/'.$image]);

            $errors = ['image'=>'true'];
            return redirect()->to('edit-profile')->withErrors($errors);

       }
        catch (\Throwable $th) {
            $errors = ['image'=>'false'];
            return redirect()->to('edit-profile')->withErrors($errors);
       }
   
   }

   public function updateCover(Request $request)
   {
    $extention=$request->nipa->getClientOriginalExtension();
    // $base64 ='data:image/'. $extention. ';base64,'. base64_encode(file_get_contents($request->nipa));

    $time=Carbon::now()->timestamp;
    $image=Auth::user()->userId.'_'.$time.'.'.$extention;   
    $request->nipa->move(public_path('user/cover/'.Auth::user()->userId),$image);


    try {
        userModel::where('userId',Auth::user()->userId)->update(
            ['cover'=>'user/cover/'.Auth::user()->userId.'/'.$image]);

            $errors = ['image'=>'true'];
       return redirect()->to('edit-profile')->withErrors($errors);

    } 
    catch (\Throwable $th) {
        $errors = ['image'=>'false'];
             return redirect()->to('edit-profile')->withErrors($errors);
    }


   }

    public function updatePw(Request $request)
    {

        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            $password=1;
        }
        else{
            $password=0;
        }

        if ($request->password==$request->oldPassword) {
            $samePassword=1;
        }
        else{
            $samePassword=0;
        }
           
        // $dublicateMail=userModel::where('email',$request->email)->first();
         $dublicateMail=null;
         if($request->email==Auth::user()->email)
             $dublicateMail=1;
 
        try {
            if($dublicateMail==null && $password==0)
            {
                $errors = ['error'=>'Incorrect email.'];
                return redirect()->to('edit-profile')->withErrors($errors);
            }
            else if($dublicateMail==null)
            {
                $errors = ['error'=>'Incorrect password.'];
                return redirect()->to('edit-profile')->withErrors($errors);
            }
            else if($password==0)
            {
                $errors = ['error'=>'Incorrect password.'];
                return redirect()->to('edit-profile')->withErrors($errors);
            }
            else if($samePassword==1)
            {
                $errors = ['samePass'=> 'Your new password must be different.'];
                return redirect()->to('edit-profile')->withErrors($errors);
            }
            else
            {
                userModel::where('userId',Auth::user()->userId)->update([
                    'password'=>bcrypt($request->password)
                ]);
                $errors = ['password'=>'true'];
                return redirect()->to('edit-profile')->withErrors($errors);
                // return redirect()->to('my');
            }
          
        }
         catch (\Throwable $th) {
            $errors = ['password'=>'Error.'];
                return redirect()->to('edit-profile')->withErrors($errors);
        }

    }
    public function signRequest(Request $request)
    {
        $rndStr=Str::random(30);
        $hashId=Carbon::now()->timestamp.$rndStr;

   
        $validator=Validator::make($request->all(),[
            'email' => 'email|unique:users|max:255',]);

        try {
            if($validator->fails())
            {
                return redirect()->to('sign-up')->withInput()->withErrors($validator);
            }
            $userId='0x'.sha1($hashId);
                userModel::create([
                    'userId'=>$userId,
                    'first_name'=>ucfirst(strtolower($request->firstName)),
                    'last_name'=>ucfirst(strtolower($request->lastName)),
                    'email'=>strtolower($request->email),
                    'password'=>bcrypt($request->password),
                    'balance'=>rand(0,100),
                    'accountStatus'=>1,
                    'gender'=>$request->gender,
                    'bio'=>"Hello, I'm ".ucfirst(strtolower($request->firstName)).'...',
                    'orderNotification'=>1,
                    'itemsUpdate'=>1,
                    'newBid'=>1
                    ]);

                    DB::table('bank')->insert([
                    'userId'=>$userId,
                    'balance'=>200.06,
                    'coinType'=>1,//ETH 
                    ]);
                    
                    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
                    {
                        // $bank= DB::table('bank')->where('userId',Auth::user()->userId)->first();
                        //   Session::put('balance',$bank->balance);

                          return redirect()->to('');
                    }
        }
         catch (\Throwable $th) {
            return redirect()->to('sign-up');
        }
            
    }

    public function bids(Request $request)
    {

        if(Auth::check())
        {
            if($request->nft!=null)
            {

                $data['bids']=DB::select('select distinct users.first_name,users.last_name,users.pp,users.userId,users.balance,users.gender, bidNft.*,createNft.* from bidNft inner join users on users.userId=bidNft.bidAccount
                inner join createNft on createNft.nftId="'.$request->nft.'" where createNft.sellStatus=1 and bidNft.status=1 and
                bidNft.nftId in (select nftId from createNft where ownerId="'.Auth::user()->userId.'") order by bidNft.bid desc, bidNft.created_at');
                
            }
            else
            {
                $data['bids']=DB::select('select users.first_name,users.last_name,users.pp,users.userId,users.balance,users.gender, bidNft.*,createNft.* from bidNft inner join users on users.userId=bidNft.bidAccount
                inner join createNft on createNft.nftId=bidNft.nftId where createNft.sellStatus=1 and bidNft.status=1 and
                bidNft.nftId in (select nftId from createNft where ownerId="'.Auth::user()->userId.'") order by bidNft.bid desc, bidNft.created_at');
            }

           
            return view('user/bids',$data);
        }
        else
        return redirect()->to('login');
    }


    public function updateNotification(Request $request)
    {
        if($request->notification=="items")
        {
            userModel::where('userId',Auth::user()->userId)->update(
                [
               'itemsUpdate'=>$request->stat
                ]);
        }
        else if($request->notification=="newBid")
        {
            userModel::where('userId',Auth::user()->userId)->update(
                [
               'newBid'=>$request->stat
                ]);
        }
         
        else if($request->notification=="order")
        {
            userModel::where('userId',Auth::user()->userId)->update(
                [
               'orderNotification'=>$request->stat
                ]);
        }

    }


    public function mailSend()
    {
        $array['email'] = 'rodelox856@3dinews.com';
        $array['name'] = Session::get('name');
        $array['text']="Proje öneriniz güncellenmiştir.";

        Mail::send('company/mail',$array,function($message) use ($array){
                $message->subject('Test');
                $message->to($array['email']);
         });
    }

    public function forgetSend(Request $request)
    {

        $password = (Str::random(8));

 
        $user=userModel::where('email',$request->email)->first();
        
        userModel::where('email',$request->email)->update([
        'password'=>bcrypt($password)
        ]);

        $array['email'] = $request->email;
        $array['name'] =  $user->first_name.' '.$user->last_name;
        $array['password'] = $password;
        $array['text']="A request has been received to change the password for your Nuron account.";
        $array['alertText']="If you did not initiate this request, please contact us immediately at suppor@nuron.com.";

      
        // if($user!=null)
        Mail::send('company/forgetMail',$array,function($message) use ($array){
                $message->subject('Nuron NFT - Password Reset');
                $message->to($array['email']);
         });
         $errors = ['success'=>"Thanks! If your Nuron email address match, you'll get an email with a link to reset your password shortly."];
         return redirect()->to('forget-password')->withErrors($errors);
    }

 


}
