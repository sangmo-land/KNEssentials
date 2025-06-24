<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/Artist.php
class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name',
        'artist_name',
        'bio',
        'cover_image'
    ];

    // Add a full name accessor
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Relationships remain the same
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function tracks()
    {
        return $this->hasManyThrough(Track::class, Album::class);
    }
}