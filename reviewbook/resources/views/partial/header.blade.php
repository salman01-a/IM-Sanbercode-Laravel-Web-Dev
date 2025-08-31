<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">ReviewBook</h1><span>.</span>
      </a>  

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/books">Books</a></li>
          <li><a href="/genre">Genre</a></li>
          <li><a href="/profile">Profile</a></li>
          @guest
          <li><a href="/login">Login</a></li>
          @endguest
          @auth
        </li><form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn">Logout</button>
        </form>
        <li>
          @endauth
        </ul> 
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>