<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function(){
    return redirect()->route(('tasks.index'));
});

Route::get('/', function() {
    return view('index', [
        'tasks' => Task::latest()->get()
        #'tasks' => \App\Models\task::latest()->where('completed',true)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')
    ->name('tasks.create');

Route::get('/{id}', function ($id)  {
    return view('show',[
        'task'=> Task::findOrFail($id)]
    );
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
    $data = $request->validate([
        'title'=>'required|max:255',
        'description' => 'required',
        'long_description'=> 'required'
    ]);
    $task = new Task();
})->name('tasks.store');

/*
Route::get('/', function () {
    return view('index', [
        'name' => 'Ansel' #name inside index.blade.php
    ]);
});

#if 127.0.0.1:8000/hello show 'Hello'
Route::get('/xxx',function(){
    return 'Hello';
})->name('hello');

#redirect to some url
Route::get('/hallo', function(){
    return redirect()->route('hello');
});

#add dynamic routes
Route::get('/greet/{name}', function ($name){
    return 'Hello ' . $name . '!';
});

#if another url call
Route::fallback(function(){
    return 'Still got somewhere!';
});
*/
