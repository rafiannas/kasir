<br>
<div class="container">
  <br><br>
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">
      <br><br>
      <div class="card o-hidden border-0 shadow-lg col-lg-7 mx-auto">
        <h2 class="h4 text-gray-900 mt-2" style="text-align: center; margin-top:10px"><i class="fas fa-concierge-bell fa-4x"></i></h2>

        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">

            <div class="col-lg">
              <div class="p-5">

                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                </div>

                <?= $this->session->flashdata('message');  ?>

                <form class="user" method="post" action=" <?= base_url('dapur'); ?> ">
                  <div class="form-group">
                    <span class="ml-3">Username</span>
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
                  <div class="form-group">
                    <span class="ml-3">Password</span>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Masuk
                  </button>


                </form>
                <hr>
                <!-- <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div> -->

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>