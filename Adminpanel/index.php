<?php
include("header.php");
include("nav.php");

include("connect/db.php");
include("side.php");

if(isset($_POST['status'])){
  $status = $_POST['status'];
  $id = $_POST['id'];
  $statussql = "UPDATE `order` SET status = '$status' WHERE id = $id";
  
  $statusres = mysqli_query($conn,$statussql);
  
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
        $orderquery = mysqli_query($conn,"SELECT * FROM `order`");
        //print_r($orderquery);
        while($row = mysqli_fetch_assoc($orderquery)){
          ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['order_name'] ?></td>
              <td><?php echo $row['size'] ?></td>
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
              <td>
                <form action="index.php" method="post">
                  <select class="form-control" name="status" onchange="form.submit()">
                    <option selected disabled ><?php echo $row['status']; ?></option>
                    <option value="Pending">Pending</option>
                    <option value="Working">Working</option>
                    <option value="Delivered">Delivered</option>
                  </select>
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </form>
              
              </td>
            </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
  <div class="mb-3">
  <button class="btn btn-primary mb-5" style="float:right;">
      <a class="nav-link collapsed" href="ordergraph.php">
          <i class="bi bi-bar-chart"></i>
          <span>Order Graph</span>
      </a>
  </button>
  </div>
</main>


<?php
 
include("footer.php");

?>