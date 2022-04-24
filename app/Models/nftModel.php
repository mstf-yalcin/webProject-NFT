<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nftModel extends Model
{
    use HasFactory;
    protected $table="createNft";
    protected $primaryKey="nftId";
    protected $keyType = 'string';
    protected $guarded = []; 
}
