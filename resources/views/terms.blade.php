@extends('layouts.app')

@section('content')
<div class="page-card">
    <div style="background:#EAF3DE;border-radius:12px;padding:12px 16px;margin-bottom:20px;font-size:13px;color:#3B6D11;font-family:'Zen Maru Gothic',sans-serif;">
        📢 このページは保護者の方向けの内容です。
    </div>

    <div class="page-title">利用規約</div>

    <div style="font-size:14px;color:#173404;line-height:2;">
        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">1. サービスについて</h3>
        <p>「ぼくの・わたしのものがたり」は、子どもたちが楽しくオリジナルの物語を作れる無料のWebアプリです。</p>

        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">2. ご利用上の注意</h3>
        <p>・本サービスはどなたでも無料でご利用いただけます。</p>
        <p>・投稿された物語は一覧ページで全ての利用者に公開されます。個人情報を入力しないようご注意ください。</p>
        <p>・他者を傷つけるような内容の投稿はご遠慮ください。</p>
        <p>・お子様がご利用の際は、保護者の方がそばで見守ることを推奨しております。</p>

        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">3. 免責事項</h3>
        <p>本サービスのご利用によって生じたトラブルについて、開発者は責任を負いかねます。</p>

        <h3 style="font-family:'Zen Maru Gothic',sans-serif;color:#27500A;margin:16px 0 8px;">4. 規約の変更</h3>
        <p>利用規約は予告なく変更することがあります。</p>
    </div>

    <div style="text-align:center;margin-top:24px;">
        <a href="{{ route('home') }}" class="btn-secondary">トップにもどる</a>
    </div>
</div>
@endsection