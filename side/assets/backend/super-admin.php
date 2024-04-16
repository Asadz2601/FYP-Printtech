<?php
// session_start();


if (isset($_POST['submit'])) {
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (name, username, email, phone, address, password) VALUES ('$fullname', '$username', '$email', '$phone', '$address', '$password')";
    // Check if the username already exists
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


