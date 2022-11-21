@extends('dashboard.layouts.main')

@section('kotak')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>

  <div class="col-lg-8">
      <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" 
          required value="{{old('title', $post->title) }}">
          @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Category</label>
          <select class="form-select" aria-label="Default select example" name="category_id">
            @foreach ($categories as $category)
              @if (old('category_id', $post->category_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif

            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="imagePreview()">
          @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="image-preview img-fluid mt-3 col-sm-5">
          @else
            <img class="image-preview img-fluid mt-3 col-sm-5">
              
          @endif
          @error('image')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Text</label>
          <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
          <trix-editor input="body"></trix-editor>
          @error('body')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
  <script>
      document.addEventListener('trix-file-accept', function(e) {
          e.preventDefault();
      })

      function imagePreview() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.image-preview')

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
      }
  </script>
  
@endsection