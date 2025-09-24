#!/bin/bash

echo "Starting Scaffolding setup..."

folderPath=$(pwd)
folderName=$(basename "$folderPath")
echo "Current Folder Name: $folderName"
echo

read -p "Enter App Domain ($folderName.test): " APP_DOMAIN
read -p "Enter The Database Name ($folderName): " DB_DATABASE
read -p "Enter The Database Username (root): " DB_USERNAME
read -p "Enter The Database Host (127.0.0.1): " DB_HOST
read -s -p "Enter The Database Password (empty if none): " DB_PASSWORD
echo

APP_DOMAIN=${APP_DOMAIN:-$folderName.test}
DB_DATABASE=${DB_DATABASE:-$folderName}
DB_USERNAME=${DB_USERNAME:-root}
DB_HOST=${DB_HOST:-127.0.0.1}

echo "APP_DOMAIN: $APP_DOMAIN"
echo "DB_DATABASE: $DB_DATABASE"
echo "DB_USERNAME: $DB_USERNAME"
echo "DB_PASSWORD: $DB_PASSWORD"
echo "DB_HOST: $DB_HOST"
echo

echo "Copying .env.example file to .env file"
cp .env.example .env

# Replace values in .env
echo "Setting up .env file"
sed -i "s|APP_DOMAIN=.*|APP_DOMAIN=$APP_DOMAIN|" .env
sed -i "s|DB_DATABASE=.*|DB_DATABASE=$DB_DATABASE|" .env
sed -i "s|DB_USERNAME=.*|DB_USERNAME=$DB_USERNAME|" .env
sed -i "s|DB_HOST=.*|DB_HOST=$DB_HOST|" .env

if grep -q "^DB_PASSWORD=" .env; then
    sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=$DB_PASSWORD|" .env
else
    echo "DB_PASSWORD=$DB_PASSWORD" >> .env
fi

echo "Installing composer dependencies"
composer install

echo "Setting up Application Key"
php artisan key:generate

echo "Migrating the database"
php artisan migrate:fresh

echo "Seeding the database"
php artisan db:seed

echo "Setting storage link"
php artisan storage:link

echo "Installing npm dependencies"
npm install

echo "Compiling assets"
npm run build

# Create the 'installed' flag file with timestamp
mkdir -p storage
ldt=$(date "+%Y-%m-%d %H:%M:%S")
echo "Installer successfully INSTALLED on $ldt" > "$folderPath/storage/installed"

echo "Cleaning up"
composer app:clear
composer dump-autoload

echo "Application installed successfully and is ready to use."
echo "APP_URL: http://$APP_DOMAIN"
