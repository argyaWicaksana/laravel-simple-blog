@extends('layouts.main')

@section('kotak')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-4">{{ $contents->title }}</h2>
                @if ($contents->image)
                    <div style="max-height: 400px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $contents->image) }}" class="card-img-top" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?random" class="card-img-top" alt="...">
                @endif
                <small class="text-muted">
                    By. <a href="/news?author={{ $contents->author->slug }}"
                        class="text-decoration-none">{{ $contents->author->name }}</a> in
                    <a href="/news?category={{ $contents->category->slug }}"
                        class="text-decoration-none">{{ $contents->category->name }}</a>
                </small>
                <article class="my-3">
                    {!! $contents->body !!}
                </article>
                <a href="/news">Kembali</a>

            </div>
        </div>
    </div>
@endsection
