<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SheetController extends Controller
{
    public function index(): View
    {
        $sheets = Sheet::all();
        return view('sheets.index')->with(compact('sheets'));
    }

    public function reserve(int $movieId, int $scheduleId, Request $request): View
    {
        $date = $request->query('date') ?? null;
        if (is_null($date)) {
            abort(400);
        }
        $sheets = Sheet::withReservationId($scheduleId)
            ->select('sheets.*', 'reservations.id as reservation_id')
            ->get();
        return view('sheets.reserve')->with(compact('sheets', 'date', 'movieId', 'scheduleId'));
    }
}
