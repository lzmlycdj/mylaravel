<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/
/* 这是 Laravel 框架内为数不多的直接 new 出来的对象，也就是框架的应用对象，
此对象继承于 Illuminate\Container\Container （容器），
所以， Laravel 框架中的容器对象一般就是指的 Illuminate\Foundation\Application 对象（因在实际运行过程中，
不会直接 new Illuminate\Container\Container 的）。 */

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/
// 这里的singleton是 public/index.php 中，用 Illuminate\Contracts\Http\Kernel 能注入后取出 App\Http\Kernel 的关键。
// https://www.cnblogs.com/fengzmh/p/10289381.html
// singleton和bind都是返回一个类的实例，不同的是singleton是单例模式，而bind是每次返回一个新的实例。


$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
