<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoHasPost extends Model
{
    use HasFactory;

    protected $fillable = ['description','type','impressions','user_id'];

public function medias(){
    return $this->hasMany(PostHasMedia::class,'post_id');
}

public function likes(){
    return $this->hasMany(PostHasLike::class,'post_id');
}

public function comments(){
    return $this->hasMany(PostHasComment::class,'post_id')->whereNull('parent_id');
}

public function user(){
    return $this->belongsTo(User::class,'user_id');
}
}
