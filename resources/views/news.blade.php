@extends('layouts.main')

@section('kotak')
    <h2 class="mb-5 text-center">{{$header  }}</h2>
    {{-- cek apakah $contents isinya tidak kosong --}}
    @if ($contents->count()) 
        <div class="card mb-3">
            @if ($contents[0]->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $contents[0]->image) }}" class="card-img-top" alt="...">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?random" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <h3 class="card-title mb-0">
                    <a href="/news/{{$contents[0]->slug}}" class="text-dark text-decoration-none card-title">{{$contents[0]->title}}</a>
                </h3>
                <small class="text-muted">
                    By. <a href="/news?author={{$contents[0]->author->slug}}" class="text-decoration-none">{{$contents[0]->author->name}}</a> in 
                    <a href="/news?category={{$contents[0]->category->slug}}" class="text-decoration-none">{{$contents[0]->category->name}}</a>
                    {{$contents[0]->created_at->diffForHumans() }}
                </small>
              <p class="card-text mt-2">{{$contents[0]->excerpt }}</p>
              <a class="btn btn-primary" href="/news/{{$contents[0]->slug}}">Read More...</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($contents->skip(1) as $content)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute bg-dark py-2 px-3 bg-success bg-opacity-75">
                            <a href="/news?category={{$content->category->slug}}" class="text-decoration-none text-white">{{$content->category->name}}</a>
                        </div>
                        @if ($content->image)
                            <div style="max-height: 400px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $content->image) }}" class="card-img-top" alt="...">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/500x400?random" class="card-img-top" alt="...">
                        @endif

                        <div class="card-body">
                        <h5 class="card-title">
                            <a href="/news/{{$content->slug}}" class="text-decoration-none">{{$content->title}}</a>
                        </h5>
                        <small class="card-text text-muted">
                            By. <a href="/news?author={{$content->author->slug}}" class="text-decoration-none">{{$content->author->name}}</a> 
                            {{$contents[0]->created_at->diffForHumans() }}
                        </small>
                        <p class="card-text mt-2">{{$content->excerpt}}</p>
                        <a href="/news/{{$content->slug}}" class="btn btn-primary">Read More...</a>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-center fs-2 text-dark text-opacity-50">News Not Found</p>
    @endif

    {{$contents->links()  }}
@endsection