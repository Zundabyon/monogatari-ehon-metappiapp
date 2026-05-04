@extends('layouts.app')

@section('content')
<div class="page-card">
    <div class="page-title">みんなのものがたり</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:16px;">
        @foreach($stories as $story)
        <div style="background:white;border:2px solid #C0DD97;border-radius:14px;padding:1rem;box-shadow:2px 2px 0 #C0DD97;">
            <img src="{{ asset('images/genres/' . $story->genre->name_ja . '/cover.jpg') }}"
                 onerror="this.style.display='none'"
                 style="width:100%;height:120px;object-fit:cover;border-radius:10px;border:2px solid #EAF3DE;margin-bottom:10px;">
            <div class="tag" style="margin-bottom:8px;">{{ $story->genre->name_ja }}</div>
            <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:15px;color:#27500A;margin-bottom:6px;">
                {{ $story->hero }}のものがたり
            </div>
            <div style="font-size:12px;color:#639922;margin-bottom:10px;">
                なかま：{{ $story->friend }} / てき：{{ $story->enemy }}
            </div>
            <a href="{{ route('stories.show', ['id' => $story->id]) }}" class="btn-secondary" style="font-size:12px;padding:6px 14px;">くわしくみる</a>
        </div>
        @endforeach
    </div>
    <div style="text-align:center;margin-top:24px;">
        <a href="{{ route('stories.create') }}" class="btn-primary">あたらしくつくる🌟</a>
    </div>
</div>
@endsection