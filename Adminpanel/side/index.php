<?php
include("header.php");
include("nav.php");
include("side.php");


$count = 0;
$query = "SELECT COUNT(*) AS total_users FROM `users`"; // using COUNT(*) to directly get the count from the database table
$result = mysqli_query($conn, $query);

if ($result) {
    $row = $result->fetch_assoc();
    $count = $row['total_users'];
} else {
    echo "Error fetching total users count: " . mysqli_error($conn);
}

$count1 = 0;
$query1 = "SELECT COUNT(*) AS total_orders FROM `order`"; // using COUNT(*) to directly get the count from the database table
$result1 = mysqli_query($conn, $query1);

if ($result1) {
    $row1 = $result1->fetch_assoc();
    $count1 = $row1['total_orders'];
} else {
    echo "Error fetching total orders count: " . mysqli_error($conn);
}

$count2 = 0;
$query2 = "SELECT COUNT(*) AS total_admins FROM `admin`"; // using COUNT(*) to directly get the count from the database table
$result2 = mysqli_query($conn, $query2);

if ($result2) {
    $row2 = $result2->fetch_assoc();
    $count2 = $row2['total_admins'];
} else {
    echo "Error fetching total admins count: " . mysqli_error($conn);
}

$count3 = 0;
$query3 = "SELECT COUNT(*) AS total_products FROM `product`"; // using COUNT(*) to directly get the count from the database table
$result3 = mysqli_query($conn, $query3);

if ($result3) {
    $row3 = $result3->fetch_assoc();
    $count3 = $row3['total_products'];
} else {
    echo "Error fetching total products count: " . mysqli_error($conn);
}


// Data for the Pie Chart 
$data = [
    "Users" => $count,
    "Orders" => $count1,
    "Admins" => $count2,
    "Products" => $count3
];

// Convert data to JSON format!!!
$data_json = json_encode($data);
    ?>


<br><br><br><br><br>


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3" style="margin-bottom: 10px;">
                    <div class="card bg-primary " style="width: 14rem;">
                        <div class="card-body">
                          <h2 class="card-title font-weight-bolder text-light" style="font-weight:bolder;font-size:large;"><?php echo $count; ?></h2>
                          <h6 class="card-subtitle mb-2  text-light">Users</h6>
                          <!-- <i class="bi bi-bar-chart" style="font-size: 5rem; width: 5rem; height: 5rem;"></i> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 10px;">
                    <div class="card bg-warning " style="width: 14rem;">
                        <div class="card-body">
                          <h2 class="card-title font-weight-bolder text-light" style="font-weight:bolder;font-size:large;"><?php echo $count1; ?></h2>
                          <h6 class="card-subtitle mb-2  text-light">Orders</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 10px;">
                     <div class="card bg-success " style="width: 14rem;">
                        <div class="card-body">
                          <h2 class="card-title font-weight-bolder text-light" style="font-weight:bolder;font-size:large;"><?php echo $count2; ?></h2>
                          <h6 class="card-subtitle mb-2  text-light">Admins</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 10px;">
                    <div class="card bg-danger " style="width: 14rem;">
                        <div class="card-body">
                          <h2 class="card-title font-weight-bolder text-light" style="font-weight:bolder;font-size:large;"><?php echo $count3; ?></h2>
                          <h6 class="card-Subtitle mb-2  text-light">Products</h6>
                        </div>
                    </div>
                </div>
                <div style="width: 50%; border: 1.5px solid #ccc; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <canvas id="myChart"></canvas>
    </div>
            </div>
        </div>
    </div>
</div>












    <script>
        // Parse data from PHP to JavaScript
        var data = <?php echo $data_json; ?>;
        var labels = Object.keys(data);
        var values = Object.values(data);

        // Create pie chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Data Distribution'
                }
            }
        });
    </script>
<?php
  include('footer.php');
?>