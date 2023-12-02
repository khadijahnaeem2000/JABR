<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInforamtion extends Model
{
    use HasFactory;
           public function deposite()
    {
        return $this->belongsTo(DepositePurpose::class, 'DepositePurpose');
    }
    protected $fillable =[
        'BankName',
        'AccountTitle',
        'AccountNumber',
        'DepositePurpose'
    ];
}
