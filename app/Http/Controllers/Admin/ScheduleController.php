<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Movie;
use App\Models\Schedule;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function create(int $movieId): View
    {
        $movie = Movie::findOrFail($movieId);
        return view('admin.schedules.create')->with('movie', $movie);;
    }

    public function store(CreateScheduleRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $data = $this->formatDateForSave($input);

        $startTime = CarbonImmutable::parse($data['start_time']);
        if (CarbonImmutable::parse($data['start_time'])->gte($data['end_time'])) {
            return redirect(route('admin.schedules.create', $data['movie_id']))->withInput()->withErrors([
                'start_time_time' => '終了時刻より前にしてください',
                'end_time_time' => '開始時刻より後にしてください'
            ]);
        }

        if ($startTime->diffInMinutes($data['end_time']) <= 5) {
            return redirect(route('admin.schedules.create', $data['movie_id']))->withInput()->withErrors([
                'start_time_time' => '終了時刻より6分以上前の時刻にしてください',
                'end_time_time' => '開始時刻から6分以上後の時刻にしてください'
            ]);
        }

        Schedule::create($data);
        $request->session()->flash('success', 'スケジュールを保存しました');
        return redirect(route('admin.movies.show', $data['movie_id']));
    }

    public function edit(int $scheduleId): View
    {
        $schedule = Schedule::findOrFail($scheduleId);
        return view('admin.schedules.edit')->with('schedule', $schedule);
    }

    public function update(int $id, UpdateScheduleRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $data = $this->formatDateForSave($input);

        $startTime = CarbonImmutable::parse($data['start_time']);
        if (CarbonImmutable::parse($data['start_time'])->gte($data['end_time'])) {
            return redirect(route('admin.schedules.edit', $data['movie_id']))->withInput()->withErrors([
                'start_time_time' => '終了時刻より前にしてください',
                'end_time_time' => '開始時刻より後にしてください'
            ]);
        }

        if ($startTime->diffInMinutes($data['end_time']) <= 5) {
            return redirect(route('admin.schedules.edit', $data['movie_id']))->withInput()->withErrors([
                'start_time_time' => '終了時刻より6分以上前の時刻にしてください',
                'end_time_time' => '開始時刻から6分以上後の時刻にしてください'
            ]);
        }

        $schedule = Schedule::findOrFail($id);
        $schedule->update($data);
        $request->session()->flash('success', 'スケジュールを更新しました');
        return redirect(route('admin.movies.show', $data['movie_id']));
    }

    public function destroy(int $id, Request $request): RedirectResponse
    {
        $schedule = Schedule::findOrFail($id);
        $movieId = $schedule->movie_id;
        $schedule->delete();
        $request->session()->flash('success', 'スケジュールを削除しました');
        return redirect(route('admin.movies.show', $movieId));
    }

    private function formatDateForSave(array $data): array
    {
        $data['start_time'] = $data['start_time_date'] . ' ' . $data['start_time_time'];
        $data['end_time'] = $data['end_time_date'] . ' ' . $data['end_time_time'];
        return $data;
    }
}
