<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php 
      echo $this->session->flashdata('message');
?>
<br>
    <h1> <?php echo $title;?></h1>
    <!-- <br>
    <a href="<?php base_url()?>"><?php echo base_url(); ?></a>

    <br>
    <?php echo '<pre>';?>
    <?php  print_r($allnews);?>

    <br>
<?php
      $newsinfo=json_encode($this->session->userdata('news_data'));
      $decoded_data = json_decode($newsinfo, true);
      echo $decoded_data[0]['title'];
?>


<h2>News Table</h2> -->

<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Descriptions</th>
    <th>Active</th>
    <th>created</th>
    <th>Action</th>
  </tr>
  <?php if (!empty($allnews)) { ?>
    <?php foreach ($allnews as $key => $value) { ?>
        
    <tr>
        <td><?php echo $value->id;?></td>
        <td><?php echo $value->title;?></td>
        <td><?php echo $value->description;?></td>
        <td><?php echo $value->active;?></td>
        <td><?php echo $value->created_at;?></td>
        <td>
            <a href="<?php echo base_url() . 'NewsController/edit/' . $value->id; ?>">Edit</a>
            <a href="<?php echo base_url() . 'NewsController/delete_new/' . $value->id; ?>">Delete</a>
            <a href="<?php echo base_url() . 'NewsController/details/' . $value->id; ?>">Details</a>
            
      </td>
        </td>
        <td></td>
       
    </tr>
    <?php }?>

  <?php } else {?>
    <tr>
    <td colspan="5">Records Not Found.</td>
  </tr>
    <?php }?>
  
  
</table>
</body>
</html>







