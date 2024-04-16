<?php
    include('top.php');
    $name = $_SESSION['username'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "userpanel";

        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>a fancy table</title> 
  <style>
    
    table, th, td {
    padding: 30px; 
    border: 1px solid #DCDCDC;
    
    }
    
    table { 
    border-collapse: collapse; 
    overflow: auto;
    font-family: "Ubuntu", "Verdana", "Arial", sans-serif;
    text-align: center;
    width:100%; 
    }
    
    tr:hover {
    background-color: #e6e6e6; 
    }
    
    tr.main-heading {
    line-height: 10%;
    background-color: #32B2B2;
    color: white;
    }
    
    tr.sub-heading {
    line-height: 150%;
    background-color: #149494;
    color: white;
    }
    
    tr.buy-now-footer {
    line-height: 150%;
    background-color: #149494;
    font-weight: bold;
    font-size: 20px;
    }
  </style>
</head>
<body>
<center>
<table>
    <thead>
        <br><br><br>
        <tr class="sub-heading">
            <th id="sh-co1" scope="col">ID</th>
            <th id="sh-co1" scope="col">Username</th>
            <th id="sh-co2" scope="col">File Name</th>
            <th id="sh-co3" scope="col">File Type</th>
            <th id="sh-co4" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $sql = "SELECT * FROM uploadfile WHERE username = '$name' ORDER BY id ASC";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['filename']; ?></td>
                <td><?php echo $row['filetype']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" style="color: red; text-decoration: underline;">DELETE</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
    <tr class="buy-now-footer">
        <td colspan="3">FILE DATA OF PDF UPLOADED FILE</td>
        &nbsp;&nbsp; <!-- This space might not be effective in this context, and it's better to use CSS for spacing. -->
        <td  colspan="3">
        <button>
            <a style="text-decoration:none;color:black" href="upload-file.php">Back</a>
        </button>
        </td>
    </tr>
</tfoot>

</table>

</center>
<footer id="footer" class="footer">
        <div class="copyright">
          &copy; Copyright <strong><span>PRINTTECH</span></strong>. All Rights Reserved
        </div>

      </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/chart.js/chart.umd.js"></script>
      <script src="assets/vendor/echarts/echarts.min.js"></script>
      <script src="assets/vendor/quill/quill.min.js"></script>
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
</body>
</html>