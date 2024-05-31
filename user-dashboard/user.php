<?php include_once('../includes/config.php') ?>

<?php  

    if(isset($_POST['register'])) {

        $user_id = $_SESSION['UserID'];
        $equipment = $_SESSION['equip_id'];
        $lender = $_SESSION['lender_id'];
        $reg_num = mysqli_real_escape_string($conn, $_POST['registration_number']);
        $fname   = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lname   = mysqli_real_escape_string($conn, $_POST['lastname']);
        $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
        $sex     = mysqli_real_escape_string($conn, $_POST['sex']);
        $date = date('Y-m-d');

        $check_reg = mysqli_query($conn, "SELECT registration_number FROM lender WHERE registration_number  =  '$reg_num' AND status = 'take'");
        $count_check = mysqli_num_rows($check_reg);

        if($count_check > 0) {
            $_SESSION['error'] = "Student with registration number $reg_num has not returned equipment";
            header("location:user_form.php");
        }

        else if(mysqli_query($conn, "UPDATE equipment SET total = total - 1 WHERE equip_id = '$equipment'")) {

            $reg_user = mysqli_query($conn, "INSERT INTO `tbl_user` (`firstname`, `lastname`, `phone`, `sex`) 
            VALUES ('$fname', '$lname', '$phone', '$sex')");
            
            //check if user registered successfully
            if($reg_user) {
                $select_user_id = mysqli_query($conn, "SELECT * FROM tbl_user WHERE phone='$phone'");
                $fetch_user = mysqli_fetch_array($select_user_id);
                $user_id = $fetch_user['user_id'];

                $reg_lender = mysqli_query($conn, "INSERT INTO lender (`registration_number`, `user`) VALUES ('$reg_num', '$user_id')");

                if($reg_lender) {
                    $_SESSION['success'] = "The user/lender registered successfully";
                    header("location:user_form.php");
                }
            }
        }
        else {   
            $_SESSION['error'] = "The user/lender not registered successfully";
            header("location:user_form.php");
            //die(mysqli_error($conn));        
        }

    } 

    elseif(isset($_POST['return'])) {
        $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
        $lender   = mysqli_real_escape_string($conn, $_POST['lender']);

        if(mysqli_query($conn, "UPDATE equipment SET total = total + 1 WHERE equip_id = '$equipment'")) {
            if(mysqli_query($conn, "UPDATE lender SET status = 'returned' WHERE lender_id = '$lender'")) {
                $_SESSION['success'] = "The equipment retured successfully";
                header("location:user_form.php");
            }
            else{
                 $_SESSION['error'] = "Error on updating lender";
                header("location:user_form.php");
            }
        }
        else {
            $_SESSION['error'] = "Error on updating equipment";
            header("location:user_form.php");
        }
    }

    else {
        $_SESSION['error'] = "Bad access method";
        header("location:user_form.php");
    }
?>