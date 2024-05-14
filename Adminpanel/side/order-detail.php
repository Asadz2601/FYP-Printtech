<?php
// Include database connection
include("connect/db.php"); // Assuming you have a file named db_connection.php that establishes a database connection

// Include header and navigation
include("header.php");
include("nav.php");
?>

<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-lg-3">
            <?php include("side.php"); ?>
        </div>
        <div class="col-lg-9">
            <h1 class="text-center">Order Details</h1>
            <table class="table" id="dashboardTable">
                <!-- Table headers -->
                <thead>
                    <tr class="text-center">
                        <th scope="col">Order ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Paper Quality</th>
                        <th scope="col">Printing Side</th>
                        <th scope="col">Cutting</th>
                        <th scope="col">Quantity</th>
                        <!-- <th scope="col">Total Payment</th> -->
                        <th scope="col">Status</th>
                        <!-- <th scope="col">File Name</th> -->

                        <th class="dwn" scope="col">Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from the database
                    $order_query = mysqli_query($conn, "SELECT * FROM `order`");

                    if (!$order_query) {
                        die("Query failed: " . mysqli_error($conn));
                    }

                    while ($row = mysqli_fetch_assoc($order_query)) {
                        $order_id = htmlspecialchars($row['order_id']);
                        $username = htmlspecialchars($row['username']);
                        $order_name = htmlspecialchars($row['order_name']);
                        $size = htmlspecialchars($row['size']);
                        $paper_quality = htmlspecialchars($row['paper_quality']);
                        $printing_side = htmlspecialchars($row['printing_side']);
                        $cutting = htmlspecialchars($row['cutting']);
                        $quantity = htmlspecialchars($row['quantity']);
                        $payment = htmlspecialchars($row['total_amount']);
                        $status = htmlspecialchars($row['status']);
                    ?>
                        <!-- Display fetched data in table rows -->
                        <tr>
                            <td><?php echo $order_id; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $order_name; ?></td>
                            <td><?php echo $size; ?></td>
                            <td><?php echo $paper_quality; ?></td>
                            <td><?php echo $printing_side; ?></td>
                            <td><?php echo $cutting; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <!-- <td> -->
                            <?php
                            // echo $payment;
                            ?>
                            <!-- </td> -->
                            <td><?php echo $status; ?></td>
                            <!-- <td> -->
                            <?php
                            // echo $filename; 
                            ?>
                            <!-- </td> -->
                            <!-- <td> -->
                            <?php
                            // Display the PDF file using <embed> tag
                            // echo "<embed src='../../user-panel/upload_PDF/".$filename."' type='application/pdf' width='100%' height='600px' />";
                            ?>
                            <!-- </td> -->
                            <td>
                                <a href="../../user-panel/upload_PDF/<?php echo $filename; ?>" class="btn btn-primary download-btn" download>Download PDF</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6"></div>
                <div class="col-md-2">
                <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Details
  </button>
  <ul class="dropdown-menu">
    <!-- <li><a class="dropdown-item" href="order-detail.php">Order-Details</a></li> -->
    <li><a class="dropdown-item" href="customer-detail.php">Customer-Details</a></li>
  </ul>
</div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <script>
    window.onload = function() {
        // Add event listener to all download buttons
        const downloadButtons = document.querySelectorAll(".download-btn");
        downloadButtons.forEach(button => {
            button.addEventListener("click", (event) => {
                // Get the parent row of the clicked button
                const row = event.target.closest('tr');

                // Create a new table
                const clonedTable = document.createElement('table');
                clonedTable.classList.add('table', 'table-bordered'); // Add table and table-bordered classes

                // Create a new table body
                const clonedBody = document.createElement('tbody');

                // Clone the original table header
                const clonedHead = document.createElement('thead');
                clonedHead.innerHTML = `
                <tr class="text-center">
        <th scope="col">Order ID</th>
        <th scope="col">Username</th>
        <th scope="col">Order Name</th>
        <th scope="col">Size</th>
        <th scope="col">Paper Quality</th>
        <th scope="col">Printing Side</th>
        <th scope="col">Cutting</th>
        <th scope="col">Quantity</th>
    </tr>`;

                clonedTable.appendChild(clonedHead); // Add cloned table header

                const order_id = row.querySelector('td:nth-child(1)').textContent.trim();
                const username = row.querySelector('td:nth-child(2)').textContent.trim();
                const order_name = row.querySelector('td:nth-child(3)').textContent.trim();
                const size = row.querySelector('td:nth-child(4)').textContent.trim();
                const paper_quality = row.querySelector('td:nth-child(5)').textContent.trim();
                const printing_side = row.querySelector('td:nth-child(6)').textContent.trim();
                const cutting = row.querySelector('td:nth-child(7)').textContent.trim();
                const quantity = row.querySelector('td:nth-child(8)').textContent.trim();
                // Create a new row in the cloned table with the extracted data
                const clonedRow = document.createElement('tr');
                clonedRow.innerHTML = `
        <td>${order_id}</td>
        <td>${username}</td>
        <td>${order_name}</td>
        <td>${size}</td>
        <td>${paper_quality}</td>
        <td>${printing_side}</td>
        <td>${cutting}</td>
        <td>${quantity}</td>`;

                // Add the cloned row to the cloned table body
                clonedBody.appendChild(clonedRow);

                clonedTable.appendChild(clonedBody); // Add cloned table body to cloned table

                // Convert cloned table to PDF
                html2pdf().from(clonedTable).save();
            });
        });
    };
</script> -->
<script>
    window.onload = function() {
        // Add event listener to all download buttons
        const downloadButtons = document.querySelectorAll(".download-btn");
        downloadButtons.forEach(button => {
            button.addEventListener("click", (event) => {
                // Prevent the default action of the button
                event.preventDefault();

                // Get the parent row of the clicked button
                const row = event.target.closest('tr');

                // Create a new table
                const clonedTable = document.createElement('table');
                clonedTable.classList.add('table', 'table-bordered'); // Add table and table-bordered classes

                // Create a new table body
                const clonedBody = document.createElement('tbody');

                // Clone the original table header
                const clonedHead = document.createElement('thead');
                clonedHead.innerHTML = `
                    <tr class="text-center">
                        <th colspan="8">Order Detail</th> <!-- Adjusted to span all columns -->
                    </tr>
                    <tr class="text-center">
                        <th scope="col">Order ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Paper Quality</th>
                        <th scope="col">Printing Side</th>
                        <th scope="col">Cutting</th>
                        <th scope="col">Quantity</th>
                    </tr>`;

                clonedTable.appendChild(clonedHead); // Add cloned table header

                // Extract data from the row
                const order_id = row.querySelector('td:nth-child(1)').textContent.trim();
                const username = row.querySelector('td:nth-child(2)').textContent.trim();
                const order_name = row.querySelector('td:nth-child(3)').textContent.trim();
                const size = row.querySelector('td:nth-child(4)').textContent.trim();
                const paper_quality = row.querySelector('td:nth-child(5)').textContent.trim();
                const printing_side = row.querySelector('td:nth-child(6)').textContent.trim();
                const cutting = row.querySelector('td:nth-child(7)').textContent.trim();
                const quantity = row.querySelector('td:nth-child(8)').textContent.trim();
                
                // Create a new row in the cloned table with the extracted data
                const clonedRow = document.createElement('tr');
                clonedRow.innerHTML = `
                    <td>${order_id}</td>
                    <td>${username}</td>
                    <td>${order_name}</td>
                    <td>${size}</td>
                    <td>${paper_quality}</td>
                    <td>${printing_side}</td>
                    <td>${cutting}</td>
                    <td>${quantity}</td>`;

                // Add the cloned row to the cloned table body
                clonedBody.appendChild(clonedRow);

                clonedTable.appendChild(clonedBody); // Add cloned table body to cloned table

                // Convert cloned table to PDF and save with filename "order-detail.pdf"
                html2pdf().from(clonedTable).save(null, { filename: 'order-detail.pdf' });
            });
        });
    };
</script>






<?php
// Include footer
include("footer.php");
?>