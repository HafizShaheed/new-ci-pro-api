<section class="jumbotron text-center">
<div class="container">
<h1><?php echo $title; ?></h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi rerum nesciunt qui provident quam quisquam vero similique itaque fuga quae esse pariatur, laudantium dolorem tempora quaerat sit accusamus veritatis officiis.</p>

<br>

<?php 
      print_r($this->session->userdata('name'));

?>

</div>
</sectiion>