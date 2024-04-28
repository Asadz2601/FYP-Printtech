<?php
include("top.php");
include("sidebar.php");

include("connect/db.php");


// if(isset($_POST['status'])){
//   $status = $_POST['status'];
//   $id = $_POST['id'];
//   $statussql = "UPDATE `order` SET status = '$status' WHERE id = $id";
  
//   $statusres = mysqli_query($conn,$statussql);
  
// }


?>
<main id="main" class="main">
  <h1 class="text-center fs-1 fw-bold pt-2 pb-3"  id="color">My Orders</h1>
  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <th scope="col">Order # </th>
        <th scope="col">Order Name</th>
        <th scope="col">Size</th>
        <th scope="col">Quantity</th>
        <th scope="col">Payment</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database -->
      <?php
        $orderquery = mysqli_query($conn,"SELECT * FROM `order` Where username ='$username'");
        //print_r($orderquery);
        while($row = mysqli_fetch_assoc($orderquery)){
          ?>
            <tr>
              <td class="text-center"><?php echo $row['order_id'] ?></td>
              <td class="text-center"><?php echo $row['order_name'] ?></td>
              <td class="text-center"><?php echo $row['size'] ?></td>
              <td class="text-center"><?php echo $row['quantity'] ?></td>
              <td class="text-center"><?php echo $row['total_amount'] ?></td>
              <!-- <td> -->
                <?php 
                // echo $row['status'] 
                ?>
            <!-- </td> -->
              <td>
              <?php
                $status = $row['status'];
                $statusColor = '';

                switch ($status) {
                    case 'Delivered':
                        $statusColor = 'green';
                        break;
                    case 'Pending':
                        $statusColor = 'red';
                        break;
                    case 'Working':
                        $statusColor = 'blue';
                        break;
                    default:
                        // Default color if status does not match any case
                        $statusColor = 'black';
                        break;
                }
                ?>

                <span style="color: <?php echo $statusColor; ?>"><?php echo $status; ?></span>

              </td>
            </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
  <!-- <div class="mb-3">
  <button class="btn btn-primary mb-5" style="float:right;">
      <a class="nav-link collapsed" href="ordergraph.php">
          <i class="bi bi-bar-chart"></i>
          <span>Order Graph</span>
      </a>
  </button>
  </div> -->
</main>


<?php
 
include("footer.php");

?>