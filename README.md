# Forum

## Installation Steps

Copy .env.example file and change the name to .env, then edit and set your Database config
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

```
composer install

npm install

npm run dev
```

Generate encryption key
```
php artisan key:generate
```

Run migrations and seeder to create user, Post, Responses
```
php artisan migrate --seed
```


You can use this user o check the DB, all user has the password: "password":

- **Email:** root@forum.com **Password:** password

if is necessary run the command to enable the storage

```
php artisan storage:link
``` 
