# Installation

- clone or download project
```bash
git clone https://github.com/Majkl28/laravel.git 
```
- install dependencies using Composer
```bash
composer install
```
- create Database for project
- create and configure .env file in root directory (use .env.example as example)
- create laravel key
```bash
php artisan key:generate
```
- run migrations
```bash
php artisan migrate:fresh
```
- parse and import data
```bash
php artisan data:import
```
- To make images accessible from the web, create link from public/storage to storage/app/public
```bash
php artisan storage:link
```
