<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHasMedia extends Model
{
    use HasFactory;

    protected $fillable = ['media_type', 'media_path_name', 'post_id'];

    public function post()
    {
        return $this->belongsTo(NgoHasPost::class,'post_id');
    }
}
