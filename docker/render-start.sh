#!/usr/bin/env sh
set -eu

render_port="${PORT:-10000}"

sed -ri "s/^Listen [0-9]+$/Listen ${render_port}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${render_port}>/" /etc/apache2/sites-available/000-default.conf

mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache

php artisan optimize:clear

attempt=1
max_attempts=10
until php artisan migrate --force; do
    if [ "$attempt" -ge "$max_attempts" ]; then
        echo "Database migration failed after ${max_attempts} attempts."
        exit 1
    fi

    echo "Database is not ready. Retrying migration in 5 seconds (${attempt}/${max_attempts})..."
    attempt=$((attempt + 1))
    sleep 5
done

php artisan db:seed --class=GenreSeeder --force
php artisan db:seed --class=TemplateSeeder --force

php artisan optimize

exec apache2-foreground
