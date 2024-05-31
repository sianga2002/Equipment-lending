<?php include('includes/sidebar.php')?>

<?php    
    $query_user = mysqli_query($conn, "SELECT * FROM lender, tbl_user WHERE lender.user = tbl_user.user_id ORDER BY status");
    $count_user = mysqli_num_rows($query_user);
    $equipment = mysqli_query($conn, "SELECT * FROM `equipment`");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register user/lender</title>
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
                                <h3 class="text-info"style="font-weight: bold; text-align: center">REGISTER USER/LENDER</h3>
                            </div>
                        </div>
                        <hr>
                        <form action="user.php" method="POST">
                            <div class="row justify-content-center">
                                <div class="form-group col-md-4">
                                    <label>Registration Number</label>
                                    <input type="text" name="registration_number" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>First name</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Last name</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sex</label>
                                    <select name="sex" class="form-control">
                                        <option value="">--Select sex--</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Equipment</label>
                                    <select name="equipment" class="form-control">
                                        <option value="">--Select Equipment--</option>
                                        <?php while($eq_item = mysqli_fetch_array($equipment)){ ?>
                                            <option value="<?php echo $eq_item['equip_id'] ?>">
                                                <?php echo $eq_item['equip_name'] ?>
                                                (<?php echo $eq_item['total'] ?>)
                                            </option>
                                        <?php }?>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-md-4 mt-2">
                                    <input type="submit" name="register" value="Register Lender/user" class="btn btn-info bt-block form-control">
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
            <h3 class="text-info"style="font-weight: bold; text-align: center">LIST OF LENDER/USERS</h3>
            <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                <thead style="">
                    <tr>
                        <th>S/N</th>
                        <th>Registration Number</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th width="17%">Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php  
                        $sn = 1; while($fetch_user=mysqli_fetch_array($query_user)) {?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $fetch_user['registration_number'] ?></td>
                            <td><?php echo $fetch_user['firstname'] ?></td>
                            <td><?php echo $fetch_user['lastname'] ?></td>
                            <td><?php echo $fetch_user['phone'] ?></td>
                            <td><?php echo $fetch_user['status'] ?></td>
                            <td>
                                <?php if($fetch_user['status'] == "take"): ?>
                                    <form action="user.php" method="post">
                                        <input hidden type="number" name="lender" value="<?php echo $fetch_user['lender_id'] ?>">
                                        <input hidden type="number" name="equipment" value="<?php echo $fetch_user['equipment'] ?>">
                                        <button type="submit" name="return" class="btn vms-btn bg-info">Return</button>
                                    </form>
                                <?php else: ?>
                                       <button type="submit" name="edit" class="btn vms-btn bg-success">Returned</button>
                                       <a href="delete_user.php?delete_id=<?php echo $fetch_user['lender_id']?>"><button class="btn btn-danger text-light btn-sm text-light">Delete</button></a>
                                <?php endif ?>
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