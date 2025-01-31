<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      protected $table = "users";
          public function member()
    {
        return $this->belongsTo(Membership::class, 'membership_id');
    }
    protected $fillable = [
           'Name',
            'LastName',
            'PhoneNumber',
                'CNIC',
                'Address',
    'BankAccount',
    'City',
    'Email',
    'password', // Assign plain text password
    'role_Id',
     'IsActive',
     'membership_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
  

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
 
}
