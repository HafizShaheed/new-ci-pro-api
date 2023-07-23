<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
    <title><?php echo $title;?></title>
    <style>

.error{
    color: red;
}
.pass{
    color: lightgreen
}
</style>
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('/pages/view/about');?>">About </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('/pages/view/service');?>">Service </a>
      </li> 
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('/pages/view/contact');?>">Contact </a>
      </li>
   
      
      
    </ul>

    <ul class="navbar-nav right">
        <?php if ($this->session->userdata('authenticated')) {?>
            <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('/dashboard/index');?>">Dashboard </a>
            </li> 
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('/users/logout');?>">logout </a>
            </li>
        <?php } else {?>
            <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('/users/signup');?>">Sign Up </a>
            </li> 
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('/users/login');?>">Sign In </a>
            </li>
        <?php }?>
        
    </ul>
   
  </div>
  </div>
</nav>




