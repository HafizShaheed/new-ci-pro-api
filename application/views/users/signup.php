<section class="jumbotron text-center">
<div class="container">
<h1><?php echo $title;?></h1>


<?php echo form_open('Users/signup', array('id'=> 'signupForm_id', 'class' => 'signup-form')) ?>
<div class="form-group">
    <input type="text" name="first_name" id="first_name" style="width:500px"  placeholder="First Name" value="<?php echo set_value('first_name') ?>" />
    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
</div>
<div class="form-group">
    <input type="text" name="last_name" id="last_name" style="width:500px"  placeholder="Last Name" value="<?php echo set_value('last_name') ?>"/>
</div>
<div class="form-group">
    <input type="email" name="email" id="email" style="width:500px"  placeholder="Email Address" value="<?php echo set_value('email') ?>" />
    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
</div>
<div class="form-group">
    <input type="password" name="password" id="password" style="width:500px"  placeholder="Password" value="<?php echo set_value('password') ?>" />
    <?php echo form_error('password', '<div class="error">',  '</div>')?>
</div>
<div class="form-group">
    <input type="password" name="passconf" id="passconf" style="width:500px"  placeholder="Password Confirmation" value="<?php echo set_value('passconf') ?>" />
    <?php echo form_error('passconf', '<div class="error">',  '</div>')?>
</div>
<div class="form-group">
    <input type="submit"  id="submit"  value="Sign Up" />
    
</div>

<?php echo form_close() ?>
    
</div>
</sectiion>





