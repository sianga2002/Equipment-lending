<?php include ("../includes/config.php")?>

<?php
	
	if(isset($_POST['send_data']))
	{
		//$user_id 	= $_SESSION['user'];
		$equip_name = $_POST['equip_name'];
		$total 		= $_POST['total'];
		$reg_date	= $_POST['reg_date'];

		$select_used_id = mysqli_query($conn, "SELECT * FROM tbl_user");
		$fetch_user = mysqli_fetch_array($select_used_id);
		$user_id = $fetch_user['user_id'];

		if(empty($equip_name) || empty($total) || empty($reg_date))
		{
			$_SESSION['error'] = "All field are required";
			header("location:add_equipment.php");	
		}


		else
		{
			$query_execute = mysqli_query($conn, "INSERT INTO equipment(equip_name, total, reg_date, user) VALUES ('$equip_name', '$total', '$reg_date', '$user_id')");

			if($query_execute)
			{
				$_SESSION['success'] = "Equipment inserted successfully";
				header("location:add_equipment.php");
			}

			else
			{ 
				$_SESSION['error'] = "Failed to insert equipment, try again!";
				header("location:add_equipment.php");
				//die(mysqli_error($conn));
			}
		}
	}

	else
	{
		$_SESSION['error'] = "Bad access, be carefully";
		header("location:add_equipment.php");
		//die(mysqli_error($conn));
	}
?>