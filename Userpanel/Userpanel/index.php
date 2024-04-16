  <?php
    include('top.php');
    
    $name = $_SESSION['username'];

    $sql = "SELECT username FROM profile WHERE username = '$name'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);

        // Now you can use $row to access the data
        // ...
    } else {
        // Handle the error, for example:
        die("Error in SQL query: " . mysqli_error($conn));
    }


  ?>

  <!-- ======= Sidebar ======= -->
  <?php
 include('sidebar.php');
?>

  <main id="main" class="main">
  <div class="pagetitle">
  <h1>Design Tool</h1>
</div><!-- End Page Title -->

<section class="section contact">

  <div class="row gy-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Steps</h5>
        <ol style="font-family:'Times New Roman', Times, serif;">
          <li>
            First you click on this button. 
          </li>
          <li>
            The Canva Page is showing you for design.
          </li>
          <li>
            And search for which service you want.
          </li>
          <li>
            Then you Signup that website.
          </li>
          <li>
            If you didn't understand please click the below video to understand the process.
          </li>
        </ol>
        <h1 class="card-title">DESIGN TOOL</h1>
        <a href="https://www.canva.com/" target="_blank" style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">Design with Canva</a>
        <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;"
        href="https://new.express.adobe.com/?referrer=https%3A%2F%2Fwww.google.com%2F&url=%2Fexpress%2F&ctaid=floating-button&_branch_match_id=1185161674841146534&_branch_referrer=H4sIAAAAAAAAAxWLQQrDIBAAX5PeqtDeChLqIYWecik9a7IxEusu6wb7%2FBgYGBiYVYTKQ2s3o4dCjjfCIsoRqRTzpl9vtuPw%2BVrre4YFmIHNek7d%2FdndhkatVQXEkEBN%2BGvhsnMyzfAnhlLOMomLs1kSOok5XP0ugvkAonykRXwAAAA%3D" target="_blank">Design with Adobe Express</a>
        <h1 class="card-title">YOUTUBE LINK CANVA</h1>
        <iframe width="900" height="315" src="https://www.youtube.com/embed/9qMf2qW5bIc?si=ltD2rmxuNGjShdKD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/8tg4NPGFxDs?si=vKtdg70mkkL2_Dd-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
        <h1 class="card-title">YOUTUBE LINK ADOBE EXPRESS</h1>
        <iframe width="900" height="315" src="https://www.youtube.com/embed/p2SlkJiRM3Y?si=71eYyUOiJOg0Byyz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      
        <div class="pre-next-btn" style="margin-top: 25px; float: right;">
          <!-- <a id="pre-next" href="">Previous</a> -->
          <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="upload-file.php">Next</a>
        </div>
      </div>
    </div>

  </div>

</section>

    
  </main><!-- End #main -->

 <?php
  include('footer.php');
 ?>
 <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>