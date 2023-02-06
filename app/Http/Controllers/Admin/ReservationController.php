<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminReservationRequest;
use App\Http\Requests\UpdateAdminReservationRequest;
use App\Models\Schedule;
use App\Models\Sheet;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::isShowing()->get();
        return view('admin.reservations.index')->with('reservations', $reservations);
    }

    public function show(int $id): View
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.show')->with('reservation', $reservation);
    }

    public function create(): View
    {
        $movieList = Movie::isShowing()->pluck('title', 'id');
        $scheduleList = Schedule::isShowing()->pluck('start_time', 'id');
        $sheetList = Sheet::getSheetList();
        return view('admin.reservations.create', compact('movieList', 'scheduleList', 'sheetList'));
    }

    public function store(CreateAdminReservationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['date'] = Schedule::find($data['schedule_id'])->start_time;

        try {
            Reservation::create($data);
        } catch (Exception $e) {
            abort(400); // DBの重複制限にかかった場合
        }
        $request->session()->flash('success', '予約を保存しました');
        return redirect(route('admin.reservations.index'));
    }

    public function edit(int $id): View
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->movie_id = $reservation->schedule->movie_id;
        $movieList = Movie::isShowing()->pluck('title', 'id');
        $scheduleList = Schedule::isShowing()->pluck('start_time', 'id');
        $sheetList = Sheet::getSheetList();
        return view('admin.reservations.edit')->with(compact('reservation', 'movieList', 'scheduleList', 'sheetList'));;
    }

    public function update(int $id, UpdateAdminReservationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $reservation = Reservation::findOrFail($id);
        try {
            $reservation->update($data);
        } catch (Exception $e) {
            abort(400); // DBの重複制限にかかった場合
        }
        $request->session()->flash('success', '予約を更新しました');
        return redirect(route('admin.reservations.index'));
    }

    public function destroy(int $id, Request $request): RedirectResponse
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        $request->session()->flash('success', '予約を削除しました');
        return redirect(route('admin.reservations.index'));
    }
}
