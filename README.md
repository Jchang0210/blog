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
vi .env DB_CONNECT=mongodb


cd blog/vendor/laravel/framework/src/Illuminate/Foundation/Auth
vi User.php

<?php
namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Authenticatable;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
}
