<?php
    require("./views/partials/_header.php");
    require("./views/partials/_nav.php");
    ?>
      
      <main class="list">
        <div class="list-top">
          <h1>Tv Series</h1>
        </div>

        <div class="list-items-container">
          <?php
          foreach($series as $row):
          ?>
          <a href="./movie-details?id=<?=$row['id']?>" class="list-item">
            <img
              class="list-item-image"
              src="<?=$row['image_path']?>"
              alt="<?=$row['title']?>" />
            <div class="list-item-details">
              <p class="item-title"><?=$row['title']?></p>
              <div class="list-item-details-year-rating">
                <h5><?=$row['date_publish']?></h5>
                <img src="/images/tmdb.svg" alt="TMDB" />
                <h5><?=$row['rate']?></h5>
              </div>
            </div>
          </a>
          <?php
          endforeach;
          ?>
        </div>
      </main>
      <?php
    require("./views/partials/_footer.php");
    ?>