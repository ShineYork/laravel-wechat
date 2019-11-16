<h1 align="center"> laravel-wechat </h1>

<p align="center"> a shineyork laravel wechat.</p>

## 描述

这是基于laravel框架编辑的,微信公众号的组件

## 安装

```shell
$ composer require shineyork/laravel-wechat:dev-master
```


## 配置文件发布

```shell
php artisan vendor:publish --provider="ShineYork\LaravelWechat\WeChatServiceProvider"
```

## 配置

Laravel 应用
在 config/app.php 注册 ServiceProvider 和 Facade (Laravel 5.5 无需手动注册)
```
'providers' => [
    // ...
    ShineYork\LaravelWechat\WeChatServiceProvider::class,
]
```
然后在浏览器中访问的路由如下 http://localhost/swechat
```
Route::any('/', 'WeChatController@index')->middleware('swechat.check');
```
