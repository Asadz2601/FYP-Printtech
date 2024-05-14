<?php
include("header.php");
include("nav.php");
include("side.php");


?>


<main id="main" class="main">
  <h1 class="text-center">Pending Orders</h1>
  <tbody>

  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <th scope="col">Order # </th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Status</th>
        
      </tr>
    </thead>
    <tbody>
<!-- Fetch data from database -->
      <?php
        $orderquery = mysqli_query($conn,"SELECT * FROM `order` WHERE status = 'Pending'");
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
                    case 'Recieved':
                        $statusColor = 'green';
                        break;
                    case 'Pending':
                        $statusColor = 'red';
                        break;
                    case 'Transporting':
                        $statusColor = 'yellow';
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
</main>






<?php
include("footer.php");

?>