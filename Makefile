.PHONY: default help init up down sh ps logs clear-db php-lint composer-self-update

default: init up

help: ## 今表示している内容を表示します
	@cat README
	echo "\n## コマンド一覧"
## obtained from https://qiita.com/po3rin/items/7875ef9db5ca994ff762
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

app.env:
	@cp -n app.env.default app.env

app/config/app_local.php:
	@cp -n app/config/app_local.example.php app/config/app_local.php

init: app.env app/config/app_local.php ## ローカル開発に必要なサービスのセットアップを行います
	docker-compose -f docker/docker-compose.yml build
	docker-compose -f docker/docker-compose.yml run --rm -e XDEBUG_MODE=off app composer install --no-interaction

up: ## ローカル開発環境(のサーバー)を立ち上げます
	@docker-compose -f docker/docker-compose.yml up -d

down: ## upで立ち上げたサービスを停止します
	@docker-compose -f docker/docker-compose.yml down

sh: ## 起動中のappサービスに入ってシェルを実行します
	@docker-compose -f docker/docker-compose.yml exec app bash

ps: ## 起動中のサービスの一覧を表示します
	@docker-compose -f docker/docker-compose.yml ps

logs: ## 起動中のサービスのlogを表示します
	@docker-compose -f docker/docker-compose.yml logs -f

clear-db: down ## DBサービスのデータを削除します
	@docker-compose -f docker/docker-compose.yml rm database
	rm -rf docker/mysql/mount/var/lib/mysql/*

composer-self-update: ## appコンテナ内で利用するComposerのバージョンを更新します
	bin/composer-update.sh
