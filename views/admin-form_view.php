<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
  <link rel="stylesheet" href="./public/css/style.css">
</head>

<body class="admin-body">

  <div class="form-container">
    <h2>Add Movie / Series</h2>

    <form action="<?= URL ?>addmovie" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="<?= ($title ?? '') ?>" id="title" name="title" required>
        <?php
        if (isset($errors['title'])) {
        ?>
          <p class="red"><?= $errors['title'] ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="<?= ($description ?? '') ?>" id="description" name="description" required>
        <?php
        if (isset($errors['description'])) {
        ?>
          <p class="red"><?= $errors['description'] ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="genre">Genres</label>
        <select id="genre" name="genre" required>
          <option value="">Select</option>
          <?php
          foreach ($genres as $row):
            $selected = ($genre ?? null) == $row['id'] ? 'selected' : '';
          ?>
            <option class="form-option" <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
          <?php
          endforeach;
          ?>

        </select>
        <?php
        if (isset($errors['genre'])) {
        ?>
          <p class="red"><?= $errors['genre'] ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="actor">actors</label>
        <select id="actor" name="actor" required>
          <option value="">select</option>
          <?php
          foreach ($actors as $row):
            $selected = ($actor ?? null) == $row['id'] ? 'selected' : '';
          ?>
            <option class="form-option" <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['name'] . " " . $row['family'] ?></option>

          <?php

          endforeach;

          ?>

        </select>
        <?php
        if (isset($errors['actor'])) {
        ?>
          <p class="red"><?= $errors['actor'] ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="image-url">image src</label>
        <input type="url" id="image-url" value="<?= ($image ?? '') ?>" name="image-url" required>
        <?php
        if (isset($errors['image'])) {
        ?>
          <p class="red"><?= $errors['image'] ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="type">Movie/Series</label>
        <select id="type" name="type" required>
          <option class="form-option" <?= ($type ?? null) == 0 ? 'selected' : '' ?> value="0">Movie</option>
          <option class="form-option" <?= ($type ?? null) == 1 ? 'selected' : '' ?> value="1">Series</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Add Movie</button>
      </div>
    </form>
  </div>

</body>

</html>