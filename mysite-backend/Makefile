.PHONY: tests

prepare-dev:
	composer install --prefer-dist
	php bin/console doctrine:database:drop --if-exists -f --env=dev
	php bin/console doctrine:database:create --env=dev
	php bin/console doctrine:schema:update -f --env=dev
	php bin/console doctrine:fixtures:load -n --env=dev

prepare-test:
	composer install --prefer-dist
	php bin/console cache:clear --env=test
	php bin/console doctrine:database:drop --if-exists -f --env=test
	php bin/console doctrine:database:create --env=test
	php bin/console doctrine:schema:update -f --env=test
	php bin/console doctrine:fixtures:load -n --env=test

tests:
	php bin/phpunit
test-watch:
	php vendor/bin/phpunit-watcher watch


test-analyze:
		php vendor/phpstan/phpstan/phpstan -n analyze domain src
		php vendor/bin/phpcs