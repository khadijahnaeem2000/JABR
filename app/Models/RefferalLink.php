<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefferalLink extends Model
{
    use HasFactory;
         public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
    protected $fillable = [
      'id',
      'UserId',
        'RefferalId',
          'RefferalCode',
            'JoinDate',
              'Status',
    ];
}
