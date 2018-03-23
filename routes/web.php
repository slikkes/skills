
<?php
use App\Worker;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('workerskills', function(){
    return view('asdf');
});

Route::get('testing', function(){
    return view('testing');
});


Route::get('workers','workersController@workerData');
Route::post('workers','workersController@workerChange');



Route::get('update_points','TestController@updatePoints');



Route::prefix('commentApi')->group(function(){

    Route::resource('comments','CommentsController');

    Route::put('/comments/{comment}/toggleFavourite','CommentsController@toggleFavourite');
});