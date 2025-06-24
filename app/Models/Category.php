<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Add 'image' to the fillable array
    protected $fillable = ['name', 'image','description', 'features'];

    protected $casts = [
        'features' => 'array', // Cast 'features' to an array
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}