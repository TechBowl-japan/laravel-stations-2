<div class="row mb-3">
    <div class="col-6">
        <label for="name" class="form-label required">予約者氏名</label>
        <input type="text" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" value="{{ old('name', $reservation?->name) }}">
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="email" class="form-label required">予約者メールアドレス</label>
        <input type="text" name="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" value="{{ old('email', $reservation?->email) }}">
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="movie_id" class="form-label required">予約映画タイトル</label>
        <select name="movie_id" id="movie_id" class="form-control {{ $errors->first('movie_id') ? 'is-invalid': '' }}" aria-placeholder="選択してください">
          @foreach ($movieList as $id => $title)
            @if ($edit && old('movie_id', $reservation->movie_id) === $id)
              <option value="{{ $id }}" selected>{{ $title }}</option>
            @else
              <option value="{{ $id }}">{{ $title }}</option>
            @endif
          @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('movie_id') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="schedule_id" class="form-label required">予約時間</label>
        <select name="schedule_id" id="schedule_id" class="form-control {{ $errors->first('schedule_id') ? 'is-invalid': '' }}" aria-placeholder="選択してください">
          @foreach ($scheduleList as $id => $start_time)
            <option value="{{ $id }}">{{ $start_time }}</option>
          @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('schedule_id') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="schedule_id" class="form-label required">座席</label>
        <select name="sheet_id" id="sheet_id" class="form-control {{ $errors->first('sheet_id') ? 'is-invalid': '' }}" aria-placeholder="選択してください">
          @foreach ($sheetList as $id => $sheet)
            <option value="{{ $id }}">{{ $sheet }}</option>
          @endforeach
            <option value="1">sheet</option>
        </select>
        <div class="invalid-feedback">{{ $errors->first('sheet_id') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <a href="#" class="btn btn-secondary">キャンセル</a>
        <button class="btn btn-primary" type="submit">保存</button>
    </div>
</div>
