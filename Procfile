# Servicio web (app Laravel + migraciones + seeds + serve)
web: php -r "is_dir('storage/database')||mkdir('storage/database',0777,true);" && php -r "file_exists('storage/database/database.sqlite')||touch('storage/database/database.sqlite');" && php artisan migrate --force --seed && php artisan serve --host 0.0.0.0 --port $PORT

# Servicio worker (procesa colas con conexión 'database')
worker: php artisan queue:work --tries=3 --sleep=3 --timeout=90
