
      
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
          <div class="mySlides fade">
            <img src="./public/images/slider1.jpg" />
            <div class="slider-text">Interstellar</div>
          </div>
          <div class="mySlides fade">
            <img src="./public/images/slider2.jpg" />
            <div class="slider-text">Dune</div>
          </div>
          <div class="mySlides fade">
            <img src="./public/images/slider3.jpg" />
            <div class="slider-text">Spider-Man: No Way Home</div>
          </div>
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
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/49WJfeN0moxb9IPfGn8AIqMGskD.jpg" />
              <div class="home-scrollbar-title">Stranger Things</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/9pCoqX24a6rE981fY1O3PmhiwrB.jpg" />
              <div class="home-scrollbar-title">The Princess</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/71f3JHlJCP6V7LhHHiKZgjtFxZw.jpg" />
              <div class="home-scrollbar-title">The Terminal List</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/61PVJ06oecwvcBisoAQu6SDfdcS.jpg" />
              <div class="home-scrollbar-title">
                Doctor Strange in the Multiverse of Madness
              </div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/stTEycfG9928HYGEISBFaG1ngjM.jpg" />
              <div class="home-scrollbar-title">The Boys</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/wKiOkZTN9lUUUNZLmtnwubZYONg.jpg" />
              <div class="home-scrollbar-title">Minions: The Rise of Gru</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/dt53jhcegkYu2hKcE4tAdnbpBzt.jpg" />
              <div class="home-scrollbar-title">Code Name Banshee</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/muzgYvvFniQnwiTdAvfMCEkHsT4.jpg" />
              <div class="home-scrollbar-title">Baymax!</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
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
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/9Gtg2DzBhmYamXBS1hKAhiwbBKS.jpg" />
              <div class="home-scrollbar-title">
                Doctor Strange in the Multiverse of Madness
              </div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/wKiOkZTN9lUUUNZLmtnwubZYONg.jpg" />
              <div class="home-scrollbar-title">Minions: The Rise of Gru</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/jrgifaYeUtTnaH7NF5Drkgjg2MB.jpg" />
              <div class="home-scrollbar-title">
                Fantastic Beasts: The Secrets of Dumbledore
              </div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/6DrHO1jr3qVrViUO6s6kFiAGM7.jpg" />
              <div class="home-scrollbar-title">Sonic the Hedgehog 2</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/rkpLvPDe0ZE62buUS32exdNr7zD.jpg" />
              <div class="home-scrollbar-title">Dog</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/kAVRgw7GgK1CfYEJq8ME6EvRIgU.jpg" />
              <div class="home-scrollbar-title">Jurassic World Dominion</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/4zsihgkxMZ7MrflNCjkD3ySFJtc.jpg" />
              <div class="home-scrollbar-title">Collision</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
            <div class="info-box">
              <img
                src="https://image.tmdb.org/t/p/w500/6JjfSchsU6daXk2AKX8EEBjO3Fm.jpg" />
              <div class="home-scrollbar-title">Morbius</div>
              <div class="home-scrollbar-rating">8.62</div>
            </div>
          </div>
        </div>
        <!-- custom scrollbar  -->
      </main>
  <?php
    require("./views/partials/_footer.php");
    ?>