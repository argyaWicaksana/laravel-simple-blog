@extends('dashboard.layouts.main')

@section('kotak')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <h2 class="mb-4">{{$post->title}}</h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to list of my posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?random" class="card-img-top mt-3" alt="...">
                @endif
                <article class="my-3">
                    {!!$post->body!!}
                </article>
            </div>
        </div>
    </div>
@endsection