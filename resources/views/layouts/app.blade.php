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
            background: radial-gradient(circle at 50% 30%, #fff8e9 0%, #f9e6cb 52%, #e5c7b6 100%);
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
            animation: bookAppear 0.8s ease-out both, bookFloat 2.2s 0.8s ease-in-out infinite alternate;
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
        .story-bunny {
            position: absolute;
            left: 92px;
            top: 45px;
            width: 58px;
            height: 62px;
            z-index: 3;
            animation: bunnyPeek 2.6s ease-in-out infinite;
        }
        .story-bunny__ear {
            position: absolute;
            top: -29px;
            width: 17px;
            height: 42px;
            background: #fff9f2;
            border: 2px solid #e7b6ad;
            border-radius: 60% 60% 45% 45%;
            transform-origin: bottom center;
        }
        .story-bunny__ear::after {
            content: '';
            position: absolute;
            inset: 7px 4px 5px;
            background: #f5c5c1;
            border-radius: inherit;
        }
        .story-bunny__ear--left { left: 8px; transform: rotate(-9deg); }
        .story-bunny__ear--right { right: 8px; transform: rotate(9deg); }
        .story-bunny__face {
            position: absolute;
            inset: 0;
            background: #fff9f2;
            border: 2px solid #e7b6ad;
            border-radius: 48% 48% 44% 44%;
            box-shadow: 0 5px 0 rgba(205, 145, 132, 0.12);
        }
        .story-bunny__eye {
            position: absolute;
            top: 24px;
            width: 6px;
            height: 8px;
            background: #6f4f4b;
            border-radius: 50%;
        }
        .story-bunny__eye--left { left: 16px; }
        .story-bunny__eye--right { right: 16px; }
        .story-bunny__nose {
            position: absolute;
            left: 25px;
            top: 34px;
            width: 8px;
            height: 6px;
            background: #e58e91;
            border-radius: 50%;
        }
        .story-bunny__paw {
            position: absolute;
            right: -17px;
            top: 36px;
            width: 22px;
            height: 27px;
            background: #fff9f2;
            border: 2px solid #e7b6ad;
            border-radius: 50%;
            transform-origin: bottom left;
            animation: bunnyWave 0.8s ease-in-out infinite alternate;
        }
        .story-sparkle,
        .story-flower {
            position: absolute;
            z-index: 4;
            opacity: 0;
        }
        .story-sparkle {
            width: 15px;
            height: 15px;
            background: #f3bd58;
            clip-path: polygon(50% 0, 61% 39%, 100% 50%, 61% 61%, 50% 100%, 39% 61%, 0 50%, 39% 39%);
            animation: sparklePop 2.6s 0.8s ease-in-out infinite;
        }
        .story-sparkle--one { left: 37px; top: 35px; }
        .story-sparkle--two { right: 40px; top: 68px; width: 11px; height: 11px; animation-delay: 1.1s; }
        .story-flower {
            width: 13px;
            height: 13px;
            background: #ee9da5;
            border-radius: 50%;
            box-shadow: 0 -7px 0 #ee9da5, 0 7px 0 #ee9da5, -7px 0 0 #ee9da5, 7px 0 0 #ee9da5;
            transform: scale(0.2);
            animation: flowerPop 2.6s 1s ease-in-out infinite;
        }
        .story-flower::after {
            content: '';
            position: absolute;
            left: 4px;
            top: 4px;
            width: 5px;
            height: 5px;
            background: #f6cf68;
            border-radius: 50%;
        }
        .story-flower--one { left: 53px; bottom: 32px; }
        .story-flower--two { right: 28px; bottom: 43px; transform: scale(0.75); animation-delay: 1.25s; }
        .story-loader__text {
            margin-top: 16px;
            font-size: 0.82rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #805b55;
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
        @keyframes bookAppear {
            0% { opacity: 0; transform: translateY(18px) scale(0.82) rotate(-8deg); }
            100% { opacity: 1; transform: translateY(0) scale(1) rotate(-2deg); }
        }
        @keyframes bunnyPeek {
            0%, 17% { opacity: 0; transform: translateY(22px) scale(0.8); }
            31%, 76% { opacity: 1; transform: translateY(0) scale(1); }
            90%, 100% { opacity: 0; transform: translateY(14px) scale(0.9); }
        }
        @keyframes bunnyWave {
            0% { transform: rotate(18deg); }
            100% { transform: rotate(-25deg); }
        }
        @keyframes sparklePop {
            0%, 20% { opacity: 0; transform: scale(0.2) rotate(0); }
            34%, 72% { opacity: 1; transform: scale(1) rotate(90deg); }
            88%, 100% { opacity: 0; transform: scale(0.2) rotate(180deg); }
        }
        @keyframes flowerPop {
            0%, 30% { opacity: 0; transform: scale(0.2) translateY(8px); }
            45%, 75% { opacity: 1; transform: scale(1) translateY(0); }
            90%, 100% { opacity: 0; transform: scale(0.2) translateY(5px); }
        }
        @keyframes bookmarkSwing {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(12deg); }
        }
        @keyframes textPulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }
        @media (prefers-reduced-motion: reduce) {
            .story-book,
            .story-page,
            .story-bookmark,
            .story-bunny,
            .story-bunny__paw,
            .story-sparkle,
            .story-flower,
            .story-loader__text {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
            }
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
                <div class="story-sparkle story-sparkle--one"></div>
                <div class="story-sparkle story-sparkle--two"></div>
                <div class="story-flower story-flower--one"></div>
                <div class="story-flower story-flower--two"></div>
                <div class="story-bunny" aria-hidden="true">
                    <span class="story-bunny__ear story-bunny__ear--left"></span>
                    <span class="story-bunny__ear story-bunny__ear--right"></span>
                    <span class="story-bunny__face">
                        <span class="story-bunny__eye story-bunny__eye--left"></span>
                        <span class="story-bunny__eye story-bunny__eye--right"></span>
                        <span class="story-bunny__nose"></span>
                    </span>
                    <span class="story-bunny__paw"></span>
                </div>
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

            const introMessages = [
                'たのしいえほんをつくろう！',
                'じぶんだけのえほんをつくっちゃおう！',
                'おともだちとぼうけんをはじめるよ',
                'ふしぎなえほんをはじめるよ'
            ];

            const creatingMessages = [
                'えほんをつくっているよ！',
                'ちょっとまっててね',
                'ものがたりをつくってるよ',
                'どんなえほんができるかな？',
                'どんなえほんができるかな？ワクワクするね！'
            ];

            const homeReturnMessages = [
                'またきてね！さいしょにもどるよ！'
            ];

            const storiesListMessages = [
                'みんなのえほんをさがしてるよ'
            ];

            if (loaderText) {
                const pathName = window.location.pathname;
                const isCreatePage = pathName.includes('/stories/create');
                const activeMessages = isCreatePage ? creatingMessages : introMessages;
                const selectedMessage = activeMessages[Math.floor(Math.random() * activeMessages.length)];
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

                const normalizeHref = href.split('?')[0].replace(/\/$/, '');
                const hasCreateRoute = normalizeHref === '/stories/create';
                const hasStoriesListRoute = normalizeHref === '/stories';

                if (isSameOrigin(href) && !link.target && href === '/') {
                    if (loaderText) {
                        loaderText.textContent = homeReturnMessages[Math.floor(Math.random() * homeReturnMessages.length)];
                    }
                    showLoader();
                    return;
                }

                if (isSameOrigin(href) && !link.target && hasCreateRoute) {
                    if (loaderText) {
                        loaderText.textContent = introMessages[Math.floor(Math.random() * introMessages.length)];
                    }
                    showLoader();
                    return;
                }

                if (isSameOrigin(href) && !link.target && hasStoriesListRoute) {
                    if (loaderText) {
                        loaderText.textContent = storiesListMessages[Math.floor(Math.random() * storiesListMessages.length)];
                    }
                    showLoader();
                    return;
                }

                if (isSameOrigin(href) && !link.target && /\/stories(?:\/|\?|$)/.test(href)) {
                    if (loaderText) {
                        loaderText.textContent = creatingMessages[Math.floor(Math.random() * creatingMessages.length)];
                    }
                    showLoader();
                }
            });

            document.addEventListener('submit', function (event) {
                const form = event.target;
                if (!(form instanceof HTMLFormElement)) return;

                const action = form.getAttribute('action') || form.action || '';
                if (!action) return;

                const isStorySubmit = /\/stories(?:\/|\?|$)/.test(action) || action.includes('/stories/create');
                if (isStorySubmit) {
                    if (loaderText) {
                        loaderText.textContent = creatingMessages[Math.floor(Math.random() * creatingMessages.length)];
                    }
                    showLoader();
                }
            });
        });
    </script>
</body>
</html>