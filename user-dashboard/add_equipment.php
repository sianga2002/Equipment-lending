<?php include("includes/sidebar.php")?>

<?php 
	
	$query_execute = mysqli_query($conn, "SELECT * 
		FROM equipment");
	$fetch_equipment = mysqli_fetch_array($query_execute);
	$count_equipment = mysqli_num_rows($query_execute);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add equipment form</title>
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-5 col-xl-12 col-sm-12 mt-5">
	        	<?php include("../includes/messages.php")?>
	            <div class="card">
	                <div class="card-body">
	                    <div class="row justify-content-center">
	                    	<div class="form-group col-md-6">
	                    		<h3 class="text-info"style="font-weight: bold; text-align: center">REGISTER EQUIPMENT</h3>
	                    	</div>
	                    </div>
	                    <hr>
	                    <form action="add_equipment_action.php" method="POST">
	                        <div class="row justify-content-center">
	                            <div class="form-group col-md-4">
	                                <label>Equipment name</label>
	                                <input type="text" name="equip_name" class="form-control">
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label>Total</label>
	                                <input type="number" name="total" class="form-control">
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label>Date Registered</label>
	                                <input type="date" name="reg_date" class="form-control">
	                            </div>
	                        </div>
	                        <div class="row justify-content-center">
	                            <div class="form-group col-md-4 mt-2">
	                                <input type="submit" name="send_data" value="Add Equipment" class="btn btn-info bt-block form-control">
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>                       
		</div>
	</div>

	<hr>
    <div class="card-body">
        <div class="table">
        	<h3 class="text-info"style="font-weight: bold; text-align: center">LIST OF EQUIPMENT</h3>
            <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                <thead style="">
                    <tr>
                        <th>S/N</th>
                        <th>Equipment name</th>
                        <th>Total</th>
                        <th>Date Registered</th>
                     	<th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                                <!-- loop for looping 3 joined table(Faculty, Department and Post) -->
                     <?php  $sn = 1; while($fetch_equipment=mysqli_fetch_array($query_execute)) {?>
                    <tr>
                        <td><?php echo $sn++ ?>.</td>
                        <td><?php echo $fetch_equipment['equip_name'] ?></td>
                        <td><?php echo $fetch_equipment['total'] ?></td>
                        <td><?php echo $fetch_equipment['reg_date'] ?></td>
                        <td>
                            <a href="edit_equip.php?edit_id=<?php echo $fetch_equipment['equip_id']?>"><button class="btn btn-success text-light btn-sm">Edit</button></a>
                             <a href="delete_equip.php?delete_id=<?php echo $fetch_equipment['equip_id']?>"><button class="btn btn-danger text-light btn-sm text-light">Delete</button></a>
                        </td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
	<?php include("includes/footer.php")?>
</body>
</html>