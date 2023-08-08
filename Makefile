setup:
	@make build
	@make up
	@make composer-update
exec:
	docker exec -it laravel-fpm-1  bash
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec laravel-fpm bash -c "composer update"
data:
	docker exec laravel-fpm-1  bash -c "php artisan migrate"
	docker exec laravel-fpm-1  bash -c "php artisan db:seed"
