<?php
view('partials/_header');
view('partials/_nav');
?>
<main class="list">
  <div class="list-top">
    <h1 class="list-top-title-people">Popular People</h1>
  </div>
  <div class="list-items-container">
    <?php
    foreach ($actors as $row):
    ?>
      <a href="/actors/show?id=<?= $row->id ?>" class="list-item-people">
        <img
          class="list-item-image"
          src="<?= $row->image ?>"
          alt="<?= $row->family ?>" />
        <div class="list-item-details-people">
          <p class="item-title-people"><?= $row->name . " " . $row->family ?></p>
        </div>
      </a>
    <?php
    endforeach;
    ?>
  </div>
</main>
<?php
view('partials/_footer');
?>