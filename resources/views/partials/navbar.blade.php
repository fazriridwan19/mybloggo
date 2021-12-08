<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">MyBlog.go</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-link <?= ($judul=="Blog") ? 'active' : '' ?> " aria-current="page" href="/posts">Blog</a>
        <a class="nav-link <?= ($judul=="Categories") ? 'active' : '' ?> " aria-current="page" href="/categories">Categories</a>
        <a class="nav-link <?= ($judul=="About us") ? 'active' : '' ?> " aria-current="page" href="/about">About us</a>
      </ul>
      @auth
        <li class="nav-item dropdown">
          <a class="dropdown-toggle text-decoration-none text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome Back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
      @else
        <a href="/login" class="btn btn-outline-light" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</a>
      @endauth
    </div>
  </div>
</nav>
