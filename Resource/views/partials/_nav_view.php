<body>
  <div class="">
    <!-- header  -->
    <header>
      <div class="mobile-nav">
        <button class="burger">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search.." name="search" />
        </div>
      </div>
      <?php

      use App\Core\Session;

      if (!Session::get('user_id')):
      ?>
        <a class="my-5 bg-primary py-2 px-4 d-flex rounded-start-2 justify-content-center" href="/login">
          Login/Register
        </a>
      <?php
      else:
      ?>
        <a class="my-5 bg-primary py-2 px-4 d-flex rounded-start-2 justify-content-center" href="/admin">
          Dashboard
        </a>
      <?php
      endif;
      ?>
      <nav>
        <h2>Browse</h2>

        <ul class="nav-links">
          <li class="<?= getUrl("/") ? "active-link" : "" ?>">
            <i class="fa-solid fa-layer-group"></i>
            <a href="./">Discover</a>
          </li>
          <li class="<?= getUrl("/movies") ? "active-link" : "" ?>">
            <i class="fa-solid fa-video"></i>
            <a href="./movies">Movies</a>
          </li>
          <li class="<?= getUrl("/series") ? "active-link" : "" ?>">
            <i class="fa-solid fa-tv"></i>
            <a href="./series">Tv Series</a>
          </li>
          <li class="<?= getUrl("/actors") ? "active-link" : "" ?>">
            <i class="fa-solid fa-users"></i>
            <a href="./actors">People</a>
          </li>
        </ul>
      </nav>
    </header>
    <div id="mobile-menu" class="overlay">
      <a class="close">&times;</a>
      <div class="overlay-content">
        <div class="active-link-mobile">
          <i class="fa-solid fa-layer-group"></i>
          <a href="/">Discover</a>
        </div>
        <div>
          <i class="fa-solid fa-video"></i>
          <a href="/movies.php">Movies</a>
        </div>
        <div>
          <i class="fa-solid fa-tv"></i>
          <a href="/tv.php">TvSeries</a>
        </div>
        <div>
          <i class="fa-solid fa-users"></i>
          <a href="/people.php">People</a>
        </div>
      </div>
    </div>