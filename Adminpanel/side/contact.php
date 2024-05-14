<?php
include("header.php");
include("nav.php");
include("side.php");


?>
<main id="main" class="main">
  <h1 class="text-center fs-1 fw-bold"  id="color">Feedbacks</h1>
  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database -->
<?php
if (isset($_POST['delete'])) {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        
        // SQL DELETE statement
        $sqlquery = "DELETE FROM `feedback` WHERE id = $id";

        // Execute the query
        $dresult = mysqli_query($conn, $sqlquery);

        if ($dresult) {
           echo "<script>alert('Record deleted successfully');</script>";

        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "No ID specified for deletion";
        
    }
}

$query="SELECT * FROM `feedback` ";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
   while($row=$result->fetch_assoc()){
    
    ?>

         <tr class="text-center">
         <td ><?php echo $row['name']; ?></td>
         <td ><?php echo $row['email']; ?></td>
         <td ><?php echo $row['subject']; ?></td>
         <td ><?php echo $row['message']; ?></td>
         <td >
            <form action="" method="post">
            <button type="submit" class="btn btn-primary" value="<?php echo $row['id']; ?>" name="delete">Delete</button>
 </form>
        </td>
        </tr>
      </form>
      

      <?php
        
      }
  }


?>
    </tbody>
  </table>


    <!-- <button class="btn btn-primary" style="float:right;">
    <a class="nav-link collapsed" href="usergraph.php">
        <i class="bi bi-bar-chart"></i>
        <span>User Graph</span>
    </a>
</button> -->


  
</main>






<?php
include("footer.php");

?>