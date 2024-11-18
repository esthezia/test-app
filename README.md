## Test App

Requires **PHP 8.2.x**.

To get started, configure your database connection in the `.env` file, then open the console and run:

```
composer install

php artisan migrate
php artisan db:seed
```

Test users (**2** users, **3** agents, **1** admin):

```
user1@yahoo.com / abc123!
user2@yahoo.com / abc123!
agent1@yahoo.com / abc123!
agent2@yahoo.com / abc123!
agent3@yahoo.com / abc123!
admin@yahoo.com / abc123!
```

Enjoy! :)
