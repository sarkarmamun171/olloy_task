<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO category (category_name) 
		VALUES (?)
		";
		$statement = $connect->prepare($query);
		$statement->bind_param("s", $_POST["category_name"]); // Bind parameters
		$statement->execute();
		$affected_rows = $statement->affected_rows;
		if($affected_rows > 0)
		{
			echo 'Category Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM category WHERE category_id = ?";
		$statement = $connect->prepare($query);
		$statement->bind_param("i", $_POST["category_id"]); // Assuming category_id is an integer
		$statement->execute();
		$result = $statement->get_result(); // Use get_result() for fetching results with mysqli
		$row = $result->fetch_assoc();
		$output['category_name'] = $row['category_name'];
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE category set category_name = ?  
		WHERE category_id = ?
		";
		$statement = $connect->prepare($query);
		$statement->bind_param("si", $_POST["category_name"], $_POST["category_id"]); // Bind parameters
		$statement->execute();
		$affected_rows = $statement->affected_rows;
		if($affected_rows > 0)
		{
			echo 'Category Name Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';	
		}
		$query = "
		UPDATE category 
		SET category_status = ? 
		WHERE category_id = ?
		";
		$statement = $connect->prepare($query);
		$statement->bind_param("si", $status, $_POST["category_id"]); // Bind parameters
		$statement->execute();
		$affected_rows = $statement->affected_rows;
		if($affected_rows > 0)
		{
			echo 'Category status changed to ' . $status;
		}
	}
}

?>
