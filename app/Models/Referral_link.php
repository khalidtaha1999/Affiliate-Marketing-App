<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral_link extends Model
{
    use HasFactory;
    protected $fillable=[
      'link','user_id'
    ];

}
