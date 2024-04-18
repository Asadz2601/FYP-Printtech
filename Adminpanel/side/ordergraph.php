<?php

include("header.php");
include("nav.php");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "panel";

$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

try {
    $handle = $link->prepare('SELECT MONTH(Month) AS month_num, 
                                    COUNT(*) AS total_orders
                            FROM `order` 
                            GROUP BY MONTH(Month)');
    $handle->execute(); 
    
    $result = $handle->get_result();
    
    $dataPoints = array();
    while ($row = $result->fetch_object()) {
        // Convert month number to month name
        $month_name = date("F", mktime(0, 0, 0, $row->month_num, 1));
        array_push($dataPoints, array("label"=> $month_name, "y"=> $row->total_orders));
    }
} catch(Exception $ex) {
    echo "Error: " . $ex->getMessage();
}

$link->close();
?>

<!DOCTYPE HTML>
<html>
<head>  
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
  
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Monthly Orders"
  },
  axisY: {
    title: "Number of Orders"
  },
  axisX: {
    title: "Month"
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc  
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
  
}
</script>




</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <?php
          include('side.php');
        ?>
      </div>
      <div class="col-lg-9">
        <br><br><br><br><br><br>
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      </div>
    </div>
  </div>

</body>
</html>

<?php
  include('footer.php');
?>
