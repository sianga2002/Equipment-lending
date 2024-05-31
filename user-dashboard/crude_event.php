<?php include("../includes/config.php");
      include("")

if (isset($_GET['delete_id'])) 
{
    $equip_id = $_GET['equip_id'];
    $delete_equipment = mysqli_query($conn, "DELETE FROM equipment WHERE equip_id='$equip_id'");

    //if user deleted successfully
    if ($delete_equipment)
    {
        // $_SESSION['success'] = "Equipment Deleted Successfully";
        // header('location:add_equipment.php');
        die(mysqli_error($conn));
    } 

    else 
    {
        // $_SESSION['Error'] = "Failed to delete, please try again";
        // header('location:add_equipment.php');
        die(mysqli_error($conn));
    }
}

edit user
elseif (isset($_POST['edit_event']))
{

    $equip_id = $_GET['equip_id'];
    $equip_name = $_POST['equip_name'];
    $total = $_POST['total'];
    $reg_date = $_POST['reg_date'];

    $update_equipment = mysqli_query($conn, "UPDATE equipment SET 
        equip_name='$equip_name', total='$total', reg_date='$reg_date'
        WHERE equip_id = '$equip_id'");

    //if user updated successfully
    if ($update_equipment) 
    {
        $_SESSION['success'] = "Equipment Updated Successfully";
        header('location:add_equipment.php');
    } 

    else 
    {
        $_SESSION['error'] = "Failed to edit equipment, please try again";
        header('location:add_equipment.php');
    }
}
?>
