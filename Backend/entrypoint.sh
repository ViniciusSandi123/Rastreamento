#!/bin/bash

echo "⏳ Aguardando o banco de dados iniciar..."

until mysql -h db -u root -p1234 -e "SHOW DATABASES;" > /dev/null 2>&1; do
  echo "Ainda não conectado ao MySQL... aguardando..."
  sleep 3
done

echo "Conectado ao MySQL com sucesso!"

php artisan migrate --force
php artisan importar:mock

php artisan serve --host=0.0.0.0 --port=8000
