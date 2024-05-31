<?php include('includes/sidebar.php')?>

<?php  
    if(isset($_GET['search'])){  
        $date = $_GET['date']; 
        $date = date('Y-m-d');
        $status = $_GET['status'];

        $query_user = mysqli_query($conn, "SELECT * FROM tbl_user, lender 
            WHERE lender.user = tbl_user.user_id AND status = '$status'
            ORDER BY status");
        $count_user = mysqli_num_rows($query_user);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
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
                                <h3 class="text-info"style="font-weight: bold; text-align: center">Search For report</h3>
                            </div>
                        </div>
                        <hr>
                        <form method="GET">
                            <div class="row justify-content-center">
                                <div class="form-group col-md-4">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="take">Take</option>
                                        <option value="returned">Returned</option>
                                    </select>
                                </div>
                    
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-md-4 mt-2">
                                    <input type="submit" name="search" value="Search" class="btn btn-info bt-block form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                       
        </div>
    </div>

    <hr>
    <?php if(isset($_GET['search'])): ?>
        <div class="card-body">
            <div class="table">
                <h3 class="text-info"style="font-weight: bold; text-align: center">Report</h3>
                <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                    <thead style="">
                        <tr>
                            <th>S/N</th>
                            <th>Registration Number</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                                    
                         <?php  $sn = 1; while($fetch_user=mysqli_fetch_array($query_user)) {?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $fetch_user['registration_number'] ?></td>
                            <td><?php echo $fetch_user['firstname'] ?></td>
                            <td><?php echo $fetch_user['lastname'] ?></td>
                            <td><?php echo $fetch_user['phone'] ?></td>
                            <td><?php echo $fetch_user['status'] ?></td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
    <?php include("includes/footer.php")?>
</body>
</html>