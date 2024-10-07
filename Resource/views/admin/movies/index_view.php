<?php
view('partials/_header');
?>

<body class="admin-body">
  <div class="position-fixed top-0 start-0 py-2 px-5 bg-primary w-100">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <form action="<?= URL ?>login" method="POST">
          <input type="hidden" name="_method_" value="DELETE">
          <button class="bg-white text-primary py-2 px-4 rounded-2 fs-6 fw-bold">Exit Panel</button>
        </form>
      </div>
      <div style="width: 3rem;height: 3rem;" class="border border-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
        <i class="fa-solid fa-user-tie text-primary fs-3"></i>
      </div>
    </div>
  </div>
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
              <form action="<?= URL ?>admin?id=<?= $row['id'] ?>" method="post">
                <td class="admin-table-col">
                  <input type="hidden" name="_method_" value="DELETE">
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
    view('partials/_footer');
    ?>