<?php
include("header.php");
include("nav.php");

// if (!(isset($_SESSION['username']))) {
//   header("location:login.php");
// }

include("connect/db.php");
include("side.php");

// Update Status of Order
$username=$_SESSION['username'];


// // Edit the Status
// if(isset($_REQUEST['edit'])) {

//     // Assuming you have sanitized the input, consider using mysqli_real_escape_string
//     $status = $_REQUEST['status'];
//     $orderId = $row['id']; // Assuming you have the $row['order-id'] available
//     $username = mysqli_real_escape_string($conn, $username); // Assuming you have $username available

//     $sql = "UPDATE `order` SET `status`='$status' WHERE id = '$orderId' AND username = '$username'";
//     echo $sql; // For debugging purposes, you can remove this line later
//     exit;

//     if(mysqli_query($conn, $sql)) {
//         echo "Update";
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }
// }

// if(isset($_REQUEST['edit'])){
  
//   $status = $_REQUEST['status'];
//   echo $status;
//   exit;
//   $updateQuery = "UPDATE `order` SET `status`='$status' WHERE id='$id'";
//   if(mysqli_query($conn,$updateQuery)){
//       echo "<script>alert('Updated Successfuly!');</script>";

//   }
// }
if(isset($_POST['edit'])) {
  $id = $_POST['id'];
  $status = $_POST['status'];

  // Check if ID is set
  if(empty($id)) {
      echo "ID not provided.";
      // Handle this case as needed, possibly redirect or show an error message.
  } else {
      // Update the status using a prepared statement
      $updateQuery = "UPDATE `order` SET `status`=$status WHERE id=$id";
      $stmt = mysqli_prepare($conn, $updateQuery);
      mysqli_stmt_bind_param($stmt, "si", $status, $id);

      if(mysqli_stmt_execute($stmt)) {
          echo "<script>alert('Updated Successfully!');</script>";
      } else {
          echo "Update failed: " . mysqli_error($conn);
      }

      mysqli_stmt_close($stmt);
  }
}


?>
<main id="main" class="main">
  <h1 class="text-center fs-1 fw-bold"  id="color">Orders</h1>
  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <th scope="col">Order # </th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database -->
<?php
$query="SELECT * FROM `order` ";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
   while($row=$result->fetch_assoc()){
    
    ?>


      <form action="" method="post">
         <tr class="text-center">
         <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <td  ><?php echo $row['id']; ?></td>
         <td ><?php echo $row['name']; ?></td>
         <td ><?php echo $row['size']; ?></td>
         <td >
            <select class="form-select" name="status" aria-label="Default select example">
              <option  selected disabled><?php echo $row['status']; ?></option>
              <option value="Pending">Pending</option>
              <option value="Verified">Verified</option>
              <option value="delivered">Delivered</option>
            </select>
          </td>
          <td >
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
          </td>
        </tr>
      </form>

      <?php
        
      }
  }


?>
    </tbody>
  </table>
</main>
<?php
 
include("footer.php");

?>