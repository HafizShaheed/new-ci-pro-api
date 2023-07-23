
<section class="jumbotron text-center">
<div class="container">

  <h1>Reset Password</h1>
  <?php echo form_open('users/update_password'); ?>
  <input type="hidden" name="token" value="<?php echo $token; ?>">

    <div class="form-group">
        <input type="password" name="password" id="password" style="width:500px"  placeholder="Enter your password" value="<?php echo set_value('email') ?>" />
    </div>
    <div class="form-group">
        <input type="password" name="confirm_password" id="confirm_password" style="width:500px"  placeholder="Confirm new password" value="<?php echo set_value('email') ?>" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit"  id="submit"  value="Update Password" />
    </div>
    <button type="submit"></button> <?php echo form_close(); ?>

  <?php
    $error = validation_errors();
    if (!empty($error)) {
      echo "<p>$error</p>";
    }
  ?>

</div>
</section>

