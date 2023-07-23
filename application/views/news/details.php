<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    
</head>
<body>
<section class="jumbotron text-center">
<div class="container-fluid">

    <br>
    <h1> <?php echo $title;?></h1>
    
    <?php echo json_encode($news);?>
</div>
</section>

</body>
</html>







