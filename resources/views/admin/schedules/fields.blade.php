<div class="row mb-3">
    <div class="col-6">
        <label for="title" class="form-label required">映画タイトル</label>
        <input type="text" name="title" class="form-control" value="{{ $movie->title }}" disabled>
        <input type="text" name="movie_id" value="{{ $movie->id }}" hidden />
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="start_time" class="form-label required">開始日時</label>
        <input type="date" name="start_time_date" class="form-control {{ $errors->first('start_time_date') ? 'is-invalid' : '' }}" value="{{ $schedule?->start_time }}">
        <div class="invalid-feedback">{{ $errors->first('start_time_date') }}</div>
        <input type="time" name="start_time_time" class="form-control {{ $errors->first('start_time_time') ? 'is-invalid' : '' }}" value="{{ $schedule?->start_time }}">
        <div class="invalid-feedback">{{ $errors->first('start_time_time') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="end_time" class="form-label required">終了日時</label>
        <input type="date" name="end_time_date" class="form-control {{ $errors->first('end_time_date') ? 'is-invalid' : '' }}" value="{{ $schedule?->end_time }}">
        <div class="invalid-feedback">{{ $errors->first('end_time_date') }}</div>
        <input type="time" name="end_time_time" class="form-control {{ $errors->first('end_time_time') ? 'is-invalid' : '' }}" value="{{ $schedule?->end_time }}">
        <div class="invalid-feedback">{{ $errors->first('end_time_time') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <a href="{{ route('admin.movies.show', $movie->id) }}" class="btn btn-secondary">キャンセル</a>
        <button class="btn btn-primary" type="submit">保存</button>
    </div>
</div>
