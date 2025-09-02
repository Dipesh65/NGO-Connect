<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

     protected $fillable = ['ngo_id','post_id']; // user_id ki ngo_id?

    public function ngo(){
        return $this->belongsTo(NGO::class);
    }

    public function post(){
        return $this->belongsTo(POST::class);
    }
}
