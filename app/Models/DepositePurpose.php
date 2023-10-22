<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositePurpose extends Model
{
    use HasFactory;
    protected $table = "depositepurpose";
      protected $fillable=[
       
        'id',
        'DepositePurpose',
         'IsActive',
     
    ];
}
