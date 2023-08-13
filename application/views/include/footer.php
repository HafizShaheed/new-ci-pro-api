<br>
<br>
<br>
<br>
<br>
    
<p>Copywrite: 2023</p>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $("#selectCatID").change(function() {
        var category_id = $(this).val();

        $.ajax({
            url: "<?php echo base_url('productsController/get_sub_cat'); ?>",
            type: "POST",
            data: { category_id: category_id },
            success: function(response) {
                var sub_cat_data = response.sub_categories_by_cat_id;
                var options = '<option value="0">Select Sub Category sss</option>';

                if (sub_cat_data.length > 0) {
                    $.each(sub_cat_data , function (index , value) { 
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $("#selectSubCatID").html(options);
                } else {
                    options = '<option value="0">no record</option>';
                    $("#selectSubCatID").html(options);
                }
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    });
});


</script>
</html>
</script>

</body>
</html>
