<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_url',
        'published_year',
        'is_showing',
        'description'
    ];

    public function Genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function Schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
