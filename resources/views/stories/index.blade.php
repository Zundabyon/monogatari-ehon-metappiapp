<div>
    <h1>みんなのものがたり</h1>

    @foreach($stories as $story)
    <div>
        <h2>{{ $story->hero }}のものがたり</h2>
        <p>ジャンル：{{ $story->genre->name }}</p>
        <p>なかま：{{ $story->friend }}</p>
        <p>てき：{{ $story->enemy }}</p>
        <a href="{{ route('stories.show', ['id' => $story->id]) }}">
            くわしくみる
        </a>
    </div>
    @endforeach

    <a href="{{ route('stories.create') }}">あたらしくつくる</a>
    <a href="{{ route('home') }}">トップにもどる</a>
</div>