<?php
include("header.php");
include("nav.php");
include("side.php");


?>

<main id="main" class="main">
  <h1 class="text-center">Products</h1>
  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <!-- <th scope="col">Id </th> -->
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Quality</th>
        <th scope="col">Print Size</th>
        <th scope="col">Cutting</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database!!! -->
<?php
if (isset($_POST['delete'])) {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        
        // SQL DELETE statement
        $sqlquery = "DELETE FROM `product` WHERE id = $id";

        // Execute the query
        $dresult = mysqli_query($conn, $sqlquery);

        if ($dresult) {
           echo "<script>alert('Product deleted successfully');</script>";

        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "No ID specified for deletion";
        
    }
}

$query="SELECT * FROM `product` ";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
   while($row=$result->fetch_assoc()){
    
    ?>

         <tr class="text-center">
            <!-- <td  ><?php echo $row['id']; ?></td> -->
         <td ><?php echo $row['pname']; ?></td>
         <td ><?php echo $row['size']; ?></td>
         <td ><?php echo $row['pquality']; ?></td>
         <td ><?php echo $row['printsize']; ?></td>
         <td ><?php echo $row['cutting']; ?></td>
         <td >
            <form action="" method="post">
            <a class="btn btn-primary" href="edit-product.php?id=<?php echo $row['id']; ?>">Edit</a>
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
</main>






<?php
include("footer.php");

?>