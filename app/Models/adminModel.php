<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminModel extends Authenticatable
{
    use HasFactory;
    protected $table="admin";
    protected $primaryKey="id";
    protected $guarded = []; 
}
