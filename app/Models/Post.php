<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['description','type','impressions','user_id'];

public function medias(){
    return $this->hasMany(PostMedia::class);
}

public function likes(){
    return $this->hasMany(Like::class);
}

public function comments(){
    return $this->hasMany(Comments::class)->whereNull('parent_id');
}

public function user(){
    return $this->belongsTo(User::class);
}

// user function may also be needed to directly access the user related data such as name, phone, address, etc.
}
