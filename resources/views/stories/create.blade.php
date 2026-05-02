<div>
   <h1>物語を投稿する</h1>
    <p>起承転結のストーリーを入力してください。</p>

    <form method="POST" action="{{ route('stories.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" required>

        <div class="form-group">
            <label for="author">作者</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="intro">起</label>
            <input type="text" class="form-control" id="intro" name="intro" required>
        </div>
        <div class="form-group">
            <label for="develop">承</label>
            <input type="text" class="form-control" id="develop" name="develop" required>
        </div>
        <div class="form-group">
            <label for="conversion">転</label>
            <input type="text" class="form-control" id="conversion" name="conversion" required>
        </div>
        <div class="form-group">
            <label for="ending">結</label>
            <input type="text" class="form-control" id="ending" name="ending" required>
        </div>

    <a href="{{ route('home') }}" class="btn btn-primary">トップに戻る</a>
    <button type="submit" class="btn btn-success">投稿する</button>
</div>