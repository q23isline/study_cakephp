# Study CakePHP

[![LICENSE](https://img.shields.io/badge/license-MIT-green.svg)](./LICENSE)
![releases](https://img.shields.io/github/release/q23isline/study_cakephp.svg?logo=github)
[![GitHub Actions](https://github.com/q23isline/study_cakephp/actions/workflows/ci.yml/badge.svg)](https://github.com/q23isline/study_cakephp/actions/workflows/ci.yml)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg)](https://github.com/phpstan/phpstan)
[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=555555&color=007acc&logoColor=007acc)](https://open.vscode.dev/q23isline/study_cakephp)

[![PHP](https://img.shields.io/static/v1?logo=php&label=PHP&message=v8.1.13&labelColor=555555&color=777BB4&logoColor=777BB4)](https://www.php.net)
[![CakePHP](https://img.shields.io/static/v1?logo=cakephp&label=CakePHP&message=v4.4.12&labelColor=555555&color=D33C43&logoColor=D33C43)](https://cakephp.org)
[![MySQL](https://img.shields.io/static/v1?logo=mysql&label=MySQL&message=v8.0&labelColor=555555&color=4479A1&logoColor=4479A1)](https://dev.mysql.com)
[![NGINX](https://img.shields.io/static/v1?logo=nginx&label=NGINX&message=v1.21&labelColor=555555&color=009639&logoColor=009639)](https://www.nginx.com)

## はじめにやること

1. ソースダウンロード

    ```bash
    git clone 'https://github.com/q23isline/study_cakephp.git'
    ```

2. `config/.env.example`をコピーし、`config/.env`として貼り付ける
    - ファイル内の`SECURITY_SALT`の値は適当に書き換える

    ```bash
    cd study_cakephp
    cp config/.env.example config/.env
    ```

3. `config/app_local.example.php`をコピーし、`config/app_local.php`として貼り付ける

    ```bash
    cp config/app_local.example.php config/app_local.php
    ```

4. DB コンテナ起動時に Permission Denied で起動できない状態にならないように権限付与する

    ```bash
    sudo chmod -R ugo+w logs
    ```

5. アプリ立ち上げ

    ```bash
    docker-compose build --no-cache
    docker-compose down -v
    sudo rm -rf vendor
    docker create -it --name tmp study_cakephp-app bash
    docker cp tmp:/var/www/html/vendor $(pwd)
    docker rm -f tmp
    sudo chown -R $(whoami):$(whoami) vendor
    docker-compose up -d
    docker exec -it app bin/cake migrations migrate
    docker exec -it app bin/cake migrations seed
    ```

## 日常的にやること

### システム起動

```bash
docker-compose up -d
```

### システム終了

```bash
docker-compose down
```

## 動作確認

### URL

- <http://localhost>

### Permission Denied対策

- 画面にPermission Deniedエラーが表示される場合、以下を実行
  - 本番環境では適切に権限を付与すべきだがとりあえず動くようにフル権限を付与

```bash
sudo chmod -R 777 tmp
sudo chmod -R ugo+w logs
```

## コード静的解析＆ユニットテスト

```bash
docker exec -it app php composer.phar check
```

### コーディング標準チェック単体実行

```bash
# コーディング標準チェック実行
docker exec -it app ./vendor/bin/phpcs --colors -p src/ tests/
# コーディング標準チェック自動整形実行
docker exec -it app ./vendor/bin/phpcbf --colors -p src/ tests/
```

### 静的分析チェック単体実行

```bash
docker exec -it app ./vendor/bin/phpstan analyse
```

### ユニットテスト単体実行

```bash
# テスト実行
docker exec -it --env XDEBUG_MODE=coverage app ./vendor/bin/phpunit --colors=always
# カバレッジ生成
docker exec -it --env XDEBUG_MODE=coverage app ./vendor/bin/phpunit --coverage-html webroot/coverage
```

- カバレッジ確認URL
  - <http://localhost/coverage/index.html>
