
      
    <?php
    require("./views/partials/_header.php");
    require("./views/partials/_nav.php");
    
    ?>
      <main>
        <!-- slider  -->
        <div class="search-container search-in-slider">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search.." name="search" />
        </div>
        <div class="slideshow-container">
          <?php
          foreach($sliders as $slider):
          ?>
          <a class="mySlides fade">
            <img src="<?=$slider['image']?>" />
            <div class="slider-text"><?=$slider['title']?></div>
          </a>
          <?php
          endforeach;
          ?>
          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
        <br />
        <div class="dot-container">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <!-- end slider  -->
        <!-- custom scrollbar  -->
        <div class="custom-scrollbar-container">
          <div class="upper-scrollbar">
            <h3>new</h3>
          </div>
          <div id="custom-scrollbar-trending" class="custom-scrollbar">
            <button id="left-scroll" onclick="scrollLeftTrending()">
              <i class="fa-solid fa-angle-left"></i>
            </button>
            <button id="right-scroll" onclick="scrollRightTrending()">
              <i class="fa-solid fa-angle-right"></i>
            </button>
            <?php
            foreach($newMovies as $newMovie):
            ?>
            <a href="#" class="info-box">
              <img
                src="<?=$newMovie['image_path']?>" />
              <div class="home-scrollbar-title"><?=$newMovie['title']?></div>
              <div class="home-scrollbar-rating"><?=$newMovie['rate']?></div>
            </a>
            <?php
            endforeach;
            ?>
          </div>
        </div>
        <!-- custom scrollbar  -->
        <!-- custom scrollbar  -->
        <div class="custom-scrollbar-container">
          <div class="upper-scrollbar">
            <h3>Popular</h3>
          </div>
          <div id="custom-scrollbar-popular" class="custom-scrollbar">
            <button id="left-scroll" onclick="scrollLeftPopular()">
              <i class="fa-solid fa-angle-left"></i>
            </button>
            <button id="right-scroll" onclick="scrollRightPopular()">
              <i class="fa-solid fa-angle-right"></i>
            </button>
            <?php
            foreach($popularMovies as $popularMovie):
            ?>
            <a href="#" class="info-box">
              <img
                src="<?=$popularMovie['image_path']?>" />
              <div class="home-scrollbar-title"><?=$popularMovie['title']?></div>
              <div class="home-scrollbar-rating"><?=$popularMovie['rate']?></div>
            </a>
            <?php
            endforeach;
            ?>
          </div>
        </div>
        <!-- custom scrollbar  -->
      </main>
  <?php
    require("./views/partials/_footer.php");
    ?>