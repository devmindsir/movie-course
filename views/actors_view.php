
            
    <?php
    require("./views/partials/_header.php");
    require("./views/partials/_nav.php");
    ?>
      <main class="list">
        <div class="list-top">
          <h1 class="list-top-title-people">Popular People</h1>
        </div>
        <div class="list-items-container">
          <?php
          foreach($actors as $row):
          ?>
          <a href="./actor-details?id=<?=$row['id']?>" class="list-item-people">
            <img
              class="list-item-image"
              src="<?=$row['image']?>"
              alt="<?=$row['family']?>" />
            <div class="list-item-details-people">
              <p class="item-title-people"><?=$row['name']." ".$row["family"]?></p>
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