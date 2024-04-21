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
        <h1 class="text-center">Design</h1>
      <table class="table" id="dashboardTable">
        <thead>
          <tr class="text-center">
            <th scope="col">Order #</th>
            <th scope="col">Username</th>
            <th scope="col">File Name</th>
            <th class="dwn" scope="col">Download</th>
          </tr>
        </thead>
        <tbody>
          <!-- Fetch data from database -->
          <?php
            $orderquery = mysqli_query($conn,"SELECT * FROM `uploadfile` ");
            if (!$orderquery) {
              die("Query failed: " . mysqli_error($conn));
            }
            while($row = mysqli_fetch_assoc($orderquery)){
          ?>
          <tr>
            <td><?php echo htmlspecialchars($row['order_id']); ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['filename']); ?></td>             
            <td>
              <button class="btn btn-primary download-btn">Download PDF</button>
            </td>             
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br><br><br>

<script>
  window.onload = function () {
    // Add event listener to all download buttons
    const downloadButtons = document.querySelectorAll(".download-btn");
    downloadButtons.forEach(button => {
      button.addEventListener("click", () => {
        const row = button.closest("tr"); // Find the closest row containing the button
        const clonedRow = row.cloneNode(true); // Clone the row
        const clonedTable = document.createElement('table'); // Create a new table
        clonedTable.classList.add('table', 'table-bordered'); // Add table and table-bordered classes
        clonedTable.appendChild(document.createElement('thead')); // Add table head
        clonedTable.querySelector('thead');
        clonedTable.appendChild(document.querySelector('thead').cloneNode(true)); // Clone the original table header
        clonedTable.appendChild(document.createElement('tbody')); // Add table body
        clonedTable.querySelector('tbody').appendChild(clonedRow); // Add cloned row to table body

        const dwn = clonedTable.querySelector(".dwn"); // Find the download button in the cloned table
        if (dwn) dwn.remove();
        
        const downloadButton = clonedTable.querySelector(".download-btn"); // Find the download button in the cloned table
        if (downloadButton) downloadButton.remove(); // Remove the download button from the cloned table

        var opt = {
          margin: 1,
          filename: 'MonthlyRecord.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(clonedTable).set(opt).save();
      });
    });
  };
</script>

<?php
include("footer.php");
?>
