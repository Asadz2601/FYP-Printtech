<?php
include('header.php');
include('nav.php');
include('side.php');
include('assets\backend\change-pass.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9 card pt-3">
        <form action="" method="post">
                  <!-- That is the code of Renew Password -->
                  <h1 class="text-center pb-3 fw-bold " style="color: #012970;">Change Your Password</h1>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword" oninput="validatePassword()" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="renewPassword" oninput="validatePassword()" required>
                    </div>
                  </div>
                  <div id="password-match-error" style="color: red;"></div>

                  <div class="error-message" id="password-error"  style="color: red;"></div>

                  <div class="text-center pb-3">
                    <button type="submit" name="psubmit" class="btn btn-primary">Change Password</button>
                  </div>
                </form>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>