<?php
include('header.php');
include('nav.php');
include('side.php');
include('assets/backend/upload-file.php');
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload File</h1>
    </div><!-- End Page Title -->


    



    <section class="section contact">

      <div class="row gy-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Note:</h5>
            <ol style="font-family:'Times New Roman', Times, serif;">
          <li>
            Make the design and then upload file here. 
          </li>
          <li>
            Only Pdf file Upload here.
          </li>
          <li>
            Make Sure your design size will be perfect.
          </li>
        </ol>
        <h3 style="font-family:'Times New Roman', Times, serif; font-weight: bold;">UPLOAD YOUR DESIGN FILE</h3>
            <div class="mb-3">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
               <!-- <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" /> -->
                <input style="height: 150px;" class="form-control" name="pdffile" type="file" id="upload" required>
            </div>
            <div class="pre-next-btn" style="margin-top: 25px; float: right;">
              <!-- <button id="pre-next" name="submit" type="submit">Previous</button> -->
              <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="index.php">Previous</a>
              <!-- <a style="text-decoration:none;color:black" href="index.php">Previous</a></button> &nbsp; -->
              <button style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" class="btn" type="submit" name="submit">Upload</button>  
              <button style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" class="btn" type="delete" name="delete">Delete</button>  
              <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="customerdetail.php">Next</a>
            </div>
          </div>
          </form>
        </div>

      </div>
      </div>

    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PRINTTECH</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <!-- <script src="assets/js/main.js"></script> -->
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>
</body>

</html>