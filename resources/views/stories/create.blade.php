@extends('layouts.app')

@section('content')
<div class="page-card">
    <div class="page-title">どんなものがたりにする？</div>
    <form method="POST" action="{{ route('stories.store') }}">
        @csrf
        <div class="form-row">
            <label class="form-label">おはなしのしゅるい</label>
            <select name="genre_id" class="form-select">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name_ja }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label class="form-label">しゅじんこうのなまえ</label>
            <input type="text" name="hero" class="form-input" placeholder="はちわれ" required>
        </div>
        <div class="form-row">
            <label class="form-label">おともだちのなまえ</label>
            <input type="text" name="friend" class="form-input" placeholder="ちいかわ" required>
        </div>
        <div class="form-row">
            <label class="form-label">てきのなまえ</label>
            <input type="text" name="enemy" class="form-input" placeholder="でかつよ" required>
        </div>
        <div class="form-row">
            <label class="form-label">まほうのアイテム</label>
            <input type="text" name="key_item" class="form-input" placeholder="さすまた" required>
        </div>
        <div style="text-align:center;margin-top:24px;">
            <button type="submit" class="btn-primary">ぼうけんにしゅっぱつ！🌟</button>
        </div>
    </form>
</div>
@endsection