<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHasComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'parent_id',
        'user_id',
        'post_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(NgoHasPost::class, 'post_id');
    }

    public function parent()
    {
        return $this->belongsTo(PostHasComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(PostHasComment::class, 'parent_id');
    }
}
