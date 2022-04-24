<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class userModel extends Authenticatable  
{
    use HasFactory;
    protected $table="users";
    protected $primaryKey="userId";
    protected $keyType = 'string';
    protected $guarded = []; 
    // protected $fillable=['userId','firstName','lastName','pp','cover','email','pw','created_at','updated_at','accountStatus','likesNft'];//gerekli
}
