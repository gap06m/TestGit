<?php

	$page_title = "Read Products";
	include_once "header.php";

	echo "<div class='right-button-margin'>";
    	echo "<a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>";
	echo "</div>";

	// page given in URL parameter, default page is one
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	 
	// set number of records per page
	$records_per_page = 10;
	 
	// calculate for the query LIMIT clause
	$from_record_num = ($records_per_page * $page) - $records_per_page;

	include_once "config/database.php";
	include_once "objects/product.php";
	include_once "objects/category.php";

	$database = new Database();
	$db = $database->getConnection();

	$product = new Product($db);

	$stmt = $product->readAll($page, $from_record_num, $records_per_page);
	$num = $stmt->rowCount();

	if($num>0) {

		$category = new Category($db);
		echo "<table class='table table-hover table-responsive table-bordered'>";
	        echo "<tr>";
	        	echo "<th>Product</th>";
	            echo "<th>Price</th>";
	            echo "<th>Description</th>";
	            echo "<th>Category</th>";
	            echo "<th>Actions</th>";
	        echo "</tr>";
	 
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 
	            extract($row);
	 
	            echo "<tr>";
	                echo "<td>{$name}</td>";
	                echo "<td>{$price}</td>";
	                echo "<td>{$description}</td>";
	                echo "<td>";
	                    $category->id = $category_id;
	                    $category->readName();
	                    echo $category->name;
	                echo "</td>";
	 
	                echo "<td>";	                    
					    echo "<a href='update_product.php?id={$id}' class='btn btn-default left-margin'>Edit</a>";
					    echo "<a delete-id='{$id}' class='btn btn-default delete-object'>Delete</a>&nbsp&nbsp";
					    echo "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal\">Modal</button>";
	                echo "</td>";
	 
	            echo "</tr>";
	 
	        }
	 
	    echo "</table>";
	    // paging buttons will be here
	    include_once "paging_product.php";

	} else {
		echo "<div>No products found.</div>";
	}
	
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
	document.write("Hello Glenn!");

	displayHello("Glenn");

	$(document).on('click', '.delete-object', function(){
	 
	    var id = $(this).attr('delete-id');
	    var q = confirm("Are you sure?");
	 
	    if (q == true){
	 
	        $.post('delete_product.php', {
	            object_id: id
	        }, function(data){
	            location.reload();
	        }).fail(function() {
	            alert('Unable to delete.');
	        });
	 
	    }
	 
	    return false;
	});

	function displayHello($name) {
		var a;
		var b;
		var c;

		a = "a";
		b = "b";
		c = "c";
		alert("Hello again, " + $name);
	}
</script>
<?php
	include_once "footer.php";
?>