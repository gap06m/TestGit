<?php

	// This is Index2!!!

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

	$stmt = $product->readAll2();
	$num = $stmt->rowCount();

	if($num>0) {

		$category = new Category($db);
		echo "<div class='table-responsive'>";
			echo "<table id='myTable' class='table table-striped' width='100%'>";
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
						    echo "<a delete-id='{$id}' class='btn btn-default delete-object'>Delete</a>";
		                echo "</td>";
		 
		            echo "</tr>";
		 
		        }
		 
		    echo "</table>";	   
	    echo "</div>"; 

	} else {
		echo "<div>No products found.</div>";
	}
?>
<?php
	include_once "footer.php";
?>
