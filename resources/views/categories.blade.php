@extends('layouts.main')

@section('kotak')
    <div class="container">
        <div class="row">
            @foreach ($contents as $content)
                <div class="col-md-4">
                    <a href="/news?category={{ $content->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/400x400?random" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5
                                    class="card-title text-center text-center p-4 flex-fill bg-dark bg-success bg-opacity-75">
                                    {{ $content->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
