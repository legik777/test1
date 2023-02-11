#-----------------------------------------------------------
# Basic Commands
#-----------------------------------------------------------

up:
	docker-compose up -d

down:
	docker-compose down

status:
	docker-compose ps
build-docker:
	docker-compose up -d --build

#-----------------------------------------------------------
# Initial installation
#-----------------------------------------------------------

init: build-docker laravel-env laravel-composer-install laravel-key laravel-migrate

#-----------------------------------------------------------
# Laravel Commands
#-----------------------------------------------------------

php-fpm:
	docker-compose exec php bash

laravel-env:
	cp ./src/laravel/.env.example ./src/laravel/.env

laravel-composer-install:
	docker-compose exec php composer install

laravel-key:
	docker-compose exec php php artisan key:generate

laravel-migrate:
	docker-compose exec php php artisan migrate --seed

#-----------------------------------------------------------
# Vuejs Commands
#-----------------------------------------------------------


no:
	docker-compose exec npm bash \
		npm run dev
npm-run-dev: 
	npm run dev
npm-run-build:
	npm run build
	
	
	