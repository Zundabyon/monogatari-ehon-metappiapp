@extends('layouts.app')

@section('content')
<div class="page-card">
    <div class="page-title">みんなのものがたり</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:16px;">
        @foreach($stories as $story)
        <div style="background:white;border:2px solid #C0DD97;border-radius:14px;padding:1rem;box-shadow:2px 2px 0 #C0DD97;">
    <div style="position:relative;width:100%;height:120px;margin-bottom:10px;">
        <div id="loading-{{ $story->id }}"
            style="position:absolute;top:0;left:0;width:100%;height:100%;background:#EAF3DE;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
            <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
            <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
        </div>
        <img src="{{ asset('images/genres/' . $story->genre->name . '/cover.png') }}"
            onerror="this.style.display='none';document.getElementById('loading-{{ $story->id }}').style.display='none'"
            onload="document.getElementById('loading-{{ $story->id }}').style.display='none'"
            style="width:100%;height:120px;object-fit:cover;border-radius:10px;border:2px solid #EAF3DE;position:relative;z-index:1;">
    </div>
                <div class="tag" style="margin-bottom:8px;">{{ $story->genre->name }}</div>
            <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:15px;color:#27500A;margin-bottom:6px;">
                {{ $story->hero }}のものがたり
            </div>
            <div style="font-size:12px;color:#639922;margin-bottom:10px;">
                なかま：{{ $story->friend }} / てき：{{ $story->enemy }}
            </div>
            <a href="{{ route('stories.show', ['id' => $story->id]) }}" class="btn-secondary" style="font-size:12px;padding:6px 14px;">くわしくみる</a>
            <form method="POST" action="{{ route('stories.like', ['id' => $story->id]) }}">
            @csrf
            <button type="submit">❤️ {{ $story->likes }}</button></form>
        </div>
        @endforeach
    </div>
    <div style="text-align:center;margin-top:24px;">
        <a href="{{ route('stories.create') }}" class="btn-primary">あたらしくつくる🌟</a>
    </div>
</div>
@endsection