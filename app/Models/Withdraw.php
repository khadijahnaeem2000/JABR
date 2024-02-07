<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
     protected $fillable=[
          'id',
          'UserId',
            'BankTitle',
              'depositepurpose',
                'WithdrawAmount',
    ];
      public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
          public function purpose()
    {
        return $this->belongsTo(DepositePurpose::class, 'depositepurpose');
    }
}
