<?php
view('partials/_header');


?>

<section class="text-center text-lg-start">
  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right bg-body-tertiary" style="
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <form action="<?= URL ?>register" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input name="name" value="<?= old('name') ?? '' ?>" type="text" id="form3Example1" class="form-control" />
                    <label class="form-label" for="form3Example1">First name</label>
                    <?php
                    if (error('name')):
                    ?>
                      <p class="red"><?= error('name') ?></p>
                    <?php
                    endif;
                    ?>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input name="family" value="<?= old('family') ?? '' ?>" type="text" id="form3Example2" class="form-control" />
                    <label class="form-label" for="form3Example2">Last name</label>
                    <?php
                    if (error('family')):
                    ?>
                      <p class="red"><?= error('family') ?></p>
                    <?php
                    endif;
                    ?>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input name="email" value="<?= old('email') ?? '' ?>" type="email" id="form3Example3" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
                <?php
                if (error('email')):
                ?>
                  <p class="red"><?= error('email') ?></p>
                <?php
                endif;
                ?>
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input name="password" type="password" id="form3Example4" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
                <?php
                if (error('password')):
                ?>
                  <p class="red"><?= error('password') ?></p>
                <?php
                endif;
                ?>
              </div>

              <!-- Submit button -->
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                Sign up
              </button>

            </form>
            <div class="mt-4 text-black fw-bold fs-6">Already Have An Account ?
              <a href="/login" class="text-primary fs-6">Login!</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>


<?php
view('partials/_footer');
?>