
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('asdf','workersController@index');

Route::post('asdf','workersController@form');

Route::post('deleteWorker','workersController@deleteWorker');


Route::post('deleteNote','workersController@deleteNote');



/*Route::post('deleteNote',function(){
    return "asd";
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('update_points','TestController@updatePoints');
Route::post('deleting','TestController@delete');

/*Route::get('testing',function(){

    return Cache::put('cachekey','im in the cache',1);
    return Cache::get('cachekey');

});*/
