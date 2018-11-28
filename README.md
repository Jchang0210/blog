# blog

個人以架設 Blog 的方式學習 Laravel 框架

使用 jenssegers/laravel-mongodb 將資料存進 mongodb

串接tinymce api，讓文章更生動

發文、即時回覆、標籤、Slug、頭像等基本功能

php 需求：

php-mongodb

cd blog

composer install

cp .env.example .env

php artisan key:generate

vi .env 

DB_CONNECTION=mongodb

DB_PORT=27017

cd blog/vendor/laravel/framework/src/Illuminate/Foundation/Auth

vi User.php

修改 use Illuminate\Database\Eloquent\Model >> use Jenssegers\Mongodb\Eloquent\Model as Eloquent

class User extends Eloquent implements 
