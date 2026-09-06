<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ぼくの わたしのえほん</title>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;700&family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Klee One', cursive;
            background: #F0F7E6;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .site-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .site-title {
            font-family: 'Zen Maru Gothic', sans-serif;
            font-size: 24px;
            color: #27500A;
            letter-spacing: 2px;
            margin-bottom: 6px;
        }
        .site-nav {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 14px;
            flex-wrap: wrap;
        }
        .nav-link {
            font-family: 'Zen Maru Gothic', sans-serif;
            font-size: 13px;
            background: white;
            border: 2px solid #97C459;
            color: #3B6D11;
            border-radius: 24px;
            padding: 6px 18px;
            text-decoration: none;
        }
        .nav-link:hover { background: #EAF3DE; }

        /* カード共通 */
        .page-card {
            background: #FFFDF5;
            border: 2px solid #C0DD97;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 20px;
            box-shadow: 3px 3px 0 #C0DD97;
        }
        .page-title {
            font-family: 'Zen Maru Gothic', sans-serif;
            font-size: 20px;
            color: #27500A;
            margin-bottom: 16px;
            border-bottom: 2px dashed #C0DD97;
            padding-bottom: 8px;
        }
        .tag {
            display: inline-block;
            background: #EAF3DE;
            color: #3B6D11;
            border-radius: 20px;
            font-size: 12px;
            padding: 3px 12px;
            border: 1px solid #97C459;
            font-family: 'Zen Maru Gothic', sans-serif;
        }

        /* フォーム */
        .form-row { margin-bottom: 16px; }
        .form-label {
            font-family: 'Zen Maru Gothic', sans-serif;
            font-size: 13px;
            color: #3B6D11;
            margin-bottom: 6px;
            display: block;
        }
        .form-input, .form-select {
            width: 100%;
            border: 2px solid #97C459;
            border-radius: 24px;
            padding: 10px 18px;
            font-family: 'Klee One', cursive;
            font-size: 15px;
            background: white;
            color: #173404;
            outline: none;
        }

        /* ボタン */
        .btn-primary {
            font-family: 'Zen Maru Gothic', sans-serif;
            background: #639922;
            color: white;
            border: none;
            padding: 12px 36px;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 4px 0 #3B6D11;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary:hover { background: #4a7a18; }
        .btn-secondary {
            font-family: 'Zen Maru Gothic', sans-serif;
            background: white;
            color: #3B6D11;
            border: 2px solid #97C459;
            padding: 10px 24px;
            font-size: 14px;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-secondary:hover { background: #EAF3DE; }

        .story-loader {
            position: fixed;
            inset: 0;
            display: grid;
            place-items: center;
            background: radial-gradient(circle at top, #f3ead6 0%, #d6c7a7 32%, #2a2f3d 100%);
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.7s ease;
        }
        .story-loader.is-visible {
            opacity: 1;
            pointer-events: auto;
        }
        .story-book {
            position: relative;
            width: 230px;
            height: 180px;
            transform: rotate(-2deg);
            animation: bookFloat 2.2s ease-in-out infinite alternate;
        }
        .story-page {
            position: absolute;
            left: 32px;
            top: 28px;
            width: 150px;
            height: 120px;
            background: linear-gradient(135deg, #fffdf9, #f5ead6);
            border: 1px solid rgba(88, 65, 40, 0.25);
            border-radius: 8px 18px 18px 8px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.12);
            transform-origin: left center;
        }
        .story-page.page-1 { animation: pageTurn1 2.6s ease-in-out infinite; }
        .story-page.page-2 { animation: pageTurn2 2.6s ease-in-out infinite; }
        .story-page.page-3 { animation: pageTurn3 2.6s ease-in-out infinite; }
        .story-page.page-4 { animation: pageTurn4 2.6s ease-in-out infinite; }
        .story-bookmark {
            position: absolute;
            right: 18px;
            top: 8px;
            width: 18px;
            height: 90px;
            background: linear-gradient(180deg, #d89c6d, #b8713f);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 82%, 0 100%);
            box-shadow: 0 0 12px rgba(184, 109, 60, 0.45);
            animation: bookmarkSwing 2.2s ease-in-out infinite;
        }
        .story-loader__text {
            margin-top: 16px;
            font-size: 0.82rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.9);
            animation: textPulse 1.5s ease-in-out infinite;
            font-family: 'Zen Maru Gothic', sans-serif;
        }

        @keyframes pageTurn1 {
            0%, 18% { transform: rotateY(0deg) translateX(0); opacity: 0.9; }
            32% { transform: rotateY(-72deg) translateX(6px); opacity: 1; }
            52% { transform: rotateY(-90deg) translateX(12px); opacity: 0.7; }
            100% { transform: rotateY(-120deg) translateX(18px); opacity: 0; }
        }
        @keyframes pageTurn2 {
            0%, 22% { transform: rotateY(0deg) translateX(0); opacity: 0; }
            36% { opacity: 0.5; }
            52% { transform: rotateY(-70deg) translateX(6px); opacity: 1; }
            72% { transform: rotateY(-92deg) translateX(12px); opacity: 0.7; }
            100% { transform: rotateY(-120deg) translateX(18px); opacity: 0; }
        }
        @keyframes pageTurn3 {
            0%, 38% { transform: rotateY(0deg) translateX(0); opacity: 0; }
            52% { opacity: 0.5; }
            68% { transform: rotateY(-68deg) translateX(6px); opacity: 1; }
            86% { transform: rotateY(-92deg) translateX(12px); opacity: 0.7; }
            100% { transform: rotateY(-120deg) translateX(18px); opacity: 0; }
        }
        @keyframes pageTurn4 {
            0%, 55% { transform: rotateY(0deg) translateX(0); opacity: 0; }
            70% { opacity: 0.4; }
            82% { transform: rotateY(-60deg) translateX(4px); opacity: 1; }
            100% { transform: rotateY(-100deg) translateX(16px); opacity: 0; }
        }
        @keyframes bookFloat {
            0% { transform: rotate(-2deg) translateY(0); }
            100% { transform: rotate(2deg) translateY(-6px); }
        }
        @keyframes bookmarkSwing {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(12deg); }
        }
        @keyframes textPulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }
        @keyframes spin {
            0%   { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
    </style>
</head>
<body>
    <div id="storyLoader" class="story-loader" aria-live="polite" aria-busy="true">
        <div>
            <div class="story-book">
                <div class="story-page page-1"></div>
                <div class="story-page page-2"></div>
                <div class="story-page page-3"></div>
                <div class="story-page page-4"></div>
                <div class="story-bookmark"></div>
            </div>
            <div class="story-loader__text" id="storyLoaderText">えほんをつくっているよ！</div>
        </div>
    </div>

    <div class="container">
        <header class="site-header">
            <div class="site-title">ぼくの・わたしのものがたり</div>
            <nav class="site-nav">
                <a href="{{ route('home') }}" class="nav-link">トップへ</a>
                <a href="{{ route('stories.create') }}" class="nav-link">ものがたりをつくる</a>
                <a href="{{ route('stories.index') }}" class="nav-link">みんなのものがたり</a>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>

        <footer style="text-align:center;margin-top:40px;padding:20px;font-size:12px;color:#97C459;">
            <p style="font-family:'Zen Maru Gothic',sans-serif;color:#639922;margin-bottom:8px;">
                おうちのひとへ →
                <a href="{{ route('terms') }}" style="color:#639922;margin:0 8px;">利用規約</a>
                <a href="{{ route('privacy') }}" style="color:#639922;margin:0 8px;">プライバシーポリシー</a>
                <a href="{{ route('creater') }}" style="color:#639922;margin:0 8px;">編集後記</a>
            </p>
            <p style="margin-top:4px;">© 2026 ぼくの・わたしのものがたり</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loader = document.getElementById('storyLoader');
            const loaderText = document.getElementById('storyLoaderText');
            if (!loader) return;

            const messages = [
                'えほんをつくっているよ！',
                'ちょっとまっててね',
                'えほんさくせいちゅう。。。',
                'ものがたりをつくっています。',
                'どんなえほんができるかな？'
            ];

            if (loaderText) {
                const selectedMessage = messages[Math.floor(Math.random() * messages.length)];
                loaderText.textContent = selectedMessage;
            }

            const showLoader = function () {
                loader.classList.add('is-visible');
            };

            const hideLoader = function () {
                loader.classList.remove('is-visible');
            };

            hideLoader();

            window.addEventListener('load', function () {
                setTimeout(function () {
                    hideLoader();
                }, 250);
            });

            document.addEventListener('click', function (event) {
                const link = event.target.closest('a');

                if (!link) return;

                const href = link.getAttribute('href') || '';
                if (!href || href.startsWith('#')) return;

                const isSameOrigin = function (targetUrl) {
                    try {
                        return new URL(targetUrl, window.location.origin).origin === window.location.origin;
                    } catch (error) {
                        return false;
                    }
                };

                if (isSameOrigin(href) && !link.target) {
                    showLoader();
                }
            });
        });
    </script>
</body>
</html>