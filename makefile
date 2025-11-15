CONTAINER=testtask-web-1

up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build --no-cache

composer-install:
	docker exec -it $(CONTAINER) composer install --no-interaction --optimize-autoloader

npm-install:
	docker exec -it $(CONTAINER) npm install

npm-build:
	docker exec -it $(CONTAINER) npm run build

fix-permissions:
	docker exec -it $(CONTAINER) sh -c "chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache"

cache-clear:
	docker exec -it $(CONTAINER) php artisan optimize:clear

migrate:
	docker exec -it $(CONTAINER) sh -c "sleep 10 && php artisan migrate --force"

seed:
	docker exec -it $(CONTAINER) php artisan db:seed --force

setup: build up composer-install npm-install fix-permissions migrate cache-clear  npm-build
	@echo "✅ Laravel готовий до роботи"
