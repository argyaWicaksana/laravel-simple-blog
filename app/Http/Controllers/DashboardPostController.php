<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->image->store('post-images');

        $validatedData = $this->validate($request, [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'body' => 'required',
        'image' => 'image|file|max:5200'
        ]);

        if ($request->image) {
            $validatedData['image'] = $request->image->store('post-images');
        }

        $validatedData['slug'] = Str::of($validatedData['title'])->slug('-');
        $tmp = $validatedData['slug'];
        for ($i=0; post::where('slug', $tmp)->exists() ; $i++) { 
            $tmp = $validatedData['slug'] . "-$i";
        }

        $validatedData['slug'] = $tmp;
        $validatedData['excerpt'] = Str::of(strip_tags($validatedData['body']))->limit(200);
        $validatedData['user_id'] = auth()->user()->id;

        post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        // if($post->author->id !== auth()->user()->id) {
        //     abort(403);
        // }
        $this->authorize('view', $post); //nyambung ke method view di postPolicy.php
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.posts.edit',[
            'categories' => category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $validatedData = $this->validate($request, [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'body' => 'required',
        'image' => 'image|file|max:5200'
        ]);

        if ($validatedData['title'] != $post->title) { // klo judul yg baru gk sama dengan judul yg lama
            $validatedData['slug'] = Str::of($validatedData['title'])->slug('-');
            $tmp = $validatedData['slug'];
            for ($i=0; post::where('slug', $tmp)->exists() ; $i++) { 
                $tmp = $validatedData['slug'] . "-$i";
            }
            $validatedData['slug'] = $tmp;
        }

        if ($request->image) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $validatedData['image'] = $request->image->store('post-images');
        }

        $validatedData['excerpt'] = Str::of(strip_tags($validatedData['body']))->limit(200);
        $validatedData['user_id'] = auth()->user()->id;

        post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }
}
