<?php
include("header.php");
include("nav.php");

?>

<br><br><br><br>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <?php
        include("side.php");
      ?>
    </div>
    <div class="col-lg-9">
    <table class="table" id="invoice">
    <thead >
      <tr  class="text-center">
        <th scope="col">Order # </th>
        <th scope="col">Customer Name</th>
        <th scope="col">Size</th>
        <th scope="col">Payment</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database -->
      <?php
        $orderquery = mysqli_query($conn,"SELECT *
        FROM `order`
        WHERE MONTH(`Month`) = MONTH(CURRENT_DATE())
        AND YEAR(`Month`) = YEAR(CURRENT_DATE());
        ");
        //print_r($orderquery);
        while($row = mysqli_fetch_assoc($orderquery)){
          ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['size'] ?></td>
              <td><?php echo $row['total_amount'] ?></td>
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
  <button id="download" class="btn btn-primary">Download PDF</button>
    </div>
  </div>
</div>


<br><br><br><br>







<script>
  window.onload = function () {
      document.getElementById("download")
      .addEventListener("click", () => {
        const invoice = this.document.getElementById("invoice");
              console.log(invoice);
              console.log(window);
              var opt = {
                  margin: 1,
                  filename: 'MonthlyRecord.pdf',
                  image: { type: 'jpeg', quality: 0.98 },
                  html2canvas: { scale: 2 },
                  jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
              };
              html2pdf().from(invoice).set(opt).save();
          })
  }


</script>





<?php
include("footer.php");

?>