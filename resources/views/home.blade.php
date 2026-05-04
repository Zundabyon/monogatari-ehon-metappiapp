@extends('layouts.app')

@section('content')
<div class="page-card" style="text-align:center;padding:2.5rem;">
     <img src="{{ asset('top.png') }}" onerror="this.style.display='none'"
     style="width:100%;border-radius:12px;border:2px solid #C0DD97;margin-bottom:16px;">
    <div style="font-size:15px;color:#639922;margin-bottom:8px;">
        きみだけのオリジナルのものがたりをつくろう！
    </div>
    <div style="font-size:14px;color:#639922;margin-bottom:32px;">
        すきなキャラクターをいれると、ふしぎなものがたりができるよ
    </div>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <a href="{{ route('stories.create') }}" class="btn-primary">ものがたりをつくる</a>
        <a href="{{ route('stories.index') }}" class="btn-secondary">みんなのをみる</a>
    </div>
</div>
@endsection