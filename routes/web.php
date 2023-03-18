<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/home', [HomeController::class])->name('home');
Route::group(['middleware' => 'auth'], function(){
Route::get('/','App\Http\Controllers\ProductsController@index');
Route::get('cart','App\Http\Controllers\ProductsController@cart');
Route::get('checkout','App\Http\Controllers\ProductsController@checkout');
Route::get('add-to-cart/{id}','App\Http\Controllers\ProductsController@addToCart');
Route::patch('update-cart','App\Http\Controllers\ProductsController@update');
Route::delete('remove-from-cart','App\Http\Controllers\ProductsController@remove');
Route::get('tasks', 'TaskController@index'); //afisare lista sarcini pe pagina de start
Route::resource('tasks', 'TaskController');// Ruta de resurse va genera CRUD URI
});

?>
