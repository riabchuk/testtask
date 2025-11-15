#!/bin/sh
set -e

host="$1"
shift
until php -r "new PDO('mysql:host=db;port=3306;dbname=testtask', 'root', 'password');" 2>/dev/null; do
  echo "Waiting for MySQL at $host..."
  sleep 10
done

exec "$@"
