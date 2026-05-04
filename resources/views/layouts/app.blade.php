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
    </style>
</head>
<body>
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
            </p>
            <p style="margin-top:4px;">© 2026 ぼくの・わたしのものがたり</p>
        </footer>
    </div>
</body>
</html>