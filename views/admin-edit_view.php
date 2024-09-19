<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
  <link rel="stylesheet" href="./public/css/style.css">
</head>

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


    <form action="<?= URL ?>edit?id=<?= $movie_id ?>" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input value="<?= $movie['title'] ?>" type="text" id="title" name="title" required>
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
        <input value="<?= $movie['description'] ?>" type="text" id="description" name="description" required>
        <?php
        if (isset($errors['description'])) {
        ?>
          <p class="red"><?= $errors['description'] ?></p>
        <?php
        }
        ?>
      </div>
      <div class="form-group">
        <label for="image-url">image src</label>
        <input value="<?= $movie['image_path'] ?>" type="url" id="image-url" name="image-url" required>
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
          <option class="form-option" <?= $movie['series'] === 0 ? 'selected' : '' ?> value="0">Movie</option>
          <option class="form-option" <?= $movie['series'] === 1 ? 'selected' : '' ?> value="1">Series</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Update Movie</button>
      </div>
    </form>
  </div>

</body>

</html>