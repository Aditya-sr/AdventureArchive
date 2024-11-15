<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'location',
        'difficulty_level',
        'journey_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function journeyImage()
    {
        return $this->hasMany(JourneyImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
