<div class="container">
  <div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
      <center>
        <img width="200" src="<?= base_url('assets/apotek_logo.png'); ?>" class="text-center"></center>
      <h3 class="text-center mt-1">Masuk Admin</h3>
      <?= $this->session->flashdata('message');  ?>
      <!-- <?= $this->session->flashdata('notif');  ?> -->
      <form class="user" method="post" action="<?= base_url('auth'); ?>">
        <div class="login-form">
          <div class="form-group form-floating-label">
            <input id="email" name="username" type="text" class="form-control input-border-bottom" required>
            <label for="email" class="placeholder">Username</label>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
          </div>
          <div class="form-group form-floating-label">
            <input id="password" name="password" type="password" class="form-control input-border-bottom form-password" required>
            <label for="password" class="placeholder">Password</label>
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>');  ?>
            <div class="show-password">
              <i class="icon-eye"></i>
            </div>
          </div>
          <div class="row form-sub m-0">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="rememberme">
              <label class="custom-control-label" for="rememberme">Remember Me</label>
            </div>
            <a href="<?= base_url('user/lupaPassword'); ?>" class="link float-right">Lupa Password ?</a>
          </div>
          <div class="form-action">
            <button type="submit" class="btn btn-primary btn-rounded btn-login">
              Masuk
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.form-checkbox').click(function() {
      if ($(this).is(':checked')) {
        $('.form-password').attr('type', 'text');
      } else {
        $('.form-password').attr('type', 'password');
      }
    });
  });
</script>