<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NGO extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'founded_date',
        'mission',
        'website',
        'category'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
