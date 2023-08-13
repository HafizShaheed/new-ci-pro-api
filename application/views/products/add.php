<div class="form-outline">
  <input type="text" id="name" class="form-control form-control-lg" />
  <label class="form-label" for="formControlLg">name</label>
</div>

<div class="form-outline">
  <input type="text" id="description" class="form-control" />
  <label class="form-label" for="formControlDefault">Description</label>
</div>

<div class="form-outline">
<select class="custom-select" id="selectCatID" >
<option selected> Select Category</option>
<?php foreach ($categories as $key => $value) { ?>
	<option value="<?php echo $value->id ?>"><?php echo $value->name;?></option>
<?php }?>
 
</select>
</select>  <label class="form-label" for="formControlSm">Category</label>
</div>

<div class="form-outline">
<select class="custom-select" id="selectSubCatID" name="selectSubCatID">
<option selected> Select Sub Category</option>
  <option value="1">One</option>
 
</select>
</select>  <label class="form-label" for="formControlSm">Sub Category</label>
</div>
