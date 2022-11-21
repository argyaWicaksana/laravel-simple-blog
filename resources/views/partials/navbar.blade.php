@php
    function active($var)
    {
      return Request::is($var)? 'active' : '';
    }
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ active('/') }}" href="/">Home</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{ active('login') }}" href="/login">Login</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{ active('news') }}" href="/news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ active('categories') }}" href="/categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item">

          {{-- search --}}
          <form class="d-flex" role="search" action="/news">
            @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
            @elseif (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <input class="form-control me-2" type="search" placeholder="Search" name="search" value="{{request('search')}}">
            <button class="btn btn-outline-primary btn-dark" type="submit">Search</button>
          </form>

        </li>
        <li class="nav-item">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle ms-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <a href="/login" class="btn btn-outline-primary btn-dark ms-4"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          @endauth
        </li>
      </ul>


    </div>
  </div>
</nav>