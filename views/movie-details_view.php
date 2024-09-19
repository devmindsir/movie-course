<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Details</title>
    <link rel="stylesheet" href="./public/css/style.css" />
    <script
      src="https://kit.fontawesome.com/a001c7932f.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="details-container">

    
      <!-- header  -->
      <div class="details-header">
        <a href="/">
          <img src="./images/logo.png" alt="" />
        </a>
        <div class="search-container-details">
          <input type="text" placeholder="Search.." name="search" />
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <!-- end header  -->
      <div class="details-content">
        <img
          src="<?=$movie['image_path']?>"
          alt="details"
        />
        <div class="details-image-right">
          <div class="details-image-right-top">
            <h1><?=$movie['title']?></h1>
            <i class="fa-regular fa-star">
              <span><?=$movie['rate']?></span>
            </i>
          </div>
          <p id="details-overview">
            <?=$movie['description']?>
          </p>
          <h2>Genres</h2>
          <div class="details-genres-container">
            <div class="genres-side-left">
              <i class="fa-solid fa-caret-left"></i>
            </div>
            <div class="details-genres">
              <?php
              foreach($genre_titles as $row):
              ?>
              <div class="genre-boxes">
                <p><?=$row?></p>
              </div>
                  <?php
                  endforeach
                  ?>
            </div>
            <div class="genres-side-right">
              <i class="fa-solid fa-caret-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="actors">
        <div class="actors-top">
          <h2>Actors</h2>
          <div class="actors-scroll-controls">
            <div class="actors-controls-left">
              <i class="fa-solid fa-angle-left"></i>
            </div>
            <div class="actors-controls-right">
              <i class="fa-solid fa-angle-right"></i>
            </div>
          </div>
        </div>
        <div class="actors-scroll">
          <?php
          foreach($actor_images as $row):
          ?>
          <div class="actors-card">
            <div class="crop-container">
              <img
                src="<?=$row?>"
              />
            </div>
          </div>
          <?php
          endforeach
          ?>
        </div>
      </div>
    </div>
    <script type="module" src="./public/js/details.js"></script>
  </body>
</html>
