<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\nftController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\companyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[nftController::class,'index'])->name('index');

Route::post('searchUser',[nftController::class,'searchUser'])->name('searchUser');


Route::get('my',[userController::class,'profile'])->name('my');


//kontrol yap

Route::middleware('loginControl')->get('/forget-password',[userController::class,'forget'])->name('forget');

Route::post('/forget-password',[userController::class,'forgetSend'])->name('forgetSend');


Route::middleware('loginControl')->get('login',[userController::class,'login'])->name('login');

Route::post('login',[userController::class,'loginRequest'])->name('loginRequest');

Route::get('edit-profile',[userController::class,'editProfile'])->name('editProfile');
//kontrol yap

Route::post('edit-profile',[userController::class,'updatePw'])->name('updatePw');

Route::post('update-profile',[userController::class,'updateInfo'])->name('updateInfo');

Route::post('update-photo',[userController::class,'updatePp'])->name('updatePp');

Route::post('update-cover',[userController::class,'updateCover'])->name('updateCover');

Route::post('update-notification',[userController::class,'updateNotification'])->name('updateNotification');


Route::post('mail-send',[userController::class,'mailSend'])->name('mailSend');





Route::get('/sign-out',[userController::class,'signOut'])->name('sign-out');


Route::middleware('loginControl')->get('sign-up',[userController::class,'signUp'])->name('sign-up');

Route::post('sign-up',[userController::class,'signRequest'])->name('signRequest');

Route::get('bids',[userController::class,'bids'])->name('bids');


//nft

Route::get('create',[nftController::class,'createPage'])->name('createPage');

Route::post('create',[nftController::class,'createNft'])->name('createNft');


Route::get('create/{id}',[nftController::class,'nftUpdatePage'])->name('nftUpdatePage');

Route::post('create/{id}',[nftController::class,'nftUpdate'])->name('nftUpdate');


Route::get('about',[companyController::class,'about'])->name('about');

Route::get('contact',[companyController::class,'contact'])->name('contact');

Route::get('privacy-policy',[companyController::class,'policy'])->name('policy');

Route::get('support',[companyController::class,'support'])->name('support');

Route::get('term-condition',[companyController::class,'term'])->name('term');

Route::get('connect',[companyController::class,'connect'])->name('connect');

Route::get('maintanance',[companyController::class,'maintanance'])->name('maintanance');

Route::get('coming-soon',[companyController::class,'soon'])->name('soon');


Route::post('accept',[nftController::class,'accept'])->name('accept');




// Route::get('/asset',[nftController::class,'asset']);

Route::get('/nft/{nftId}',[nftController::class,'nftDetail'])->name('nftDetail');

Route::get('/nft',[nftController::class,'nft'])->name('nft');

Route::post('/placeBid',[nftController::class,'placeBid'])->name('placeBid');

Route::post('/likeNft',[nftController::class,'likeNft'])->name('likeNft');

Route::post('/deleteNft',[nftController::class,'deleteNft'])->name('deleteNft');


Route::get('/explore',[nftController::class,'explore'])->name('explore');

Route::post('/explore',[nftController::class,'exploreFilter'])->name('exploreFilter');


Route::get('/{id}',[nftController::class,'userProfile'])->name('userProfile');



// admin


Route::get('admin/index',[adminController::class,'index'])->name('adminIndex');

Route::get('admin/admin-sign-out',[adminController::class,'adminSignOut'])->name('adminSignOut');


Route::get('admin/login',[adminController::class,'adminLogin'])->name('adminLogin');

Route::get('admin/bids',[adminController::class,'adminBids'])->name('adminBids');

Route::post('adminLoginRequest',[adminController::class,'loginRequest'])->name('adminLoginRequest');

Route::post('userStatus',[adminController::class,'userStatus'])->name('userStatus');

Route::get('admin/{userId}',[adminController::class,'adminUser'])->name('adminUser');

Route::get('admin/nft/{userId?}',[adminController::class,'adminUserNft'])->name('adminUserNft');

Route::post('adminDeleteNft',[adminController::class,'adminDeleteNft'])->name('adminDeleteNft');

Route::post('adminRecoverNft',[adminController::class,'adminRecoverNft'])->name('adminRecoverNft');



Route::post('adminUpdatePP',[adminController::class,'adminUpdatePP'])->name('adminUpdatePP');

Route::post('adminUpdateCover',[adminController::class,'adminUpdateCover'])->name('adminUpdateCover');

Route::post('adminUpdateInfo',[adminController::class,'adminUpdateInfo'])->name('adminUpdateInfo');




Route::get('admin/nftUpdate/{nftId}',[adminController::class,'adminNftUpdatePage'])->name('adminNftUpdatePage');

Route::post('adminNftUpdate/{nftId}',[adminController::class,'adminNftUpdate'])->name('adminNftUpdate');


















