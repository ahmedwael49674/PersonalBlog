# PersonalBlog
 ![alt text](https://github.com/ahmedwael49674/PersonalBlog/blob/master/diagrams/view.png)

## Summary

It's a simple personal blog system that allow admin to store Categories and Posts using dashboard and allow the users to display it not only that this system contains: 

- Complete CRUD functionality over both Categories and Posts.
- validation function over all the system inputs.
- pagination for showing Companies/Posts list.
- The ability to switch between (English, Arabic ) languages considering the direction (ltr, rtl).
- PHPUnit test over all the CRUD functionality of both Categories and Posts.

## Used technologies

1. Laravel
2. adminbit

## Description

### ERD  diagram 

 ![alt text](https://github.com/ahmedwael49674/PersonalBlog/blob/master/diagrams/erd.png)

 1. users: store all the user's data within the system.
 2. Categories: store all the category data.
 3. Posts: store posts data with foreign category_id which is a reference to companies table.

## How to run?

1. git clone the project
2. composer install
3. create the database
4. copy .env.exmple to .env and change database username and password
5. run the migrations (php artisan migrate)
6. run the seeder (php artisan db:seed)
7. run the project (php artisan serve)
8. visit (http://localhost) and use "admin@admin.com" as email and "password" as password

Or using docker:

1. git clone the project
2. docker run --rm -v $(pwd):/app composer/composer install
3. docker-compose up -d --build
4. docker-compose exec app bash
5. copy .env.exmple to .env
6. run the migrations (php artisan migrate)
7. run the seeder (php artisan db:seed)
8. visit (http://localhost) and use "admin@admin.com" as email and "password" as password

Note: 

1. To access the dashboard use (/dashboard) url
2. Runnig seeder will create user with (email: admin@admin.com, password: password) , eight categories and 13 post for each category
3. Use vendor/bin/phpunit command to run the tests​
