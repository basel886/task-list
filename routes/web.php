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
    return view('tasks');
}); 

Route::post('/tasks', function (Request $request) {
    DB::table('tasks')->insert([
        'name' => $request->input('name'),
        'created_at' => now(),
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