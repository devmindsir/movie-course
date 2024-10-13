<?php
view('partials/_header');
?>

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
    <div class="people-details-content">
      <div class="personal-info">
        <img
          src="<?= $actor->image ?>"
          alt="" />
        <h1 class="people-details-name-mobile"><?= $actor->name . " " . $actor->family ?></h1>
        <h3 class="personal-info-text">Personal Info</h3>
        <div class="personal-info-items">
          <strong>count Movie</strong>
          <p><?= sizeof($movies) ?></p>
        </div>
        <div class="personal-info-items">
          <strong>Gender</strong>
          <p><?= $actor->gender == 1 ? "Male" : "Female" ?></p>
        </div>
        <div class="personal-info-items">
          <strong>Birthday</strong>
          <p><?= $actor->birthday ?></p>
        </div>
        <div class="personal-info-items">
          <strong>Place of Birth</strong>
          <p><?= $actor->place_birthday ?></p>
        </div>
      </div>
      <div class="people-details-right">
        <h1 class="people-details-name"><?= $actor->name . " " . $actor->family ?></h1>
        <div class="biography">
          <h3>Biography</h3>
          <p>
            <?= $actor->biography ?>
          </p>
        </div>
        <div class="people-details-scroll-container">
          <h3>Known For</h3>

          <div class="people-details-scroll">
            <?php
            foreach ($movies as $movie):
            ?>
              <div class="people-details-scroll-item">
                <img
                  src="<?= $movie->image_path ?>"
                  alt="<?= $movie->title ?>" />
                <p><?= $movie->title ?></p>
              </div>
            <?php
            endforeach;
            ?>
          </div>

        </div>
      </div>
    </div>
    <?php
    view('partials/_footer');
    ?>