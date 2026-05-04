@extends('layouts.app')

@section('content')
<div class="page-card" style="text-align:center;padding:2.5rem;">
    <div style="font-size:60px;margin-bottom:16px;">📖</div>
    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:26px;color:#27500A;margin-bottom:12px;">
        ぼくの・わたしの<br>ものがたり
    </div>
    <div style="font-size:15px;color:#639922;margin-bottom:8px;">
        きみだけのオリジナルのものがたりをつくろう！
    </div>
    <div style="font-size:14px;color:#97C459;margin-bottom:32px;">
        すきなキャラクターをいれると、ふしぎなものがたりができるよ✨
    </div>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <a href="{{ route('stories.create') }}" class="btn-primary">ものがたりをつくる🌟</a>
        <a href="{{ route('stories.index') }}" class="btn-secondary">みんなのをみる📖</a>
    </div>
</div>
@endsection