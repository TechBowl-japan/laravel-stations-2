<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $dates = ['start_time','end_time'];

    protected $fillable = [
        'movie_id',
        'start_time',
        'end_time',
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function scopeIsShowing(Builder $query):Builder
    {
        return $query->where('schedules.start_time', '>=', CarbonImmutable::now());
    }
}
