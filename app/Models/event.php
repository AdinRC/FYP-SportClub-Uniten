<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_id',
        'title',
        'description',
        'file_path'
    ];

    // public function user(){
    //     return $this->belongsTo(Club::class, 'club_id');
    // }

    public function club(){
        return $this->belongsTo(Club::class, 'club_id');
    }
    

    protected $guarded = [];
}
