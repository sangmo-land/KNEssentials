<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Track extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'album_id',
        'title',
        'duration',
        'file_path',
        'track_number',
        'youtube_id',
        'genre',
        'release_date',
        'lyrics',
        'plays'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    // Accessor for formatted duration
    public function getFormattedDurationAttribute()
    {
        return gmdate('i:s', $this->duration);
    }
}
