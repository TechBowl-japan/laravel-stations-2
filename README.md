# 環境構築

1. Docker
2. Visual Studio Code（VSCode）
3. Git

上記は必ずインストールした上で始めてください。

他の Railway にまだ挑戦したことがない方は、[Railway 準備編](https://techbowl.notion.site/Railway-ceba695d5014460e9733c2a46318cdec) より 環境構築や VSCode、Git のインストールをしてください。（GitHub Codespaces 以外の資料をお読みいただき、準備をお願いいたします。）

## MacOS における Docker の環境構築

[MacOS における環境構築について](./docs/README-mac.md) を参照ください。

## Windows における Docker の環境構築

[Windows における環境構築について](./docs/README-windows.md) を参照ください。

# テスト実行の仕方

必ず上記の環境構築にて、Laravel Railway に取り組むための環境を整えてください。

VSCode を使用してコードを編集し、「TechTrain Railway」という拡張機能から「できた!」と書かれた青いボタンをクリックすると判定が始まります。

詳細にテストを実施したい場合は、下記コマンドの Station 番号を変更し、実行します。
```bash
# Station1のテストをする場合
docker compose exec php-container vendor/bin/phpunit tests/Feature/LaravelStations/Station1
```
