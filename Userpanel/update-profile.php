<?php
include('header.php');
include('nav.php');
include('side.php');
include('assets\backend\edit-profile.php');
?>

<!-- start edit profile code -->
<!-- <div class="tab-pane fade profile-edit pt-3" id="profile-edit"> -->
<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-md-3"></div>
        <div class="col-md-9 card pt-4">
            <h1 class="text-center pb-3 fw-bold " style="color: #012970;">Edit Profile Info</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-md-8 col-lg-9">
                                    <?php
                                    $username = $_SESSION['username'];
                                    $resu = mysqli_query($conn, "SELECT * FROM `profile` WHERE username = '$username' ");
                                    if ($resu && mysqli_num_rows($resu) > 0) {
                                        $row = mysqli_fetch_assoc($resu);
                                        echo "<img src='uploads/img/" . $row['pic'] . "' alt='Profile'  style='height:200px;width:150px'>";
                                    }
                                    ?>
                                    <div class="pt-2">
                                        <label for="fileInput" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload" style="color:white"></i></label>
                                        <input type="file" name="pic" id="fileInput" style="display: none;" />
                                        <a href="delete-profile.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="fullname" type="text" class="form-control" id="fullName" value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                <div class="col-md-8 col-lg-9">
                                    <div class="input-group has-validation">
                                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?php echo $username; ?>" readonly>
                                        <div class="invalid-feedback">Please enter your username.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo isset($row['about']) ? $row['about'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="company" type="text" class="form-control" id="company" value="<?php echo isset($row['company']) ? $row['company'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="job" type="text" class="form-control" id="job" value="<?php echo isset($row['job']) ? $row['job'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="country" type="text" class="form-control" id="country" value="<?php echo isset($row['country']) ? $row['country'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="address" type="text" class="form-control" id="address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="phone" type="text" class="form-control" id="phone" value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email" class="form-control" id="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
                                    <?php if (isset($error_message)) { ?>
                                        <div class="error text-danger"><?php echo $error_message; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="twitter" type="text" class="form-control" id="twitter" value="<?php echo isset($row['twitter']) ? $row['twitter'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="facebook" type="text" class="form-control" id="facebook" value="<?php echo isset($row['facebook']) ? $row['facebook'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="instagram" type="text" class="form-control" id="instagram" value="<?php echo isset($row['instagram']) ? $row['instagram'] : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="linkdin" class="col-md-4 col-lg-3 col-form-label">Linkdin Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="linkdin" type="text" class="form-control" id="linkdin" value="<?php echo isset($row['linkdin']) ? $row['linkdin'] : ''; ?>">
                                </div>
                            </div>
                            <div class="text-center pb-4">
                                <button name="update" type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        <!-- End Profile Edit Form -->
                    </div>
                    <!-- end edit profile code -->
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php')
?>