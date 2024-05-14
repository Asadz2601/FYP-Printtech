<?php

//  session_start(); // Start the session if not already started
include('connect/db.php');
$order_id = $_SESSION['order_id'];
// echo($order_id);
// die();

if(isset($_POST['submit'])) {
    $order_id = $_SESSION['order_id'];
    // echo($order_id);
    // die();       
    $name = $_POST['name'];
    $order_id = $_POST['order_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];
    $address = $_POST['address'];
    $delivery = $_POST['delivery'];
    $delivery_address = $_POST['delivery_address'];
    $totalpayment = $_POST['total_payment'];

    // Update total_amount in the order table
    $sql_update_profile = "UPDATE `order` SET total_amount=? WHERE order_id=?";
    $stmt_update_profile = $pdo->prepare($sql_update_profile);
    $stmt_update_profile->execute([$totalpayment, $order_id]);

    if ($stmt_update_profile->rowCount() > 0) {
        // Insert customer details into customerdetail table
        $sql = "INSERT INTO customerdetail (name,order_id, email, phone, whatsapp, address, delivery, delivery_address, total_payment) 
                VALUES (?, ?, ?,?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name,$order_id ,$email, $phone, $whatsapp, $address, $delivery, $delivery_address, $totalpayment]);

        if ($stmt->rowCount() > 0) {
            echo "<script>
                    alert('Customer Detail Entered Successfully');
                  </script>";
        } else {
            echo "Error: Unable to insert customer details";
        }
    } else {
        echo "Error: Unable to update total amount";
    }
}
?>
