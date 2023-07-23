

<section class="jumbotron text-center">
<div class="container">

<h1><?php echo $title;?></h1>
<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-danger"> <?php echo $this->session->flashdata('message');?></div>
<?php }?>

<?php echo form_open('Users/login', array('id'=> 'loginForm_id', 'class' => 'login-form')) ?>

<div class="form-group">
    <input type="email" name="email" id="email" style="width:500px"  placeholder="Email Address" value="<?php echo set_value('email') ?>" />
    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
</div>
<div class="form-group">
    <input type="password" name="password" id="password" style="width:500px"  placeholder="Password" value="<?php echo set_value('password') ?>" />
    <?php echo form_error('password', '<div class="error">',  '</div>')?>
</div>

<div class="form-group">
    <input type="submit"  id="submit"  value="Sign In" />
    
</div>
<div class="form-group">
            <a class="nav-link" href="<?php echo base_url('/users/forgot_password');?>">Forget Paassword </a>
    
</div>


<?php echo form_close() ?>

</div>
</section>
    







