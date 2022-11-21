<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;

// use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $title='';
        if (request('category')) {
            $category = category::firstWhere('slug', request('category'));
            $title = "in $category->name";
        }elseif (request('author')) {
            $author = User::firstWhere('slug', request('author'));
            $title = "by $author->name";
        }

        return view('news', [
            'title' => 'News',
            // 'contents' => post::all()
            'header' => "All Posts $title",
            // 'contents' => post::latest()->get() //mengurutkan dari yang terakhir
            // 'contents' => post::with(['author', 'category'])->latest()->get() //with itu kayak join di mysql, get itu buat ngambil data
            // with juga biar mengatasi n+1 problem
            'contents' => post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(post $post)
    {
        return view('content', [
            'title' => $post->title,
            'contents' => $post
        ]);
    }
}
