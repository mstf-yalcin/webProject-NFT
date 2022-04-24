<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellModel extends Model
{
    use HasFactory;
    protected $table="bidNft";
    protected $primaryKey="bidId";
    protected $keyType = 'string';
    protected $guarded = []; 
}
