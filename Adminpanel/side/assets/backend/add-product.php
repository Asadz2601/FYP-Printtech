<?php
// session_start();


if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $size = $_POST['size'];
    $pquality = $_POST['pquality'];
    $printsize = $_POST['printsize'];
    $cutting = $_POST['cutting'];

    $sql = "INSERT INTO product (pname, size, pquality, printsize, cutting) VALUES ('$pname', '$size', '$pquality', '$printsize', '$cutting')";
    // Check if the username already exists
    $checkQuery = "SELECT * FROM product WHERE pname = '$pname'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Username already exists, show error
        echo "<script>alert('Product is already exist. Please enter another product');</script>";

    } else {
        // Username is unique, proceed with account creation
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Product Added');</script>";
        } else {
            echo "error";
        }
    }
}

// Close the database connection
$conn->close();
?>


