<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Sheet;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function create(int $movieId, int $scheduleId, Request $request): View
    {
        $date = $request->query('date') ?? null;
        $sheetId = $request->query('sheetId') ?? null;
        $isAlreadyReserved = Sheet::withReservationId($scheduleId)->where('sheet_id', '=', $sheetId)->exists();
        if (is_null($date) || is_null($sheetId) || $isAlreadyReserved) {
            abort(400);
        }
        $movie = Movie::findOrFail($movieId);
        $schedule = Schedule::findOrFail($scheduleId);
        $sheet = Sheet::findOrFail($sheetId);
        return view('reservations.create')->with(compact('movie', 'schedule', 'sheet'));
    }

    public function store(CreateReservationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($this->isDuplicateReservation($data)) {
            $schedule = Schedule::findOrFail($data['schedule_id']);
            $request->session()->flash('error', 'その座席はすでに予約済みです');
            return redirect(route('sheets.reserve', ['movieId' => $schedule->movie->id, 'scheduleId' => $data['schedule_id'], 'date' => $schedule->start_time->format('Y-m-d H:i')]));
        };
        try {
            Reservation::create($data);
        } catch (Exception $e) {
            abort(400); // DBの重複制限にかかった場合
        }
        $request->session()->flash('success', '座席を予約しました');
        return redirect(route('movies.index'));
    }

    private function isDuplicateReservation(array $data): bool
    {
        return Reservation::where('sheet_id', '=', $data['sheet_id'])
            ->where('schedule_id', '=', $data['schedule_id'])
            ->exists();
    }
}
