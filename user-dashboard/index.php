<?php $title = "User-dashboard" ?>

<?php include('includes/sidebar.php'); ?>

<?php 
    $sum_equipment = mysqli_query($conn, "SELECT SUM(total) FROM equipment");
    $get_user = mysqli_query($conn, "SELECT * FROM tbl_user");
    $count_user = mysqli_num_rows($get_user);
?>

<div class="main_container">
    <?php include('includes/messages.php')?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 txt">
                                Total Equipment</div>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                        <span class="count">
                                            <?php while($fetch=mysqli_fetch_array($sum_equipment)){ 
                                                echo $fetch['SUM(total)'];}
                                            ?>
                                        </span>
                                    </div>
                                </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gear fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Earnings (Monthly) Card Example -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 txt">
                                Report </div>
                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php //if( $exipanditure_sum['amount'] > 0): ?>
                                    Tsh.<span class="count"><?php //echo $exipanditure_sum['amount'] ?></span>/= 
                                <?php //endif ?>
                            </div> -->
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs txt font-weight-bold text-info text-uppercase mb-1">Registered user
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                        <span class="count"><?php echo $count_user?></span>
                                    </div>
                                </div>
                                <div class="col">
                                   <!--  <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax=""></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs txt font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span class="count"><?php echo $count_user ?></span>
                            </div> -->
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        

        <div class="col-xl-5">
           
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                });
            });
    })
</script>
