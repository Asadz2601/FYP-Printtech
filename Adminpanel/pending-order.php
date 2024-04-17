<?php
include("header.php");
include("nav.php");
include("side.php");


?>


<main id="main" class="main">
  <h1 class="text-center">Pending Orders</h1>
  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <th scope="col">Order # </th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database -->
<?php
$query="SELECT * FROM `order` where status='Pending' ";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
   while($row=$result->fetch_assoc()){
    
    ?>


      <form action="" method="post">
         <tr class="text-center">
            <td  ><?php echo $row['id']; ?></td>
         <td ><?php echo $row['name']; ?></td>
         <td ><?php echo $row['size']; ?></td>
         <td >
            <select class="form-select" name="status" aria-label="Default select example">
              <option  selected disabled ><?php echo $row['status']; ?></option>
              <option value="1">Pending</option>
              <option value="2">Verified</option>
              <option value="3">Delivered</option>
            </select>
          </td>
          <td >
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
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