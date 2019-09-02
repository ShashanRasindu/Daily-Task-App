<?php

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


Route::get('/log', function(){
    echo "shashan laravel";
});
//Route::get('/about',function (){
//    return view('about');
//});
//Route::get('/contact', function (){
//    return view('contact');
//});

Route::get('/about', 'PageController@indexabout');

Route::get('/contact', 'PageController@indexcontact');

//Route::get('/task', function () {
//    $data=App\Task::all();
//    return view('task')->with('tasks',$data);
//});

Route::get('/', function () {
    $data=App\Task::all();
    return view('task')->with('tasks',$data);
});

Route::post('/saveTask', 'TaskController@savetask');

Route::get('/ascomleted/{id}', 'TaskController@markascompleted');

Route::get('/notascomleted/{id}', 'TaskController@markasnotcompleted');

Route::get('/detetetask/{id}', 'TaskController@deletetask');

Route::get('/updatetask/{id}', 'TaskController@updatetasksview');

Route::post('/updatetasks', 'TaskController@updatetasks');
