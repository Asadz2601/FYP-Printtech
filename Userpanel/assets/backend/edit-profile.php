
<?php
session_start();
$username = $_SESSION['username'];

if (isset($_POST['update'])) {
    // Assuming you have established a database connection
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve email from form
        $email = $_POST['email'];

        // Prepare SQL statement to check if email already exists with a different username
        $sql_check_email = "SELECT * FROM profile WHERE email = :email AND username != :username";
        $stmt_check_email = $pdo->prepare($sql_check_email);
        $stmt_check_email->bindParam(':email', $email);
        $stmt_check_email->bindParam(':username', $username);
        $stmt_check_email->execute();

        // Check if email exists with a different username
        if ($stmt_check_email->rowCount() > 0) {
            // Email exists with another username, show error message
            $error_message = "This email is already associated with another profile. Please select another email.";
        } else {
            // Prepare SQL statement to update profile
            $b = $_POST['fullname'];
            $c = $_POST['username'];
            $d = $_POST['about'];
            $e = $_POST['company'];
            $f = $_POST['job'];
            $g = $_POST['country'];
            $h = $_POST['address'];
            $i = $_POST['phone'];
            $j = $_POST['email'];
            $k = $_POST['twitter'];
            $l = $_POST['facebook'];
            $m = $_POST['instagram'];
            $n = $_POST['linkdin'];

            // Check if a new picture is uploaded
            if ($_FILES['pic']['name']) {
                $a = $_FILES['pic']['name'];
                $tmp_name = $_FILES['pic']['tmp_name'];
                $destination = "uploads/img/" . $_FILES['pic']['name'];
                move_uploaded_file($tmp_name, $destination);

                $sql_update_profile = "UPDATE profile SET pic=?, fullname=?, username=?, about=?, company=?, job=?, country=?, address=?, phone=?, email=?, twitter=?, facebook=?, instagram=?, linkdin=? WHERE username=?";
                $stmt_update_profile = $pdo->prepare($sql_update_profile);
                $stmt_update_profile->execute([$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $username]);
            } else {
                $sql_update_profile = "UPDATE profile SET fullname=?, username=?, about=?, company=?, job=?, country=?, address=?, phone=?, email=?, twitter=?, facebook=?, instagram=?, linkdin=? WHERE username=?";
                $stmt_update_profile = $pdo->prepare($sql_update_profile);
                $stmt_update_profile->execute([$b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $username]);
            }

            if ($stmt_update_profile) {
                echo "<script>alert('Update Successfully');</script>";
            } else {
                echo "Error occurred while updating the record!<br>";
                echo "Reason: ", $pdo->errorInfo()[2];
            }
        }
    }
}
?>

<?php
// session_start();
// $username = $_SESSION['username'];

// if (isset($_POST['update'])) {
//     // Assuming you have established a database connection
//     // Check if form is submitted
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         // Retrieve email from form
//         $email = $_POST['email'];

//         // Prepare SQL statement to check if email already exists
//         // $sql_check_email = "SELECT * FROM profile WHERE email = :email";
//         $sql_check_email = "SELECT * FROM profile WHERE email = :email AND username != :username";
//         $stmt_check_email = $pdo->prepare($sql_check_email);
//         $stmt_check_email->bindParam(':email', $email);
//         $stmt_check_email->bindParam(':username', $username);
//         $stmt_check_email->execute();

//         // Check if email exists
//         if ($stmt_check_email->rowCount() > 0) {
//             // Email exists, show error message
//             $error_message = "This email is already associated with an existing profile. Please select another email.";
//         } else {
//             $a = $_FILES['pic']['name'];
//             $tmp_name = $_FILES['pic']['tmp_name'];
//             $destination = "uploads/img/" . $_FILES['pic']['name'];
//             move_uploaded_file($tmp_name, $destination);
//             $b = $_POST['fullname'];
//             $c = $_POST['username'];
//             $d = $_POST['about'];
//             $e = $_POST['company'];
//             $f = $_POST['job'];
//             $g = $_POST['country'];
//             $h = $_POST['address'];
//             $i = $_POST['phone'];
//             $j = $_POST['email'];
//             $k = $_POST['twitter'];
//             $l = $_POST['facebook'];
//             $m = $_POST['instagram'];
//             $n = $_POST['linkdin'];

//             $sql_update_profile = "UPDATE profile SET pic=?, fullname=?, username=?, about=?, company=?, job=?, country=?, address=?, phone=?, email=?, twitter=?, facebook=?, instagram=?, linkdin=? WHERE username=?";
//             $stmt_update_profile = $pdo->prepare($sql_update_profile);
//             $stmt_update_profile->execute([$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $username]);
            
//             if ($stmt_update_profile) {
//                 echo "<script>alert('Update Successfully');</script>";
//             } else {
//                 echo "Error occurred while updating the record!<br>";
//                 echo "Reason: ", $pdo->errorInfo()[2];
//             }
//         }
//     }
// }
?>
