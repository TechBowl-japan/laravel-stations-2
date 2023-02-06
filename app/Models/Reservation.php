<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'schedule_id',
        'sheet_id',
        'email',
        'name',
        'is_canceled',
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function sheet(): BelongsTo
    {
        return $this->belongsTo(Sheet::class, 'sheet_id');
    }

    public function scopeIsShowing(Builder $query): Builder
    {
        return $query->join('schedules', function ($join) {
            $join->on('schedules.id', '=', 'reservations.schedule_id')
                ->where('schedules.start_time', '>=', CarbonImmutable::now());
            })
            ->select('reservations.*');
    }

    public function getMovieIdAttribute(): int
    {
        return $this->schedule->movie_id;
    }
}
