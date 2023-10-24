<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UploadTask extends Model
{
    use HasFactory;
          public function task()
    {
        return $this->belongsTo(Task::class, 'TaskId');
    }
            public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
    protected $fillable = [
        'id',
          'TaskId',
             'UserId',
              'Image',
               'Status',
    ];
}
