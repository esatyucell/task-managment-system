<?php 

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Route;

// Ana sayfa
Route::add('', 'Front\HomeController@index');

// Örnek sayfa
Route::add('example', 'Front\ExampleController@index');

// Görevler
Route::add('tasks', 'Front\TaskController@index');
Route::add('tasks/create', 'Front\TaskController@create');
Route::add('tasks/edit/([0-9]+)', 'Front\TaskController@update');
Route::add('tasks/delete/([0-9]+)', 'Front\TaskController@delete');

// Auth Routes
Route::add('login', 'Front\AuthController@login');
Route::add('register', 'Front\AuthController@register'); // GET ve POST

// Logout
Route::add('logout', 'Front\AuthController@logout'); 

// URI'yi al
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Eğer ana sayfa ise boş string
if ($uri === '') {
    $uri = '';
}

// Route'u çalıştır
Route::dispatch($uri);
