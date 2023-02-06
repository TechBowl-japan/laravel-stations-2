<div class="row mb-3">
    <div class="col-6">
        <label for="title" class="form-label required">映画タイトル</label>
        <input type="text" name="title" class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}" value={{ old('title', $movie?->title) }}>
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="genre" class="form-label required">ジャンル</label>
        <input type="text" name="genre" class="form-control {{ $errors->first('genre') ? 'is-invalid' : '' }}" value="{{ old('genre', $movie?->genre->name) }}">
        <div class="invalid-feedback">{{ $errors->first('genre') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="published_year" class="form-label required">公開年</label>
        <input type="number" name="published_year" class="form-control {{ $errors->first('published_year') ? 'is-invalid' : '' }}" min="1900" value="{{ old('published_year', $movie?->published_year) }}">
        <div class="invalid-feedback">{{ $errors->first('published_year') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="is_showing" class="form-label required">上映中か</label>
        <select name="is_showing" id="is_showing" class="form-control {{ $errors->first('is_showing') ? 'is-invalid': '' }}" aria-placeholder="選択してください">
          @foreach (['上映予定', '上映中'] as $value => $label)
          <option value="{{ $value }}" {{ old('is_showing', $movie?->is_showing) === (string)$value ? 'selected' : '' }}>{{ $label }}</option>
          @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('is_showing') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="description" class="form-label required">概要</label>
        <textarea
          name="description"
          class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
          rows="3"
        >{{ old('description', $movie?->description) }}</textarea>
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="image_url" class="form-label required">画像URL</label>
        <input type="text" name="image_url" class="form-control {{ $errors->first('image_url') ? 'is-invalid' : '' }}" value="{{ old('image_url', $movie?->image_url) }}"}>
        <div class="invalid-feedback">{{ $errors->first('image_url') }}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <a href="#" class="btn btn-secondary">キャンセル</a>
        <button class="btn btn-primary" type="submit">保存</button>
    </div>
</div>
