<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    public function scopeWithReservationId(Builder $query, int $scheduleId)
    {
        return $query->leftJoin('reservations', function ($join) use ($scheduleId) {
            $join->on('sheets.id', '=', 'reservations.sheet_id')
                ->where('reservations.schedule_id', '=', $scheduleId);
            });
    }

    public static function getSheetList(): array
    {
        $sheets = self::all();
        $list = [];
        foreach ($sheets as $sheet) {
            $list += [$sheet->id => strtoupper($sheet->row).$sheet->column];
        }
        return $list;
    }
}
