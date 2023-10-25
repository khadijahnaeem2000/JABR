<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;
     public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
    
      public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'WalletId');
    }
       
      public function To()
    {
        return $this->belongsTo(DepositePurpose::class, 'DepositTo');
    }
     protected $fillable=[
          'id',
          'UserId',
            'WalletId',
              'DepositAmount',
               'DepositTo',
                'DepositFrom',
                'Status',
    ];
}
