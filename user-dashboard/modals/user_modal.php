<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="user" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title text-white" id="user">Register user</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="user.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-xl-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-xl-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-6">
                            <label>Phone Number</label>
                            <input type="number" name="email" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="col-xl-6">
                            <label>Sex</label>
                            <input type="text" name="username" class="form-control" placeholder="sex">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-6">
                            <label>Registration/Staff Number</label>
                            <input type="text" name="username" class="form-control" placeholder="Registration/Staff Number">
                        </div>
                        <div class="col-xl-6">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="register" class="btn vms-btn bg-info">Register</button>
                </div>
            </form>
        </div>
    </div>