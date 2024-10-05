<?php
require(BASE_PATH . "views/partials/_header.php");
?>

<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?= URL ?>login" method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3 text-black" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" value="<?= $_POST['email'] ?? '' ?>" type="email" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                    <?php
                    if (isset($errors['email'])):
                    ?>
                      <p class="red"><?= $errors['email'] ?></p>
                    <?php
                    endif;
                    ?>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>
                  <?php
                  if (isset($errors['password'])):
                  ?>
                    <p class="red"><?= $errors['password'] ?></p>
                  <?php
                  endif;
                  ?>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>
                </form>
                <div class="mt-4 text-black fw-bold fs-6">No Account ?
                  <a href="/register" class="text-primary fs-6">Register!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require(BASE_PATH . "views/partials/_footer.php");

?>