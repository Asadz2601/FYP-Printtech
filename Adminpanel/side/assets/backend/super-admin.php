<?php
// session_start();


if (isset($_POST['submit'])) {
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];  
    
    $folder = "uploads/".$filename;

    $sql = "INSERT INTO admin (name, username, email, phone, address, password,image) VALUES ('$fullname', '$username', '$email', '$phone', '$address', '$password','$filename')";



    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
        // Store filename in session
         // Corrected variable name
        
    } else {
        $msg = "Failed to upload image";
        // Display message for failed upload
        echo "<script>alert('not upload image');</script>";
        // Stop execution if image upload fails
        die();
    }

    $checkQuery = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Username already exists, show error
        echo "<script>alert('Username already exist. Please enter another username');</script>";

    } else {
        // Username is unique, proceed with account creation
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Account Created');</script>";
        } else {
            echo "error";
        }
    }
}

// Close the database connection
$conn->close();
?>


