<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyImage extends Model
{

    use HasFactory;

    protected $fillable = [
        'journey_id',
        'image_url',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
