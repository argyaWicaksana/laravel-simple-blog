<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $author)
    {
        // return view('user',[
        return view('news',[
            'title' => $author->name,
            'header' => "Post by Author: $author->name",
            // 'contents' => $author->post
            'contents' => $author->post->load('category', 'author')
        ]);
    }
}
