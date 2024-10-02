<?php
require(BASE_PATH . "views/partials/_header.php");
?>

<body class="admin-body">
  <div class="admin">
    <div class="admin-header">
      <div class="admin-header-content">
        Your Movie List
      </div>
      <?php
      if (isset($_GET['message'])) { ?>
        <p class="message"><?= $_GET['message'] ?></p>
      <?php
      }
      ?>
      <a href="/admin/create" class="admin-header-link">+ New Movie</a>
    </div>
    <div class="admin-content">
      <table class="admin-table">
        <thead class="admin-table-head">
          <tr class="admin-table-row">
            <td class="admin-table-col">id</td>
            <td class="admin-table-col">Title</td>
            <td class="admin-table-col">Film/Series</td>
            <td class="admin-table-col">Cover</td>
            <td class="admin-table-col">Edit</td>
            <td class="admin-table-col">Delete</td>
          </tr>
        </thead>
        <tbody class="admin-table-body">
          <?php
          $i = 1;
          foreach ($movies as $row):
          ?>
            <tr class="admin-table-row">
              <td class="admin-table-col"><?= $i ?></td>
              <td class="admin-table-col"><?= $row['title'] ?></td>
              <td class="admin-table-col">
                <?php

                echo $row['series'] === 1 ? "Series" : "Movie";

                ?>
              </td>
              <td class="admin-table-col"><img src="<?= $row['image_path'] ?>" alt="Cover" style="width: 100px;"></td>
              <td class="admin-table-col"><a href="/admin/edit?id=<?= $row['id'] ?>" class="edit-btn">edit</a></td>
              <form action="<?= URL ?>admin/destroy?id=<?= $row['id'] ?>" method="post">
                <td class="admin-table-col">
                  <button class="delete-btn">delete</button>
                </td>
              </form>
            </tr>
          <?php
            $i++;
          endforeach;
          ?>
          <!-- می‌توانید ردیف‌های بیشتری اضافه کنید -->
        </tbody>
      </table>
    </div>
    <?php
    require(BASE_PATH . "views/partials/_footer.php");
    ?>