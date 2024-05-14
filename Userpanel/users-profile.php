<?php
include('header.php');
include('nav.php');
include('side.php');
?>

<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-md-3"></div>
        <div class="col-md-9 card pt-4">
            <h1 class="text-center pb-3 fw-bold " style="color: #012970;">My Profile</h1>
            <div class="text-center pb-3">
                <?php
                $username = $_SESSION['username'];
                $resu = mysqli_query($conn, "SELECT * FROM `profile` WHERE username = '$username' ");
                if ($resu && mysqli_num_rows($resu) > 0) {
                    $row = mysqli_fetch_assoc($resu);
                    echo "<img src='uploads/img/" . $row['pic'] . "' alt='Profile'  style='height:200px;width:150px'>";
                }
                ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="mb-3">
                        <?php if ($row): ?>
                            <label for="exampleInputEmail1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['fullname']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['username']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">About</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['about']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['phone']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Job</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['job']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Company</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['company']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Country</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['country']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['twitter']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['facebook']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['instagram']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">LinkedIn</label>
                            <input type="text" class="form-control" name="pquality" value="<?php echo $row['linkdin']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                        </div>
                        <?php else: ?>
                            <p>No profile found for this user.</p>
                        <?php endif; ?>
                        <div class="mb-3 text-center pb-3 pt-2">
                            <a href="update-profile.php" class="btn btn-primary ">Edit Profile</a>

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