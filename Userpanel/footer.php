x<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PRINTTECH</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Datatable JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Datatable JS File -->
<script>
  let table = new DataTable('#dashboardTable');
</script>
<script>
    
</script>

<script>
        // Get the select element
        var deliverySelect = document.getElementById("inputState");
        // Get the total amount input element
        var totalPaymentInput = document.getElementById("total_payment");

        // Add event listener for change event
        deliverySelect.addEventListener("change", function() {
            // Get the selected option
            var selectedOption = deliverySelect.value;
            // If "Yes" is selected
            if (selectedOption === "Yes") {
                // Update the total amount by adding 200
                var newTotalAmount = parseFloat(totalPaymentInput.value) + 200;
                totalPaymentInput.value = newTotalAmount.toFixed(2); // Round to 2 decimal places

                // Send AJAX request to update total_amount in order table
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "update_total_amount.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response if needed
                        console.log(xhr.responseText);
                    }
                };
                xhr.send("total_amount=" + newTotalAmount); // Send the new total amount to the server
            } else {
                // If "No" is selected, revert to the original total amount
                totalPaymentInput.value = "100";
            }
        });
    </script>


<script>
function validatePassword() {
    const newPassword = document.getElementById('newPassword');
    const renewPassword = document.getElementById('renewPassword');
    const errorDiv = document.getElementById('password-error');
    const errorMatchDiv = document.getElementById('password-match-error');

    const newPasswordValue = newPassword.value;
    const renewPasswordValue = renewPassword.value;

    const password = renewPasswordValue;

    if (password.length < 8) {
        errorDiv.textContent = 'Password must be at least 8 characters long.';
        renewPassword.setCustomValidity('Password too short');
        return;
    }

    if (!/[a-zA-Z]/.test(password)) {
        errorDiv.textContent = 'Password must contain at least one alphabet.';
        renewPassword.setCustomValidity('Missing alphabet');
        return;
    }

    // Check for at least 2 special characters
    if ((password.match(/[!@#$%^&*(),.?":{}|<>]/g) || []).length < 2) {
        errorDiv.textContent = 'Password should contain at least 2 special characters.';
        renewPassword.setCustomValidity('Insufficient special characters');
        return;
    }

    // Check for a number
    if (!/\d/.test(password)) {
        errorDiv.textContent = 'Password should contain at least one number.';
        renewPassword.setCustomValidity('No number found');
        return;
    }

    // Check if newPassword and renewPassword match
    if (newPasswordValue !== renewPasswordValue) {
        errorMatchDiv.textContent = 'Passwords do not match.';
        renewPassword.setCustomValidity('Passwords do not match');
        return;
    } else {
        errorMatchDiv.textContent = ''; // Clear the error message if passwords match
        renewPassword.setCustomValidity(''); // Reset the validation state
    }

    // If all checks pass, reset the error message and validation state
    errorDiv.textContent = '';
    renewPassword.setCustomValidity('');
}
</script>



</body>

</html>