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



<h2>Category list</h2> 

<table>
  <thead>
  <th>Id</th>
    <th>Name</th>
    <th>sub-category</th>
    <th>Active</th>
    <th>created</th>
    <th>Action</th>
  </thead>
  <tbody>
	<?php if (!empty($categories) && count($categories) > 0) {
		foreach ($variable as $key => $value) {
	?>
			<tr>
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->status ==1 ? 'active' : 'in-active'; ?></td>
				<td><?php echo $value->created_at; ?></td>
			</tr>
	<?php } }else { ?>
			<tr>
				<td>no record found.</td>
			</tr>
	<?php } ?>
  </tbody> 
  


  
</table>
</body>
</html>







