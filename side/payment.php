<?php
include("header.php");
include("nav.php");
include("side.php");

?>

<main id="main" class="main">
    <h1 class="text-center">Payment</h1>
    <tbody>

        <table class="table " id="dashboardTable">
            <thead>
                <tr class="text-center">
                    <th scope="col">Order # </th>
                    <th scope="col">Username</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Payment Slip</th>

                </tr>
            </thead>
            <tbody>
                <!-- Fetch data from database -->
                <?php

                $orderquery = mysqli_query($conn, "SELECT * FROM `easypaisa`");

                //print_r($orderquery);
                while ($row = mysqli_fetch_assoc($orderquery)) {
                ?>
                    <tr>
                        <td><?php echo $row['order_id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['total_payment'] ?></td>
                        
                        <td>
                            <?php

                            // Display the PDF file using <embed> tag
                            echo "<embed src='../../user-panel/uploads/easypaisa/" . $row['image'] . "' width='100%' height='600px' />";
                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>
                <?php
                $orderquery = mysqli_query($conn, "SELECT * FROM `stripe`");
                //print_r($orderquery);
                while ($row = mysqli_fetch_assoc($orderquery)) {
                ?>
                    <tr>
                        <td><?php echo $row['order_id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['total_payment'] ?></td>
                        <td>
                            <?php

                            // Display the PDF file using <embed> tag
                            echo "<embed src='../../user-panel/uploads/stripe/" . $row['image'] . "'  width='80%' height='500px' />";
                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</main>

<?php
include('footer.php');
?>