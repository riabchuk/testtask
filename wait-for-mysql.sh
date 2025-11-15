#!/bin/sh
set -e

host="$1"
shift
until php -r "new PDO('mysql:host=$host;port=3306;dbname=$DB_DATABASE', '$DB_USERNAME', '$DB_PASSWORD');" 2>/dev/null; do
  echo "Waiting for MySQL at $host..."
  sleep 2
done

exec "$@"
