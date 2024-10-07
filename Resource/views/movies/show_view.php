<?php
view('partials/_header');

?>

<body>
  <div class="details-container">


    <!-- header  -->
    <div class="details-header">
      <a href="/">
        <img src="<?= BASE_PATH ?>images/logo.png" alt="" />
      </a>
      <div class="search-container-details">
        <input type="text" placeholder="Search.." name="search" />
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
    <!-- end header  -->
    <div class="details-content">
      <img
        src="<?= $movie['image_path'] ?>"
        alt="details" />
      <div class="details-image-right">
        <div class="details-image-right-top">
          <h1><?= $movie['title'] ?></h1>
          <i class="fa-regular fa-star">
            <span><?= $movie['rate'] ?></span>
          </i>
        </div>
        <p id="details-overview">
          <?= $movie['description'] ?>
        </p>
        <h2>Genres</h2>
        <div class="details-genres-container">
          <div class="genres-side-left">
            <i class="fa-solid fa-caret-left"></i>
          </div>
          <div class="details-genres">
            <?php
            foreach ($genre_titles as $row):
            ?>
              <div class="genre-boxes">
                <p><?= $row ?></p>
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
        foreach ($actor_images as $row):
        ?>
          <div class="actors-card">
            <div class="crop-container">
              <img
                src="<?= $row ?>" />
            </div>
          </div>
        <?php
        endforeach
        ?>
      </div>
    </div>
    <?php
    view('partials/_footer');
    ?>