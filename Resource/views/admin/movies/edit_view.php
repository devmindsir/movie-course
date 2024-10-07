<?php
view('partials/_header');
?>

<body class="admin-body">
  <?php
  if (isset($_GET['message'])) {
  ?>
    <h1 style="color: green;"><?= $_GET['message'] ?></h1>
  <?php
  }
  ?>

  <div class="form-container">
    <h2 style="color:#000;">Add Movie / Series</h2>


    <form action="<?= URL ?>admin?id=<?= $movie_id ?>" method="post">
      <input type="hidden" name="_method_" value="PATCH">
      <div class="form-group">
        <label for="title">Title</label>
        <input value="<?= $movie['title'] ?>" type="text" id="title" name="title" required>
        <?php
        if (error('title')) {
        ?>
          <p class="red"><?= error('title') ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input value="<?= $movie['description'] ?>" type="text" id="description" name="description" required>
        <?php
        if (error('description')) {
        ?>
          <p class="red"><?= error('description') ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="image-url">image src</label>
        <input value="<?= $movie['image_path'] ?>" type="url" id="image-url" name="image-url" required>
        <?php
        if (error('image')) {
        ?>
          <p class="red"><?= error('image') ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="type">Movie/Series</label>
        <select id="type" name="type" required>
          <option class="form-option" <?= $movie['series'] === 0 ? 'selected' : '' ?> value="0">Movie</option>
          <option class="form-option" <?= $movie['series'] === 1 ? 'selected' : '' ?> value="1">Series</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Update Movie</button>
      </div>
    </form>
    <?php
    view('partials/_footer');
    ?>