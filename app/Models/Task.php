<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends Model
{
      use HasFactory;
     protected $fillable = [
        'task_name',
        'user_id',
        'task_info',
        'priority',
        'done'
    ];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}
