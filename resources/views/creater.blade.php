<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ぼくの・わたしのえほん — 開発記事</title>
<link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
<style>
  :root {
    --cream: #fdf6ec;
    --warm-white: #fffdf8;
    --story-orange: #f4845f;
    --story-yellow: #f9c74f;
    --story-green: #90be6d;
    --story-blue: #577590;
    --story-purple: #c77dff;
    --story-pink: #f9a8c9;
    --ink: #3a2e2e;
    --ink-light: #6b5b5b;
    --ink-muted: #9c8b8b;
    --border: #e8d8c4;
    --shadow: rgba(58, 46, 46, 0.08);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Klee One', 'Zen Maru Gothic', sans-serif;
    background-color: var(--cream);
    color: var(--ink);
    line-height: 1.9;
    font-size: 16px;
  }

  /* ===== PAPER TEXTURE OVERLAY ===== */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image:
      url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3CfeColorMatrix type='saturate' values='0'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 0;
  }

  /* ===== HERO ===== */
  .hero {
    position: relative;
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 40%, #ffeaa7 70%, #dcedc1 100%);
    padding: 80px 40px 60px;
    text-align: center;
    overflow: hidden;
  }

  .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(circle at 15% 85%, rgba(249, 200, 79, 0.3) 0%, transparent 40%),
      radial-gradient(circle at 85% 10%, rgba(144, 190, 109, 0.25) 0%, transparent 40%);
  }

  .hero-emoji {
    font-size: 72px;
    display: block;
    margin-bottom: 20px;
    filter: drop-shadow(0 4px 12px rgba(0,0,0,0.1));
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
  }

  .hero h1 {
    font-family: 'Zen Maru Gothic', sans-serif;
    font-size: clamp(32px, 5vw, 52px);
    font-weight: 700;
    color: var(--ink);
    position: relative;
    letter-spacing: 0.02em;
  }

  .hero-sub {
    font-size: 18px;
    color: var(--ink-light);
    margin-top: 12px;
    font-weight: 400;
    position: relative;
  }

  .hero-badge {
    display: inline-block;
    margin-top: 28px;
    background: white;
    border-radius: 999px;
    padding: 10px 28px;
    font-size: 14px;
    color: var(--story-orange);
    font-weight: 700;
    box-shadow: 0 4px 20px rgba(244, 132, 95, 0.25);
    position: relative;
    transition: transform 0.2s;
    text-decoration: none;
    border: 2px solid rgba(244, 132, 95, 0.3);
  }

  .hero-badge:hover { transform: translateY(-2px); }

  /* ===== LAYOUT ===== */
  .container {
    max-width: 820px;
    margin: 0 auto;
    padding: 60px 32px;
    position: relative;
    z-index: 1;
  }

  /* ===== SECTION ===== */
  section {
    margin-bottom: 64px;
  }

  .section-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--story-orange);
    margin-bottom: 12px;
  }

  .section-label::before {
    content: '';
    display: block;
    width: 24px;
    height: 2px;
    background: var(--story-orange);
    border-radius: 1px;
  }

  h2 {
    font-family: 'Zen Maru Gothic', sans-serif;
    font-size: clamp(22px, 3.5vw, 28px);
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 20px;
    line-height: 1.4;
  }

  h3 {
    font-family: 'Zen Maru Gothic', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: var(--ink);
    margin: 28px 0 12px;
  }

  p {
    color: var(--ink-light);
    margin-bottom: 14px;
    font-size: 15.5px;
  }

  /* ===== CATCH PHRASE ===== */
  .catch {
    background: linear-gradient(135deg, #fff9f0, #fff0e8);
    border-left: 5px solid var(--story-orange);
    border-radius: 0 16px 16px 0;
    padding: 28px 32px;
    margin: 24px 0;
    font-size: 19px;
    font-family: 'Zen Maru Gothic', sans-serif;
    color: var(--ink);
    font-weight: 700;
    line-height: 1.6;
    box-shadow: 4px 4px 0 rgba(244,132,95,0.12);
  }

  /* ===== WHY CARD ===== */
  .why-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin: 16px 0;
  }

  .why-list li {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    background: white;
    border-radius: 14px;
    padding: 16px 20px;
    box-shadow: 0 2px 12px var(--shadow);
    border: 1px solid var(--border);
    font-size: 15px;
    color: var(--ink-light);
    transition: transform 0.2s;
  }

  .why-list li:hover { transform: translateX(4px); }

  .why-list .arrow {
    font-size: 18px;
    margin-top: 2px;
    flex-shrink: 0;
  }

  /* ===== USER CARDS ===== */
  .card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
    margin: 20px 0;
  }

  .card {
    background: white;
    border-radius: 20px;
    padding: 24px 20px;
    box-shadow: 0 4px 20px var(--shadow);
    border: 1px solid var(--border);
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 28px rgba(58, 46, 46, 0.12);
  }

  .card-icon {
    font-size: 36px;
    display: block;
    margin-bottom: 12px;
  }

  .card-title {
    font-family: 'Zen Maru Gothic', sans-serif;
    font-weight: 700;
    font-size: 14px;
    color: var(--story-orange);
    margin-bottom: 8px;
    letter-spacing: 0.05em;
  }

  .card p {
    font-size: 14px;
    color: var(--ink-muted);
    margin: 0;
  }

  /* ===== TABLE ===== */
  .table-wrap {
    overflow-x: auto;
    margin: 20px 0;
    border-radius: 16px;
    box-shadow: 0 4px 20px var(--shadow);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    font-size: 14px;
  }

  thead {
    background: linear-gradient(135deg, var(--story-orange), #f4a76f);
  }

  thead th {
    color: white;
    font-family: 'Zen Maru Gothic', sans-serif;
    font-weight: 700;
    padding: 14px 20px;
    text-align: left;
    white-space: nowrap;
  }

  tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.15s;
  }

  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background: #fff8f3; }

  td {
    padding: 14px 20px;
    color: var(--ink-light);
    vertical-align: top;
  }

  td:first-child {
    font-weight: 700;
    color: var(--ink);
    white-space: nowrap;
  }

  /* ===== HIGHLIGHT BOX ===== */
  .highlight {
    background: linear-gradient(135deg, #fffbe6, #fff3d1);
    border: 2px solid var(--story-yellow);
    border-radius: 20px;
    padding: 28px 32px;
    margin: 24px 0;
    box-shadow: 4px 4px 0 rgba(249, 199, 79, 0.3);
  }

  .highlight p {
    font-size: 16px;
    font-family: 'Zen Maru Gothic', sans-serif;
    font-weight: 700;
    color: var(--ink);
    margin: 0;
  }

  /* ===== FLOW ===== */
  .flow {
    display: flex;
    flex-direction: column;
    gap: 0;
    margin: 24px 0;
  }

  .flow-step {
    display: flex;
    align-items: flex-start;
    gap: 16px;
  }

  .flow-line {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-shrink: 0;
  }

  .flow-dot {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    color: white;
    flex-shrink: 0;
  }

  .flow-connector {
    width: 2px;
    height: 28px;
    background: var(--border);
    margin: 4px 0;
  }

  .flow-step:last-child .flow-connector { display: none; }

  .flow-content {
    padding-top: 6px;
    padding-bottom: 20px;
  }

  .flow-content strong {
    display: block;
    font-family: 'Zen Maru Gothic', sans-serif;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 4px;
  }

  .flow-content p {
    font-size: 14px;
    margin: 0;
    color: var(--ink-muted);
  }

  /* ===== FEATURE CHIPS ===== */
  .chip-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 16px 0;
  }

  .chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: white;
    border: 1.5px solid var(--border);
    border-radius: 999px;
    padding: 7px 16px;
    font-size: 13.5px;
    color: var(--ink-light);
    font-weight: 500;
    box-shadow: 0 2px 8px var(--shadow);
  }

  .chip.done::before { content: '✅'; font-size: 12px; }
  .chip.planned::before { content: '🔮'; font-size: 12px; }

  /* ===== CONCERN CARDS ===== */
  .concern {
    background: white;
    border-radius: 18px;
    padding: 24px 28px;
    margin: 16px 0;
    border-left: 5px solid var(--story-green);
    box-shadow: 0 4px 16px var(--shadow);
  }

  .concern.risk { border-left-color: var(--story-pink); }

  .concern-head {
    font-family: 'Zen Maru Gothic', sans-serif;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 10px;
    font-size: 16px;
  }

  .concern p { font-size: 14px; margin-bottom: 8px; }
  .concern p:last-child { margin-bottom: 0; }

  .label-pill {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 999px;
    margin-right: 6px;
    vertical-align: middle;
  }

  .label-problem { background: #ffeef4; color: #e06c8c; }
  .label-solution { background: #edfbf0; color: #4caf72; }

  /* ===== TECH TABLE ===== */
  .tech-table thead { background: linear-gradient(135deg, var(--story-blue), #43637a); }

  /* ===== MECHANISM ===== */
  .mechanism {
    background: linear-gradient(135deg, #f0f7ff, #e8f4fd);
    border-radius: 20px;
    padding: 32px;
    margin: 24px 0;
    border: 1px solid #cce0f5;
  }

  .mechanism-step {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 20px;
  }

  .mechanism-step:last-child { margin-bottom: 0; }

  .mstep-num {
    background: var(--story-blue);
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .mstep-content strong {
    display: block;
    font-family: 'Zen Maru Gothic', sans-serif;
    color: var(--ink);
    margin-bottom: 4px;
    font-size: 15px;
  }

  .mstep-content p {
    font-size: 14px;
    color: var(--ink-muted);
    margin: 0;
  }

  .code-inline {
    background: rgba(87, 117, 144, 0.12);
    color: var(--story-blue);
    padding: 2px 8px;
    border-radius: 6px;
    font-family: 'Courier New', monospace;
    font-size: 13px;
  }

  /* ===== DIVIDER ===== */
  .divider {
    display: flex;
    align-items: center;
    gap: 16px;
    margin: 48px 0;
    color: var(--ink-muted);
    font-size: 20px;
  }

  .divider::before, .divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(to right, transparent, var(--border), transparent);
  }

  /* ===== PROFILE ===== */
  .profile {
    background: linear-gradient(135deg, #fdf0ff, #f5e6ff);
    border-radius: 24px;
    padding: 36px;
    text-align: center;
    border: 1px solid #e8cff5;
    box-shadow: 0 8px 32px rgba(199, 125, 255, 0.12);
  }

  .profile-avatar {
    font-size: 64px;
    display: block;
    margin-bottom: 16px;
  }

  .profile-name {
    font-family: 'Zen Maru Gothic', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 6px;
  }

  .profile-role {
    font-size: 14px;
    color: var(--story-purple);
    font-weight: 600;
    margin-bottom: 16px;
  }

  .profile-links {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 16px;
  }

  .profile-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: white;
    border: 1.5px solid #e0ccf5;
    border-radius: 999px;
    padding: 8px 20px;
    font-size: 13.5px;
    color: var(--story-blue);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s;
    box-shadow: 0 2px 8px var(--shadow);
  }

  .profile-link:hover {
    background: var(--story-purple);
    color: white;
    border-color: var(--story-purple);
  }

  /* ===== FOOTER ===== */
  footer {
    text-align: center;
    padding: 40px;
    color: var(--ink-muted);
    font-size: 13px;
    border-top: 1px solid var(--border);
    background: white;
  }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 600px) {
    .container { padding: 40px 20px; }
    .hero { padding: 60px 24px 40px; }
    .catch { padding: 20px 20px; font-size: 16px; }
    .card-grid { grid-template-columns: 1fr; }
    td { padding: 12px 14px; }
  }
</style>
</head>
<body>

<!-- HERO -->
<div class="hero">
  <span class="hero-emoji">📖</span>
  <h1>ぼくの・わたしのえほん</h1>
  <p class="hero-sub">僕が、私が主人公。世界にひとつだけのオリジナル絵本Webアプリ</p>
  <a class="hero-badge" href="https://monogatari-ehon-metappiapp-production.up.railway.app/stories" target="_blank">
    🔗 アプリを試してみる →
  </a>
</div>

<div class="container">

  <!-- 1. サービス概要 -->
  <section>
    <span class="section-label">01 — サービス概要</span>
    <h2>お子様が主役になれる絵本を、一瞬でつくる</h2>
    <p>
      お子様の名前、お友達の名前をフォームに入力するだけで、世界にひとつだけのオリジナル絵本が生まれるWebアプリです。
      会員登録不要・インストール不要。スマートフォン1台で、今夜の読み聞かせから使えます。
    </p>

    <div class="catch">
      「せんたいヒーローになりたい」「お姫様になりたい」——<br>
      そんなシンプルな夢に、このアプリは応えます。
    </div>
  </section>

  <div class="divider">🌟</div>

  <!-- 2. 開発背景 -->
  <section>
    <span class="section-label">02 — 開発背景</span>
    <h2>なぜつくったのか</h2>
    <p>
      子どもたちの「自分が主人公になりたい」という欲求に、既製品の絵本は応えられていません。
      名前入り絵本サービスは高価で、届くまでに時間もかかる。デジタルで手軽に使えるサービスも存在しませんでした。
    </p>
    <p>
      小売業で長年お客様と接してきた経験から、子育て世代の「子どもと過ごす時間をもっと豊かにしたい」という声を
      現場で多く聞いてきた原体験が、このアプリのスタート地点になりました。
    </p>

    <h3>本当に解決したい課題</h3>
    <ul class="why-list">
      <li>
        <span class="arrow">🔍</span>
        <span>既製品の絵本は主人公が固定されていて、わが子が主役になれない</span>
      </li>
      <li>
        <span class="arrow">🔍</span>
        <span>名前入り絵本サービスは高価・時間がかかる・デジタル非対応のものが多い</span>
      </li>
      <li>
        <span class="arrow">✅</span>
        <span><strong>→ 親御さんが手軽に「子どもが主役の特別な物語体験」をつくれる場所がない</strong></span>
      </li>
    </ul>
  </section>

  <div class="divider">🌟</div>

  <!-- 3. 想定ユーザー -->
  <section>
    <span class="section-label">03 — 想定ユーザー</span>
    <h2>誰のためのサービスか</h2>

    <div class="card-grid">
      <div class="card">
        <span class="card-icon">👶</span>
        <div class="card-title">対象年齢</div>
        <p>4〜8歳の子どもとその保護者（25〜40代）。文字を読み始め、物語への興味が最も高い時期。</p>
      </div>
      <div class="card">
        <span class="card-icon">🌙</span>
        <div class="card-title">使う場面</div>
        <p>おやすみ前の読み聞かせ、子どもとの隙間時間。数十秒で生成完了するので短い時間でも楽しめる。</p>
      </div>
      <div class="card">
        <span class="card-icon">📱</span>
        <div class="card-title">環境</div>
        <p>スマートフォン・タブレット・PC、ブラウザがあればOK。インストール不要・登録不要。</p>
      </div>
    </div>

    <h3>ユーザーがサービスを使い始めるまで</h3>
    <div class="flow">
      <div class="flow-step">
        <div class="flow-line">
          <div class="flow-dot" style="background:var(--story-orange)">1</div>
          <div class="flow-connector"></div>
        </div>
        <div class="flow-content">
          <strong>SNSやQRコードでURLを知る</strong>
          <p>拡散しやすい形式を想定</p>
        </div>
      </div>
      <div class="flow-step">
        <div class="flow-line">
          <div class="flow-dot" style="background:var(--story-yellow)">2</div>
          <div class="flow-connector"></div>
        </div>
        <div class="flow-content">
          <strong>会員登録不要・即座に使える</strong>
          <p>離脱ハードルが極めて低い</p>
        </div>
      </div>
      <div class="flow-step">
        <div class="flow-line">
          <div class="flow-dot" style="background:var(--story-green)">3</div>
          <div class="flow-connector"></div>
        </div>
        <div class="flow-content">
          <strong>子どもが喜ぶ → 習慣化</strong>
          <p>「また今日もやろう！」というリピート体験へ</p>
        </div>
      </div>
      <div class="flow-step">
        <div class="flow-line">
          <div class="flow-dot" style="background:var(--story-blue)">4</div>
        </div>
        <div class="flow-content">
          <strong>みんなのものがたり一覧で楽しむ</strong>
          <p>ほかのお子さんの物語も閲覧できるコミュニティ性</p>
        </div>
      </div>
    </div>
  </section>

  <div class="divider">🌟</div>

  <!-- 4. 競合比較 -->
  <section>
    <span class="section-label">04 — 競合調査</span>
    <h2>既存サービスとの比較</h2>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>サービス名</th>
            <th>できること</th>
            <th>できないこと</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>名前入り絵本（各出版社・EC）</td>
            <td>子どもの名前が登場するオリジナル絵本を印刷・製本して届けてくれる</td>
            <td>高価・時間がかかる・デジタル非対応</td>
          </tr>
          <tr>
            <td>絵本ナビ</td>
            <td>市販の絵本をデジタルで読める</td>
            <td>既製品のみで子どもが主役になれない</td>
          </tr>
          <tr>
            <td>PIBO</td>
            <td>童話・昔話を中心に360冊以上読める。1日3冊まで無料</td>
            <td>既存の物語のみでオリジナル作成不可</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="highlight">
      <p>🎯 差別化を一文で：「わが子が主役のオリジナル絵本が、デジタルで一瞬で作れる」——これが既存サービスにはない、このアプリだけの価値です。</p>
    </div>
  </section>

  <div class="divider">🌟</div>

  <!-- 5. 提供価値 -->
  <section>
    <span class="section-label">05 — 提供価値</span>
    <h2>このサービスで変わること</h2>

    <div class="card-grid">
      <div class="card">
        <span class="card-icon">🔄</span>
        <div class="card-title">行動の変化</div>
        <p>毎晩の読み聞かせが、既製品の絵本から「わが子オリジナルの物語」に変わる</p>
      </div>
      <div class="card">
        <span class="card-icon">✨</span>
        <div class="card-title">気持ちの変化</div>
        <p>子どもは「自分が主役！」という特別感を毎日感じられる</p>
      </div>
      <div class="card">
        <span class="card-icon">💡</span>
        <div class="card-title">考え方の変化</div>
        <p>物語を「受け取るもの」から「一緒につくるもの」として捉えるようになる</p>
      </div>
    </div>
  </section>

  <div class="divider">🌟</div>

  <!-- 6. 機能 -->
  <section>
    <span class="section-label">06 — 機能</span>
    <h2>実装済み・今後の機能</h2>

    <h3>MVPで実装済みの機能</h3>
    <div class="chip-list">
      <span class="chip done">ジャンル選択（15種類）</span>
      <span class="chip done">主人公・なかま・てき・キーアイテム入力</span>
      <span class="chip done">物語の自動生成</span>
      <span class="chip done">絵本風ページめくり表示</span>
      <span class="chip done">ジャンルごとの挿絵</span>
      <span class="chip done">みんなのものがたり一覧</span>
      <span class="chip done">いいね機能</span>
      <span class="chip done">利用規約・プライバシーポリシー</span>
    </div>

    <h3>本リリースで追加予定の機能</h3>
    <div class="chip-list">
      <span class="chip planned">ユーザー登録・ログイン</span>
      <span class="chip planned">物語のSNSシェア機能</span>
      <span class="chip planned">テンプレートを各ジャンル5話以上に</span>
      <span class="chip planned">管理者画面</span>
    </div>

    <h3>収益化について</h3>
    <p>現時点では未定ですが、以下を検討中です。</p>
    <ul class="why-list">
      <li>
        <span class="arrow">💰</span>
        <span>現在は4ページ構成のため、10〜15ページの長編作成を有料プランとして提供</span>
      </li>
      <li>
        <span class="arrow">💰</span>
        <span>AI物語生成・画像生成機能の導入時に有料プランとして展開（トークンコストに応じて検討）</span>
      </li>
    </ul>
  </section>

  <div class="divider">🌟</div>

  <!-- 7. 懸念点 -->
  <section>
    <span class="section-label">07 — 懸念点と対策</span>
    <h2>リスクとその対処</h2>

    <div class="concern risk">
      <div class="concern-head">⚠️ 懸念点① 不適切な内容の投稿</div>
      <p><span class="label-pill label-problem">問題</span>ログイン不要のため、悪意ある内容が投稿される可能性がある。子ども向けサービスとして信頼を失うリスク。</p>
      <p><span class="label-pill label-solution">対策</span>バリデーションによる文字数制限・禁止ワードフィルターを実装予定。将来的にはログイン機能で投稿者を管理する。</p>
    </div>

    <div class="concern">
      <div class="concern-head">⚠️ 懸念点② 物語の使い回し感</div>
      <p><span class="label-pill label-problem">問題</span>現状1ジャンル1テンプレートのため、バリエーションが限られ飽きられる可能性がある。</p>
      <p><span class="label-pill label-solution">対策</span>各ジャンル5テンプレート以上に増やし、展開（たのしい・しんけん・おわらい）の選択肢を追加予定。</p>
    </div>
  </section>

  <div class="divider">🌟</div>

  <!-- 8. 技術スタック -->
  <section>
    <span class="section-label">08 — 技術スタック</span>
    <h2>使用技術</h2>

    <div class="table-wrap">
      <table class="tech-table">
        <thead>
          <tr>
            <th>カテゴリ</th>
            <th>技術</th>
            <th>選定理由</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>フレームワーク</td>
            <td>Laravel 13.7</td>
            <td>RailsでMVC・ORM・ルーティングを習得済みのため、思想が近いLaravelを選定</td>
          </tr>
          <tr>
            <td>言語</td>
            <td>PHP 8.4</td>
            <td>Laravel採用に伴い選定。PHP実践力を高めることが目的</td>
          </tr>
          <tr>
            <td>DB</td>
            <td>MySQL</td>
            <td>Laravel Sailに標準搭載のため採用</td>
          </tr>
          <tr>
            <td>インフラ</td>
            <td>Railway（Laravel Sail）</td>
            <td>Laravel・MySQLとの相性が良いため採用</td>
          </tr>
          <tr>
            <td>フロントエンド</td>
            <td>Blade / CSS</td>
            <td>Laravelの標準テンプレートエンジン。追加ライブラリなしで実装できるため</td>
          </tr>
          <tr>
            <td>フォント</td>
            <td>Zen Maru Gothic / Klee One</td>
            <td>絵本らしいやわらかい雰囲気を表現するためGoogle Fontsより選定</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <div class="divider">🌟</div>

  <!-- 9. 仕組み -->
  <section>
    <span class="section-label">09 — 物語生成の仕組み</span>
    <h2>どうやって物語が生まれるのか</h2>

    <div class="mechanism">
      <div class="mechanism-step">
        <div class="mstep-num">①</div>
        <div class="mstep-content">
          <strong>ユーザーがフォームに入力</strong>
          <p>しゅじんこう・なかま・てき・アイテム・ジャンルを入力する</p>
        </div>
      </div>
      <div class="mechanism-step">
        <div class="mstep-num">②</div>
        <div class="mstep-content">
          <strong>ジャンルに対応したテンプレートを取得</strong>
          <p>選択されたジャンルの物語テンプレートをDBから引き出す</p>
        </div>
      </div>
      <div class="mechanism-step">
        <div class="mstep-num">③</div>
        <div class="mstep-content">
          <strong><span class="code-inline">str_replace</span> でプレースホルダーを置換</strong>
          <p>
            例：<span class="code-inline">{主人公}</span> → こうたくん　／　<span class="code-inline">{なかま}</span> → うさぎさん　／　<span class="code-inline">{てき}</span> → おに
          </p>
        </div>
      </div>
      <div class="mechanism-step">
        <div class="mstep-num">④</div>
        <div class="mstep-content">
          <strong>絵本風ページめくり画面で表示</strong>
          <p>表紙・起承転結・裏表紙の構成で、絵本らしい体験を提供</p>
        </div>
      </div>
    </div>

    <p style="font-size:14px; color:var(--ink-muted);">
      ※ 現バージョンはテンプレートベースの置換による生成です。今後のバージョンではAI（LLM）による動的生成を検討中です。
    </p>
  </section>

  <div class="divider">🌟</div>

  <!-- 開発者 -->
  <section>
    <span class="section-label">開発者</span>
    <div class="profile">
      <span class="profile-avatar">🧑‍💻</span>
      <div class="profile-name">小笠原　裕輝</div>
      <div class="profile-role">プログラミングスクールRUNTEQ72期</div>
      <div class="profile-links">
        <a class="profile-link" href="https://github.com/Zundabyon/monogatari-ehon-metappiapp" target="_blank">
          GitHub
        </a>
        <a class="profile-link" href="https://qiita.com/" target="_blank">
          Qiita記事：Rails経験者がLaravelでMVCを実装
        </a>
        <a class="profile-link" href="https://monogatari-ehon-metappiapp-production.up.railway.app" target="_blank">
          アプリURL
        </a>
      </div>
    </div>
  </section>

</div>

<footer>
  ぼくの・わたしのえほん — めたっぴ開発記録
</footer>

</body>
</html>