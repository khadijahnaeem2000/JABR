<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
         public function type()
    {
        return $this->belongsTo(MembershipType::class, 'MembershipTypeId');
    }
         public function member()
    {
        return $this->belongsTo(Membership::class, 'MembershipId');
    }
    protected $fillable =[
                     'Description',
                      'Link',
                           'Amount',
                                'Level',
                                     'Commission',
                                          'MembershipTypeId',
                                               'MembershipId',
                                               'Status',
                                               'TaskName'
    ];
}
