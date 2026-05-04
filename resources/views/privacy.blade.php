@extends('layouts.app')

@section('content')
<div class="page-card">
    <div style="background:#EAF3DE;border-radius:12px;padding:12px 16px;margin-bottom:20px;font-size:13px;color:#3B6D11;font-family:'Zen Maru Gothic',sans-serif;">
        📢 このページは保護者の方向けの内容です。
    </div>

    <div class="page-title">プライバシーポリシー</div>

    <div style="font-size:14px;color:#173404;line-height:2;">
        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">1. 収集する情報について</h3>
        <p>本サービスでは、物語の内容（主人公・なかま・てき・アイテム名）をデータベースに保存します。</p>
        <p>氏名・住所・メールアドレスなどの個人情報は収集しておりません。</p>

        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">2. 情報の利用目的</h3>
        <p>保存された物語は、アプリの一覧ページで全ての利用者に表示されます。</p>
        <p>第三者への提供は行いません。</p>

        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">3. Cookieについて</h3>
        <p>本サービスはセッション管理のためにCookieを使用しています。</p>

        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">4. お問い合わせ</h3>
        <p>プライバシーポリシーに関するお問い合わせは、開発者までご連絡ください。</p>
    </div>

    <div style="text-align:center;margin-top:24px;">
        <a href="{{ route('home') }}" class="btn-secondary">トップにもどる</a>
    </div>
</div>
@endsection