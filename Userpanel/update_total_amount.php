<?php
        include('connect/db.php');

?>

<?php
$order_id=$_SESSION['order_id'];
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if total_amount is set in the POST data
    if (isset($_POST["total_amount"])) {
        // Sanitize the input
        $totalAmount = floatval($_POST["total_amount"]);

        // Here you would typically perform the database update
        // Replace the following lines with your database connection and update query

        // Example database connection
        // $servername = "your_servername";
        // $username = "your_username";
        // $password = "your_password";
        // $dbname = "your_database";

        // // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);

        // // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // Example update query
        $sql = "UPDATE `order` SET total_amount = $totalAmount WHERE id = $order_id"; // Replace "order_table" and "id" as per your database structure

        if ($conn->query($sql) === TRUE) {
            echo "Total amount updated successfully";
        } else {
            echo "Error updating total amount: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Total amount is not set in the request";
    }
} else {
    echo "Invalid request method";
}
?>
