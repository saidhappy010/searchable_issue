# Setup  Project Laravel 

Clone Repository
```sh
https://github.com/saidhappy010/searchable_issue.git
```
```sh
cd searchable_issue
```

Create the .env file
```sh
cp .env.example .env
```

Update environment variables from .env file
```dosini
DB_CONNECTION=mysql
DB_HOST=database_searchable
DB_PORT=3306
DB_DATABASE=searchable
DB_USERNAME=searchable
DB_PASSWORD=searchable_password
```
Upload project containers
```sh
docker-compose up -d
```

Install project dependencies
```sh
npm install
composer install
```
access to the container
```sh
docker-compose exec app_searchable bash
```
run all of outstanding migrations
 ```sh
php artisan migrate:fresh --seed
```
