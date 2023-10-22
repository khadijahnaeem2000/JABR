<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositAmount extends Model
{
    use HasFactory;
        protected $table = "deposit_amounts";
            public function depositPurpose()
    {
        return $this->belongsTo(DepositePurpose::class, 'DepositePurpose');
    }
        protected $fillable=[
       
        'id',
        'DepositePurpose',
        'DepositeAmount',
        'DepositAmountDollar',
        'PaymentReciept',
        'TransactionID',
        'Status',
        'user_Id'
     
    ];
}
