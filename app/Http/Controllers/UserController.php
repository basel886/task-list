<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => time() . '@test.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        DB::table('users')->where('id', $id)->update([
            'name' => $request->input('name'),
            'updated_at' => now(),
        ]);

        return redirect('/users');
    }
}