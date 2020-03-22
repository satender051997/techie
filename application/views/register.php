<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>USER</b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
        <?php if($this->session->has_userdata('register_error')):?>
        <div class="alert alert-danger">
            <strong>Error! </strong> <?php $this->session->flashdata('register_error'); ?>
        </div>
        <?php 
        elseif( $this->session->has_userdata('register_success')): ?>
         <div class="alert alert-success">
            <strong>Success! </strong> <?php $this->session->flashdata('register_success'); ?>
        </div>
 
        <?php endif ?>
      <p class="login-box-msg">Register a new user</p>
     <?php echo form_open('main/register'); ?>
        <?php $error = form_error("user","<div class='invalid-feedback'>","</div>") ?>
        <div class="input-group mb-3">
            <!-- username -->
          <input type="text" class="form-control  <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Full name" name="user" value="<?php echo set_value('user'); ?>">
           <?php $error ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?php $error = form_error("email","<div class='invalid-feedback'>","</div>") ?>
          <!-- email address -->
        <div class="input-group mb-3">
          <input type="email" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
          <?php $error ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php $error = form_error("pass1","<div class='invalid-feedback'>","</div>") ?>
        <!-- password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Password" name="pass1" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php $error = form_error("pass2","<div class='invalid-feedback'>","</div>") ?>
        <!-- confirm password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Retype password" name="pass2"  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
     <?php echo form_close(); ?>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>