<?php
view('partials/_header');
?>

<body class="admin-body">

  <div class="form-container">
    <h2>Add Movie / Series</h2>

    <form action="<?= URL ?>admin" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="<?= (old('title') ?? '') ?>" id="title" name="title" required>
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
        <input type="text" value="<?= (old('description') ?? '') ?>" id="description" name="description" required>
        <?php
        if (error('description')) {
        ?>
          <p class="red"><?= error('description') ?></p>
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
            $selected = (old('genre') ?? null) == $row['id'] ? 'selected' : '';
          ?>
            <option class="form-option" <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
          <?php
          endforeach;
          ?>

        </select>
        <?php
        if (error('genre')) {
        ?>
          <p class="red"><?= error('genre') ?></p>
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
            $selected = (old('actor') ?? null) == $row['id'] ? 'selected' : '';
          ?>
            <option class="form-option" <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['name'] . " " . $row['family'] ?></option>

          <?php

          endforeach;

          ?>

        </select>
        <?php
        if (error('actor')) {
        ?>
          <p class="red"><?= error('actor') ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="image-url">image src</label>
        <input type="url" id="image-url" value="<?= (old('image-url') ?? '') ?>" name="image-url" required>
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
          <option class="form-option" <?= (old('type') ?? null) == 0 ? 'selected' : '' ?> value="0">Movie</option>
          <option class="form-option" <?= (old('type') ?? null) == 1 ? 'selected' : '' ?> value="1">Series</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Add Movie</button>
      </div>
    </form>
    <?php
    view('partials/_footer');
    ?>