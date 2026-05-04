<form method="POST" action="{{ route('stories.store') }}">
    @csrf

    <p>どんなものがたりにする？</p>
    <select name="genre_id">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <p>しゅじんこうのなまえ</p>
    <input type="text" name="hero">

    <p>おともだちのなまえ</p>
    <input type="text" name="friend">

    <p>てきのなまえ</p>
    <input type="text" name="enemy">

    <p>アイテム</p>
    <input type="text" name="key_item">

    <button type="submit">ぼうけんのたびにしゅっぱつ！</button>
</form>