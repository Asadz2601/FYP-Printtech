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
            <h1 class="text-center">Design</h1>
            <table class="table" id="dashboardTable">
                <!-- Table headers -->
                <thead>
                    <tr class="text-center">
                        <th scope="col">Order ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Total Payment</th>
                        <th scope="col">Delivery</th>
                        <th scope="col">Delivery Address</th>
                        <!-- <th scope="col">File Name</th> -->
                        <th scope="col">File</th>
                        <th class="dwn" scope="col">Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from the database
                    $order_query = mysqli_query($conn, "SELECT uploadfile.*, customerdetail.total_payment, customerdetail.delivery, customerdetail.delivery_address FROM uploadfile LEFT JOIN customerdetail ON uploadfile.order_id = customerdetail.order_id");

                    if (!$order_query) {
                        die("Query failed: " . mysqli_error($conn));
                    }

                    while ($row = mysqli_fetch_assoc($order_query)) {
                        $order_id = htmlspecialchars($row['order_id']);
                        $username = htmlspecialchars($row['username']);
                        $filename = htmlspecialchars($row['filename']);
                        $payment = htmlspecialchars($row['total_payment']);
                        $delivery = htmlspecialchars($row['delivery']);
                        $delivery_address = htmlspecialchars($row['delivery_address']);
                    ?>
                        <!-- Display fetched data in table rows -->
                        <tr>
                            <td><?php echo $order_id; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $payment; ?></td>
                            <td><?php echo $delivery; ?></td>
                            <td><?php echo $delivery_address; ?></td>
                            <!-- <td> -->
                            <?php
                            // echo $filename; 
                            ?>
                            <!-- </td> -->
                            <td>
                                <?php
                                // Display the PDF file using <embed> tag
                                echo "<embed src='../../user-panel/upload_PDF/" . $filename . "' type='application/pdf' width='100%' height='600px' />";
                                ?>
                            </td>
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
    <li><a class="dropdown-item" href="order-detail.php">Order-Details</a></li>
    <li><a class="dropdown-item" href="customer-detail.php">Customer-Details</a></li>
  </ul>
</div>
                </div>
            </div>
            
        </div>
    </div>
</div>



<script>
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
                        <th scope="col">Total Payment</th>
                        <th scope="col">Delivery</th>
                        <th scope="col">Delivery Address</th>
                        <th scope="col">File Name</th>
                    </tr>`;

                clonedTable.appendChild(clonedHead); // Add cloned table header

                const order_id = row.querySelector('td:nth-child(1)').textContent.trim();
                const username = row.querySelector('td:nth-child(2)').textContent.trim();
                const total_payment = row.querySelector('td:nth-child(3)').textContent.trim();
                const delivery = row.querySelector('td:nth-child(4)').textContent.trim();
                const delivery_address = row.querySelector('td:nth-child(5)').textContent.trim();
                const filename = row.querySelector('td:nth-child(6)').textContent.trim();

                // Create a new row in the cloned table with the extracted data
                const clonedRow = document.createElement('tr');
                clonedRow.innerHTML = `
                    <td>${order_id}</td>
                    <td>${username}</td>
                    <td>${total_payment}</td>
                    <td>${delivery}</td>
                    <td>${delivery_address}</td>
                    <td>${filename}</td>`;

                // Add the cloned row to the cloned table body
                clonedBody.appendChild(clonedRow);

                clonedTable.appendChild(clonedBody); // Add cloned table body to cloned table

                // Convert cloned table to PDF
                html2pdf().from(clonedTable).save();
            });
        });
    };
</script>




<?php
// Include footer
include("footer.php");
?>