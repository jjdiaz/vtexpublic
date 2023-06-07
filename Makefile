CMD_ON_PROJECT = docker-compose run php
PHP_RUN = $(CMD_ON_PROJECT) php

args = `arg="$(filter-out $@,$(MAKECMDGOALS))" && echo $${arg:-${1}}`

.PHONY: php-run
php-run:
	$(PHP_RUN) -d memory_limit=-1 src/Command/${args}

.PHONY: cache
cache:
	$(CMD_ON_PROJECT) rm -rf var/cache && $(PHP_RUN) bin/console cache:warmup

composer.lock: composer.update
	$(PHP_RUN) -d memory_limit=-1 /usr/local/bin/composer update

vendor: composer.install
	$(PHP_RUN) -d memory_limit=-1 /usr/local/bin/composer insta

.PHONY: composer-require
composer-require:
	$(PHP_RUN) -d memory_limit=-1 /usr/local/bin/composer require ${args}

.PHONY: composer-remove
composer-remove:
	$(PHP_RUN) -d memory_limit=-1 /usr/local/bin/composer remove ${args}

.PHONY: console
console:
	$(CMD_ON_PROJECT) bin/console ${args}

.PHONY: console-debug
console-debug:
	$(PHP_RUN) -dxdebug.remote_enable=1 -dxdebug.remote_autostart=On -dxdebug.idekey=PHPSTORM -dxdebug.remote_host=localhost bin/console ${args}

.PHONY: bash
bash:
	$(CMD_ON_PROJECT) bash

.PHONY: run-test
run-test:
	$(PHP_RUN) -dxdebug.remote_enable=1 -dxdebug.remote_autostart=On -dxdebug.idekey=PHPSTORM -dxdebug.remote_host=localhost -d memory_limit=-1  bin/phpunit tests/Command/${args}