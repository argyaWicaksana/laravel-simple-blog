<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
        'name' => 'required|unique:users|max:255|min:3',
        'email' => 'required|unique:users|email:dns',
        'password' => 'required|max:255|min:8'
        ]);

        //cara mengenkripsi password ada 2
        // $validatedData['password'] = bcrypt($validatedData['password']); //pakai bcrypt
        $validatedData['password'] = Hash::make($validatedData['password']); //pakai hash

        $validatedData['slug'] = Str::slug($validatedData['name']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
