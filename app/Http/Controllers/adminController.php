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

class adminController extends Controller
{
    //
    public function index()
    {
      
        if(Auth::guard('admin')->check())
        {

           $data['users']=DB::select("select * from users order by created_at");
           return view('admin/adminIndex',$data);
        }
        else
        return redirect()->to('admin/login');

        
    }

    public function adminLogin()
    {
        if(Auth::guard('admin')->check())
        {

            return redirect()->to('admin/index');
        }
        else
        return view('admin/adminLogin');
        
    }

    public function adminSignOut()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('admin/login');
  
    }

    public function loginRequest(Request $request)
    {
        try {
            $check=(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]));

            if($check)
            {
              $data['users']=DB::select("select * from users");

              return redirect()->to('admin/index',$data);
            }
      
              $errors = ['errors'=>'Incorrect email or password'];
              return redirect()->to('admin/login')->withInput()->withErrors($errors);
              
        }
         catch (\Throwable $th) {
            $errors = ['errors'=>'Incorrect email or password'];
              return redirect()->to('admin/login')->withInput()->withErrors($errors);
        }
    }

    public function userStatus(Request $request)
    {
        
            userModel::where('userId',$request->userId)->update(
                [
               'accountStatus'=>$request->userStat
                ]);
       
    }
    public function adminUser($userId)
    {
        if(Auth::guard('admin')->check())
        {
        $data['user']=userModel::where('userId',$userId)->first();

        if($data['user']==null)
        return view('content/userNotFound');
        else
        return view('admin/adminUser',$data);
        }
        else
        return redirect()->to('admin/login');


    }

    public function adminUpdatePP(Request $request)
    {
        $extention=$request->fatima->getClientOriginalExtension();
        //    $base64 ='data:image/'. $extention. ';base64,'. base64_encode(file_get_contents($request->fatima));
    
        $time=Carbon::now()->timestamp;
        $image=$request->userId.'_'.$time.'.'.$extention;   
        $request->fatima->move(public_path('user/pp/'.$request->userId),$image);
    
           try {
            userModel::where('userId',$request->userId)->update(
                ['pp'=>'user/pp/'.$request->userId.'/'.$image]);
    
                $errors = ['image'=>'true'];
                return redirect()->to('admin/'.$request->userId)->withErrors($errors);
    
           }
            catch (\Throwable $th) {
                $errors = ['image'=>'false'];
                return redirect()->to('admin/'.$request->userId)->withErrors($errors);
           }
    }

    public function adminUpdateCover(Request $request)
    {
        $extention=$request->nipa->getClientOriginalExtension();
        // $base64 ='data:image/'. $extention. ';base64,'. base64_encode(file_get_contents($request->nipa));
    
        $time=Carbon::now()->timestamp;
        $image=$request->userId.'_'.$time.'.'.$extention;   
        $request->nipa->move(public_path('user/cover/'.$request->userId),$image);
    
    
        try {
            userModel::where('userId',$request->userId)->update(
                ['cover'=>'user/cover/'.$request->userId.'/'.$image]);
    
                $errors = ['image'=>'true'];
           return redirect()->to('admin/'.$request->userId)->withErrors($errors);
    
        } 
        catch (\Throwable $th) {
            $errors = ['image'=>'false'];
                 return redirect()->to('admin/'.$request->userId)->withErrors($errors);
        }
    }

    public function adminUpdateInfo(Request $request)
    {
        
        $email=userModel::where('userId',$request->userId)->first('email');


        $dublicateMail= userModel::where('email','!=',$email->email)->where('email',$request->email)->first();
       
        try {
         if($dublicateMail)
         {
             $errors = ['email'=>'The email has already been taken.'];
             return redirect()->to('admin/'.$request->userId)->withErrors($errors);
         }
        
         if($request->password!=null)
         {
         userModel::where('userId',$request->userId)->update([
            'first_name'=>ucfirst(strtolower($request->firstName)),
            'last_name'=>ucfirst(strtolower($request->lastName)),
            'email'=>strtolower($request->email),
            'bio'=>ucfirst($request->bio),
            'password'=>bcrypt($request->password)
        ]);
        }
        else
        {
            userModel::where('userId',$request->userId)->update([
                'first_name'=>ucfirst(strtolower($request->firstName)),
                'last_name'=>ucfirst(strtolower($request->lastName)),
                'email'=>strtolower($request->email),
                'bio'=>ucfirst($request->bio)
            ]);
        }

        $errors = ['info'=>'true'];
        return redirect()->to('admin/'.$request->userId)->withErrors($errors);
        //  return redirect()->to('my');

        }
         catch (\Throwable $th) {

              $errors = ['info'=>'Error.'];
             return redirect()->to('admin/'.$request->userId    )->withErrors($errors);
        }
    }


    public function adminBids()
    {
        if(Auth::guard('admin')->check())
        {
    $data['bids']=DB::select("select * from bidNft inner join createNft on createNft.nftId=bidNft.nftId inner join users on users.userId=bidNft.bidAccount  order by status asc");
     return view('admin/adminBids',$data);
        }
        else
        return redirect()->to('admin/login');

    }
    
    public function adminUserNft($userId)
    {
        if(Auth::guard('admin')->check())
        {
        if($userId=="all")
        {
            $data['userNft']=DB::select('select * from createNft inner join users on createNft.ownerId=users.userId ');
            $data['user']=[];
    
            if($data['userNft']==null)
            return view('content/nftNotFound');
            else
            return view('admin/adminUserNft',$data);
        }
        else
        {
            $data['userNft']=nftModel::where('ownerId',$userId)->get();

            $data['user']=userModel::where('userId',$userId)->first();
    
            if($data['userNft']==null)
            return view('content/nftNotFound');
            else
            return view('admin/adminUserNft',$data);
        }
    }
    else
    return redirect()->to('admin/login');
    
     

    }

    public function adminNftUpdatePage($nftId)
    {
        if(Auth::guard('admin')->check())
        {
        $data['nft']=nftModel::where('nftId',$nftId)->first();

        if($data['nft']==null)
        return view('content/nftNotFound');
        else
        {
            $response=file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH&tsyms=USD,EUR&api_key=6ed4c357ff81c34c0f9ced496018ed56153c7dcfa430a906f51fc405cde7ef42");
            $eth=json_decode($response)->ETH->USD;
    
            $ethDollar=($eth*$data['nft']->amount);
    
            $index= strpos($eth,".");
            $index2= strpos( $ethDollar, ".");
    
            $data['eth']=substr($eth,0,$index+4);
            $data['ethDollar']=substr($ethDollar,0,$index2+4);
            $data['serviceFee']=(2.5/100);
        return view('admin/adminNftUpdate',$data);

        }
    }
    else
    return redirect()->to('admin/login');



    }

    public function adminDeleteNft(Request $request)
    {
      
      nftModel::where('nftId',$request->nftId)->update([
        'sellStatus'=>-1
      ]);
  
      return response()->json($request->all());
  
    }

    public function adminRecoverNft(Request $request)
    {
        nftModel::where('nftId',$request->nftId)->update([
            'sellStatus'=>0
          ]);
      
          return response()->json($request->all());
    }

    public function adminUpdateNft(Request $request)
    {
      
      nftModel::where('nftId',$request->nftId)->update([
        'sellStatus'=>-1
      ]);
  
      return response()->json($request->all());
  
    }


    public function adminNftUpdate(Request $request,$nftId)
    {

        nftModel::where('nftId',$nftId)->update([
            'name'=>$request->productName,
            'discription'=>$request->discription,
            'amount'=>$request->price,
            'size'=>$request->size,
            'royality'=>$request->royality,
            'property'=>$request->property,
            'category'=>$request->category,
          ]);

          return redirect()->to('admin/nftUpdate/'.$nftId);

    }
}
