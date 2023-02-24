<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogMiddleware;
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
Route::get('/hello','\App\Http\Controllers\HelloController@index');
Route::get('/hello/view','HelloController@view');
Route::get('/hello/list', 'HelloController@list');
Route::get('/view/escape', 'ViewController@escape');
Route::get('/view/comment', 'ViewController@comment');
Route::get('/view/if', 'ViewController@if');
Route::get('/view/isset/{id?}', 'ViewController@isset');
Route::get('/view/switch', 'ViewController@switch');
Route::get('/view/while', 'ViewController@while');
Route::get('/view/for', 'ViewController@for');
Route::get('/view/foreach_assoc', 'ViewController@foreach_assoc');
Route::get('/view/foreach_loop', 'ViewController@foreach_loop');
Route::get('/view/forelse', 'ViewController@forelse');
Route::get('/view/style_class', 'ViewController@style_class');
Route::get('/view/checked', 'ViewController@checked');
Route::get('/view/master', 'ViewController@master');
Route::get('/view/comp', 'ViewController@comp');
Route::get('/view/list', 'ViewController@list');
Route::get('/route/param/{id?}', 'RouteController@param')
->name('param');
Route::get('/route/enum_param/{category}','RouteController@enum_param');
Route::get('/ctrl/header', 'CtrlController@header');
Route::get('/ctrl/outJson', 'CtrlController@outJson');
Route::get('/ctrl/outCsv', 'CtrlController@outCsv');
Route::get('/ctrl/outFile', 'CtrlController@outFile');
Route::get('/ctrl/plain', 'CtrlController@plain');
Route::get('/ctrl/outImage', 'CtrlController@outImage');
Route::get('/ctrl/redirectBasic', 'CtrlController@redirectBasic');
Route::get('/ctrl/index', 'CtrlController@index');
Route::get('/ctrl/form', 'CtrlController@form');
Route::POST('/ctrl/result', 'CtrlController@result');
Route::get('/ctrl/upload', 'CtrlController@upload');
Route::POST('/ctrl/uploadfile', 'CtrlController@uploadfile');
Route::group(['middleware' => ['debug']], function() {
    Route::get('/ctrl/middle', 'CtrlController@middle');
});
Route::get('/state/view', 'StateController@recCookie');
Route::get('/state/readCookie', 'StateController@readCookie');
Route::get('/record/find', 'RecordController@find');
Route::get('/record/where', 'RecordController@where');
Route::get('/record/hasmany', 'RecordController@hasmany');

Route::get('/save/create', 'SaveController@create');
Route::post('/save', 'SaveController@store');
Route::get('/save/{id}/edit', 'SaveController@edit')
->where('id', '[0-9]+');
Route::patch('/save/{id}', 'SaveController@update')
->where('id', '[0-9]+');
Route::get('/save/{id}', 'SaveController@show')
->where('id', '[0-9]+');
Route::delete('/save/{id}', 'SaveController@destroy')
->where('id', '[0-9]+');
