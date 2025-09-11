web: php artisan optimize:clear && php artisan migrate --force --seed && php artisan serve --host 0.0.0.0 --port $PORT
worker: php artisan queue:work --tries=3 --sleep=3 --timeout=90

