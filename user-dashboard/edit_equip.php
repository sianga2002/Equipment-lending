<?php
include("includes/sidebar.php");
if (isset($_POST['edit_equip'])) {
    $equip_id = $_POST['equip_id'];
    $equip_name = $_POST['equip_name'];
    $total = $_POST['total'];
    $reg_date = $_POST['reg_date'];

    $update_equipment = mysqli_query($conn, "UPDATE equipment SET 
        equip_name='$equip_name', total='$total', reg_date='$reg_date'
        WHERE equip_id = '$equip_id'");

    if ($update_equipment) {
        $_SESSION['success'] = "Equipment Updated Successfully";
        header('location:add_equipment.php');
        exit(); // Add exit to stop further execution
    } else {
        $_SESSION['error'] = "Failed to edit equipment, please try again";
        header('location:add_equipment.php');
        exit(); // Add exit to stop further execution
    }
}

$equip_id = $_GET['edit_id'] ?? ''; // Use null coalescing operator to handle undefined index
$data = mysqli_query($conn, "SELECT * FROM equipment WHERE `equip_id` = '$equip_id'");
$get_equip = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit | Equipment</title>
    <!-- Favicon -->
</head>

<body class="gets">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-xl-12 col-sm-12 mt-5">
                <?php include("../includes/messages.php") ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <h3 class="text-info" style="font-weight: bold; text-align: center">EDIT EQUIPMENT</h3>
                            </div>
                        </div>
                        <hr>
                        <form action="edit_equip.php" method="POST">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <input type="number" name="equip_id" class="form-control" value="<?php echo $get_equip['equip_id'] ?>" hidden>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-md-4">
                                    <label>Equipment name</label>
                                    <input type="text" name="equip_name" class="form-control" value="<?php echo $get_equip['equip_name'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total</label>
                                    <input type="number" name="total" class="form-control" value="<?php echo $get_equip['total'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Date Registered</label>
                                    <input type="date" name="reg_date" class="form-control" value="<?php echo $get_equip['reg_date'] ?>">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-md-4 mt-2">
                                    <input type="submit" name="edit_equip" value="Edit equipment" class="btn btn-info bt-block form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php") ?>
</body>

</html>
