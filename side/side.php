

<aside id="sidebar" class="sidebar bg-secondary">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <?php
// Assuming you have obtained the username and password from the login mechanism
$username = $_SESSION['username']; // Change this based on your form field names
// $password = $_POST['password']; // Change this based on your form field names

// Check if username and password are "admin"
if ($username === "admin" ) {
    // Display SuperAdmin link
    echo '<li class="nav-item">
            <a class="nav-link collapsed" href="super-admin.php">
              <i class="bi bi-menu-button-wide"></i><span>SuperAdmin</span></i>
            </a>
          </li>';

          echo '<li class="nav-item">
          <a class="nav-link collapsed" href="view-admin.php">
          <i class="bi bi-view-list"></i><span>View Admin</span></i>
          </a>
        </li>';
}
?><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="view-user.php">
    <i class="bi bi-view-list"></i><span>View Users</span></i>
    </a>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="add-product.php">
      <i class="bi bi-layout-text-window-reverse"></i><span>Add Product</span></i>
    </a>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="view-product.php">
    <i class="bi bi-view-list"></i><span>View Product</span></i>
    </a>
  </li><!-- End Tables Nav -->
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="all-orders.php">
    <i class="bi bi-list-stars"></i><span>All Orders</span></i>
    </a>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="design.php">
      <i class="bi bi-layout-text-window-reverse"></i><span>Design</span></i>
    </a>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pending-order.php">
    <i class="bi bi-hourglass"></i><span>Pending Order</span></i>
    </a>
  </li><!-- End Icons Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="payment.php">
    <i class="bi bi-credit-card-2-back"></i><span>Payment</span></i>
    </a>
  </li><!-- End Icons Nav -->

  <li class="nav-heading text-light">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="graph.php">
    <i class="bi bi-bar-chart"></i>
        <span>Profit Graph</span>
    </a>
</li>
 
<!-- End Contact Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="contact.php">
    <i class="bi bi-bar-chart"></i>
        <span>Feedback</span>
    </a>
</li>
 
<!-- End Contact Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="report.php">
      <i class="bi bi-envelope"></i>
      <span>Report</span>
    </a>
  </li><!-- End Contact Page Nav -->
  


</ul>

</aside><!-- End Sidebar-->

