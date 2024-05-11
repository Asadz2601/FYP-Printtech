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
    // Fetch number of user accounts created in each month
    $user_handle = $link->prepare('SELECT MONTH(date) AS month_num, COUNT(*) AS user_count FROM `users` GROUP BY MONTH(date)');
    $user_handle->execute(); 
    
    $user_result = $user_handle->get_result();
    
    $user_dataPoints = array();
    while ($user_row = $user_result->fetch_object()) {
        // Convert month number to month name
        $user_month_name = date("F", mktime(0, 0, 0, $user_row->month_num, 1));
        array_push($user_dataPoints, array("label"=> $user_month_name, "y"=> $user_row->user_count));
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
    text: "Monthly User Registrations",
    fontColor: "#4F81BC", // Title font color
    fontFamily: "Arial", // Title font family
    fontSize: 24 // Title font size
  },
  axisY: {
    title: "User Registrations",
    titleFontColor: "#51CDA0",
    lineColor: "#51CDA0",
    labelFontColor: "#51CDA0",
    maximum: 1000 // Adjust the maximum value according to your data
  },
  axisX: {
    title: "Month",
    titleFontColor: "#4F81BC", // X-axis title font color
    labelFontColor: "#4F81BC", // X-axis label font color
    fontFamily: "Arial" // X-axis font family
  },
  data: [{
    type: "column",
    color: "#4F81BC", // Column color
    showInLegend: true,
    legendText: "User Registrations",
    legendMarkerColor: "#51CDA0",
    dataPoints: <?php echo json_encode($user_dataPoints, JSON_NUMERIC_CHECK); ?>
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