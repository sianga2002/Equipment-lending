<?php 
		
		$user_id = $_SESSION['UserID']['user_id'];
		$get_user_query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE tbl_user.user_id = $user_id");
		$fetch_user = mysqli_fetch_array($get_user_query);
		
		$retrieve_id 	= $fetch_user['user_id'];

?>
