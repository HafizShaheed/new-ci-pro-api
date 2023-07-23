

<section class="jumbotron text-center">
<div class="container">
<h1>Forgot Password</h1>
  <?php echo form_open('users/send_reset_link'); ?>

    
    <div class="form-group">
        <input type="email" name="email" id="email" style="width:500px"  placeholder="Enter your email" value="<?php echo set_value('email') ?>" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit"  id="submit"  value="Send Reset Link" />
    </div>
  <?php echo form_close(); ?>

  <?php
    $message = $this->session->flashdata('message');
    if (!empty($message)) {
      echo "<p>$message</p>";
    }

    $error = $this->session->flashdata('error');
    if (!empty($error)) {
      echo "<p>$error</p>";
    }
  ?>







</div>
</section>