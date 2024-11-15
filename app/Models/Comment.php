<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['journey_id', 'content'];

    public function journey()
    {
        return $this->belongsTo(Journey::class);  // Assuming Journey model has a foreign key 'journey_id' in the 'comments' table. You can adjust this according to your database structure.
    }
    public function user()
    {
        return $this->belongsTo(User::class);  // Assuming User model has a foreign key 'user_id' in the 'comments' table. You can adjust this according to your database structure.
    }
}
