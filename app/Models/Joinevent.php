<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joinevent extends Model
{
    protected $fillable = [
        'event_id', 'user_id', 'status',
    ];

    public function event(){
        return $this->belongsTo(event::class, 'event_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
