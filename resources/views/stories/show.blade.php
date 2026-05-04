<div>
    <h1>{{ $story->hero }}のものがたり</h1>

    <p>はじまり：{{ $result['intro'] }}</p>
    <p>つぎに：{{ $result['develop'] }}</p>
    <p>そして：{{ $result['conversion'] }}</p>
    <p>おわり：{{ $result['ending'] }}</p>

    <a href="{{ route('stories.create') }}">もういちどつくる</a>
    <a href="{{ route('stories.index') }}">みんなのをみる</a>
</div>