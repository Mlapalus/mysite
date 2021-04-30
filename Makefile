isDocker := $(shell docker info > /dev/null 2>&1 && echo 1)

user := $(shell id -u)
group := $(shell id -g)

ifeq ($(isDocker), 1)
	dc := USER_ID=$(user) GROUP_ID=$(group) docker-compose
	de := docker-compose exec
	dr := $(dc) run --rm
	drtest := $(dc) run --rm
	sy := $(de) symfony console
	node := $(dr) node
	php := $(dr) --no-deps php
else
sy := symfony console
node :=
php :=
endif


.DEFAULT_GOAL := help
.PHONY: help
help: ## Affiche cette aide
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: install
install: vendor/autoload.php public/assets/manifest.json ## Install les différentes dépendances
	APP_ENV=prod APP_DEBUG=0 $(php) composer install --no-dev --optimize-autoloader
	make migrate
	APP_ENV=prod APP_DEBUG=0 $(sy) cache:clear
	$(sy) cache:pool:clear cache.global_clearer

.PHONY: build docker
build-docker:
	$(dc) pull --ignore-pull-failures
	$(dc) build php-clean-mysite
	$(dc) build mysql-clean-mysite-db
	$(dc) build phpmyadmin-mysite
	$(dc) build react-clean-mysite

.PHONY: dev
dev:  ## Lance le serveur de développement
	$(dc) up -d

.PHONY: migration
migration: vendor/autoload.php ## Génère les migrations
	$(sy) make:migration

.PHONY: migrate
migrate: vendor/autoload.php ## Migre la base de données (docker-compose up doit être lancé)
	$(sy) doctrine:migrations:migrate -q

.PHONY: test
test: vendor/autoload.php node_modules/time ## Execute les tests
	$(drtest) phptest bin/console doctrine:schema:validate --skip-sync
	$(drtest) phptest vendor/bin/phpunit
	$(node) yarn run test

.PHONY: tt
tt: vendor/autoload.php ## Lance le watcher phpunit
	$(drtest) phptest bin/console cache:clear --env=test
	$(drtest) phptest vendor/bin/phpunit-watcher watch --filter="nothing"
