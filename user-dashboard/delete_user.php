<?php include("../includes/config.php");


if (isset($_GET['delete_id'])) 
{
    $lender_id = $_GET['delete_id'];
    $delete_equipment = mysqli_query($conn, "DELETE FROM lender WHERE lender_id='$lender_id'");

    //if user deleted successfully
    if ($delete_equipment)
    {
        $_SESSION['success'] = "User/Lender Deleted Successfully";
        header('location:user_form.php');
        //die(mysqli_error($conn));
    } 

    else 
    {
        $_SESSION['Error'] = "Failed to delete, please try again";
        header('location:user_form.php');
        //die(mysqli_error($conn));
    }
}

?>
