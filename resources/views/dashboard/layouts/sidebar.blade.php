@php
    $active = fn($var)=>Request::is($var)? 'active' : '';
@endphp

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ $active('dashboard') }}" aria-current="page" href="/dashboard">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $active('dashboard/posts*') }}" href="/dashboard/posts">
          <span data-feather="file-text" class="align-text-bottom"></span>
          My Posts
        </a>
      </li>
    </ul>
    @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="/dashboard/categories" class="nav-link {{ $active('dashboard/categories*') }}">
            <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories</a>
        </li>
      </ul>
    @endcan

  </div>
</nav>