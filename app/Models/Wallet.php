<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
      public function depositpurpose()
    {
        return $this->belongsTo(DepositePurpose::class, 'DepositPurpose');
    }
      public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
    protected $fillable=[
          'id',
          'UserId',
            'DepositPurpose',
              'Amount',
                'Status',
    ];
}
