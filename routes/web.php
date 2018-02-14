
<?php
use Illuminate\Http\Request;
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

Route::get('asdf','mokasController@index');

Route::post('asdf','mokasController@form');
/*Route::post('asdf',function(Request $request){
    return $request->all();
});*/

Route::get('testing',function(){

    //return Cache::put('cachekey','im in the cache',1);
    //return Cache::get('cachekey');

});

