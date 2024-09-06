<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Discover</title>
    <link rel="stylesheet" href="./public/css/style.css" />
    <script
      src="https://kit.fontawesome.com/a001c7932f.js"
      crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
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
        <a href="/">
          <img src="./public/images/logo.png" alt="" />
        </a>
        <nav>
          <h2>Browse</h2>
          
          <ul class="nav-links">
            <li class="<?=getUrl("/")? "active-link" : "" ?>">
              <i class="fa-solid fa-layer-group"></i>
              <a href="./">Discover</a>
            </li>
            <li class="<?=getUrl("/movies.php")? "active-link" : "" ?>">
              <i class="fa-solid fa-video"></i>
              <a href="./movies.php">Movies</a>
            </li>
            <li class="<?=getUrl("/series.php")? "active-link" : "" ?>">
              <i class="fa-solid fa-tv"></i>
              <a href="./series.php">Tv Series</a>
            </li>
            <li class="<?=getUrl("/actors.php")? "active-link" : "" ?>">
              <i class="fa-solid fa-users"></i>
              <a href="./actors.php">People</a>
            </li>
          </ul>
        </nav>
      </header>