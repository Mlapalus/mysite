init-project:
		git config --global user.name "MLapalus"
		git config --global user.email "mlapalus@yahoo.fr"

test-analyze: init-project
		php vendor/phpstan/phpstan/phpstan -n analyze domain src
		php vendor/bin/phpcs
