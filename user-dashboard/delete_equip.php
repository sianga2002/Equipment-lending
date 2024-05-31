<?php include("../includes/config.php");


if (isset($_GET['delete_id'])) 
{
    $equip_id = $_GET['delete_id'];
    $delete_equipment = mysqli_query($conn, "DELETE FROM equipment WHERE equip_id='$equip_id'");

    //if user deleted successfully
    if ($delete_equipment)
    {
        $_SESSION['success'] = "Equipment Deleted Successfully";
        header('location:add_equipment.php');
        //die(mysqli_error($conn));
    } 

    else 
    {
        $_SESSION['Error'] = "Failed to delete, please try again";
        header('location:add_equipment.php');
        //die(mysqli_error($conn));
    }
}

?>
