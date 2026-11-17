<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/about', function () {
    $name = "Basel Salem";
    $departments = [
        1 => 'Technical',
        2 => 'Financial',
        3 => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
}); 

Route::post('/tasks', function (Request $request) {
    DB::table('tasks')->insert([
        'name' => $request->input('name'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/tasks');
});

Route::post('/delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect('/tasks');
});

Route::post('/edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

Route::post('/update', function (Request $request) {
    $id = $request->input('id');
    DB::table('tasks')->where('id', $id)->update([
        'name' => $request->input('name'),
        'updated_at' => now(),
    ]);

    return redirect('/tasks');
});

Route::post('/about', function (Request $request) {
    $name = $request->input('name');
    $departments = [
        1 => 'Technical',
        2 => 'Financial',
        3 => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
});