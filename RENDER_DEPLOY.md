# Render デプロイ手順

この構成では、Laravel本体をRenderの無料Web Service、データベースをTiDB Cloud Starterで動かします。

## 1. APP_KEYを確認する

ローカルのプロジェクトで次を実行し、表示された `base64:` から始まる値を控えます。

```bash
./vendor/bin/sail artisan key:generate --show
```

この値はGitへコミットしません。

## 2. TiDB Cloud Starterを作成する

TiDB CloudでStarterクラスタを作り、接続画面から次の値を控えます。

- Host
- Port（通常は4000）
- Database
- Username
- Password

データベースがまだない場合は、TiDB CloudのSQL Editorで作成します。

```sql
CREATE DATABASE monogatari CHARACTER SET utf8mb4;
```

## 3. Render Blueprintを作成する

1. この変更をGitHubの `main` ブランチへpushします。
2. Render Dashboardで `New` → `Blueprint` を選びます。
3. GitHubの `monogatari-ehon-metappiapp` を接続します。
4. リポジトリ内の `render.yaml` を読み込ませます。

初回作成時に、次の値を入力します。

| Render環境変数 | 入力する値 |
| --- | --- |
| `APP_URL` | Renderで作成されるURL（例: `https://monogatari-ehon-metappiapp.onrender.com`） |
| `APP_KEY` | 手順1で控えた値 |
| `DB_HOST` | TiDB CloudのHost |
| `DB_PORT` | TiDB CloudのPort |
| `DB_DATABASE` | `monogatari` |
| `DB_USERNAME` | TiDB CloudのUsername |
| `DB_PASSWORD` | TiDB CloudのPassword |

## 4. デプロイを確認する

マイグレーションと、アプリに必要なジャンル・物語テンプレートの登録は、コンテナ起動時に自動実行されます。どちらのSeederも重複登録を防ぐ実装なので、再デプロイ時にも同じデータは増えません。

デプロイが成功したら、RenderのURLを開いて画面を確認します。

## 注意

- Render無料サービスは、アクセスが15分ないと停止します。次のアクセス時は起動まで時間がかかります。
- `storage` 内へアップロードしたファイルは再起動時に消えます。このアプリの現在の画像は `public/images` に含まれるため影響を受けません。
- 本番環境には固定パスワードのテストユーザーを作成しません。そのため、`DatabaseSeeder` 全体は自動実行しない構成です。
