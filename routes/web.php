<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    $name = "Basel Salem";
    $departments = [
        1 => 'Technical',
        2 => 'Financial',
        3 => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
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