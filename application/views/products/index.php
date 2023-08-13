


<h2>Product list</h2> 

<table>
  <thead>
  <th>Id</th>
    <th>Name</th>
    <th>sub-P</th>
    <th>Active</th>
    <th>created</th>
    <th>Action</th>
  </thead>
  <tbody>
	<?php if (!empty($products) && count($products) > 0) {
		foreach ($products as $key => $value) {
	?>
			<tr>
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->category_id; ?></td>
				<td><?php echo $value->description; ?></td>
				<td><?php echo $value->sub_cat__id ==1 ? $value->sub_cat__id  : Null; ?></td>
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







