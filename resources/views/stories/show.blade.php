@extends('layouts.app')

@section('content')
<div class="page-card" id="book">
    <div style="text-align:center;margin-bottom:20px;">
        <div class="tag">{{ $story->genre->name_ja }}</div>
        <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:24px;color:#27500A;margin-top:8px;">
            {{ $story->hero }}のものがたり
        </div>
    </div>

    <div id="pages">
        {{-- 表紙 --}}
        <div class="book-page active" data-page="0">
            <div style="position:relative;margin-bottom:16px;">
                <div id="loading-page-0" style="width:100%;height:200px;background:#EAF3DE;border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
                    <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
                </div>
                <img src="{{ asset('images/genres/' . $story->genre->name . '/cover.png') }}"
                     onerror="this.style.display='none';document.getElementById('loading-page-0').style.display='none'"
                     onload="document.getElementById('loading-page-0').style.display='none'"
                     style="width:100%;border-radius:12px;border:2px solid #C0DD97;position:relative;z-index:1;">
            </div>
            <div style="text-align:center;font-family:'Zen Maru Gothic',sans-serif;font-size:18px;color:#3B6D11;">
                このものがたりのはじまり<br>▶ つぎのページをめくってね
            </div>
        </div>

        {{-- はじまり --}}
        <div class="book-page" data-page="1" style="display:none;">
            <div style="position:relative;margin-bottom:16px;">
                <div id="loading-page-1" style="width:100%;height:200px;background:#EAF3DE;border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
                    <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
                </div>
                <img src="{{ asset('images/genres/' . $story->genre->name . '/intro.png') }}"
                     onerror="this.style.display='none';document.getElementById('loading-page-1').style.display='none'"
                     onload="document.getElementById('loading-page-1').style.display='none'"
                     style="width:100%;border-radius:12px;border:2px solid #C0DD97;position:relative;z-index:1;">
            </div>
            <div class="tag">はじまり</div>
            <div style="font-size:16px;color:#173404;line-height:1.9;margin-top:10px;">{{ $result['intro'] }}</div>
        </div>

        {{-- つぎに --}}
        <div class="book-page" data-page="2" style="display:none;">
            <div style="position:relative;margin-bottom:16px;">
                <div id="loading-page-2" style="width:100%;height:200px;background:#EAF3DE;border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
                    <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
                </div>
                <img src="{{ asset('images/genres/' . $story->genre->name . '/develop.png') }}"
                     onerror="this.style.display='none';document.getElementById('loading-page-2').style.display='none'"
                     onload="document.getElementById('loading-page-2').style.display='none'"
                     style="width:100%;border-radius:12px;border:2px solid #C0DD97;position:relative;z-index:1;">
            </div>
            <div class="tag">つぎに</div>
            <div style="font-size:16px;color:#173404;line-height:1.9;margin-top:10px;">{{ $result['develop'] }}</div>
        </div>

        {{-- そして --}}
        <div class="book-page" data-page="3" style="display:none;">
            <div style="position:relative;margin-bottom:16px;">
                <div id="loading-page-3" style="width:100%;height:200px;background:#EAF3DE;border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
                    <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
                </div>
                <img src="{{ asset('images/genres/' . $story->genre->name . '/conversion.png') }}"
                     onerror="this.style.display='none';document.getElementById('loading-page-3').style.display='none'"
                     onload="document.getElementById('loading-page-3').style.display='none'"
                     style="width:100%;border-radius:12px;border:2px solid #C0DD97;position:relative;z-index:1;">
            </div>
            <div class="tag">そして</div>
            <div style="font-size:16px;color:#173404;line-height:1.9;margin-top:10px;">{{ $result['conversion'] }}</div>
        </div>

        {{-- おわり --}}
        <div class="book-page" data-page="4" style="display:none;">
            <div style="position:relative;margin-bottom:16px;">
                <div id="loading-page-4" style="width:100%;height:200px;background:#EAF3DE;border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
                    <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
                </div>
                <img src="{{ asset('images/genres/' . $story->genre->name . '/ending.png') }}"
                     onerror="this.style.display='none';document.getElementById('loading-page-4').style.display='none'"
                     onload="document.getElementById('loading-page-4').style.display='none'"
                     style="width:100%;border-radius:12px;border:2px solid #C0DD97;position:relative;z-index:1;">
            </div>
            <div class="tag">おわり</div>
            <div style="font-size:16px;color:#173404;line-height:1.9;margin-top:10px;">{{ $result['ending'] }}</div>
        </div>

        {{-- 裏表紙 --}}
        <div class="book-page" data-page="5" style="display:none;">
            <div style="position:relative;margin-bottom:16px;">
                <div id="loading-page-5" style="width:100%;height:200px;background:#EAF3DE;border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;">
                    <div style="width:28px;height:28px;border:3px solid #C0DD97;border-top:3px solid #639922;border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    <div style="font-family:'Zen Maru Gothic',sans-serif;font-size:10px;color:#639922;">よみこみちゅう...</div>
                </div>
                <img src="{{ asset('images/genres/' . $story->genre->name . '/back.png') }}"
                     onerror="this.style.display='none';document.getElementById('loading-page-5').style.display='none'"
                     onload="document.getElementById('loading-page-5').style.display='none'"
                     style="width:100%;border-radius:12px;border:2px solid #C0DD97;position:relative;z-index:1;">
            </div>
            <div style="text-align:center;font-family:'Zen Maru Gothic',sans-serif;font-size:18px;color:#3B6D11;">
                おしまい 🌿
            </div>
            <div style="display:flex;gap:12px;justify-content:center;margin-top:24px;flex-wrap:wrap;">
                <a href="{{ route('stories.create') }}" class="btn-primary">もういちどつくる</a>
                <a href="{{ route('stories.index') }}" class="btn-secondary">みんなのをみる</a>
            </div>
        </div>
    </div>

    {{-- ページめくりナビ --}}
    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:24px;">
        <button class="btn-secondary" id="prev-btn" onclick="changePage(-1)" disabled>◀ まえ</button>
        <div id="dots" style="display:flex;gap:6px;">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <button class="btn-primary" id="next-btn" onclick="changePage(1)">つぎ ▶</button>
    </div>
</div>

<style>
.dot { width:8px;height:8px;border-radius:50%;background:#C0DD97;display:inline-block; }
.dot.active { background:#639922; }
button:disabled { opacity:0;pointer-events:none; }
@keyframes spin {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
let current = 0;
const total = 6;
function changePage(dir) {
    document.querySelectorAll('.book-page')[current].style.display = 'none';
    current += dir;
    document.querySelectorAll('.book-page')[current].style.display = 'block';
    document.querySelectorAll('.dot').forEach((d,i) => d.className = i===current ? 'dot active' : 'dot');
    document.getElementById('prev-btn').disabled = current === 0;
    document.getElementById('next-btn').disabled = current === total - 1;
}
</script>
@endsection