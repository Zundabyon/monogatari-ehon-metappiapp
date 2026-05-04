<div>
    <h1>シャッフル結果</h1>

    <div>
        <h2>起</h2>
        <p>{{ $intro->intro }}</p>
    </div>

    <div>
        <h2>承</h2>
        <p>{{ $develop->develop }}</p>
    </div>

    <div>
        <h2>転</h2>
        <p>{{ $conversion->conversion }}</p>
    </div>

    <div>
        <h2>結</h2>
        <p>{{ $ending->ending }}</p>
    </div>
    <h1>めでたし、めでたし</h1>
    <a href="{{ route('stories.shuffle') }}">もう一度シャッフル</a>
    <a href="{{ route('home') }}" class="btn btn-primary">トップに戻る</a>
</div>