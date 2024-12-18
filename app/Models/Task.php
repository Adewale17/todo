<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'day_from',
        'day_to',
        'is_complete'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
