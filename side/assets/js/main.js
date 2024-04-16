
// for active of side bar menu
document.addEventListener("DOMContentLoaded", function () {
    var currentPath = window.location.pathname.split('/').pop();

    var sidebarItems = document.querySelectorAll('.nav-item');
    sidebarItems.forEach(function (item) {
        var link = item.querySelector('.nav-link');
        var href = link.getAttribute('href').split('/').pop();

        if (currentPath === href) {
            link.classList.remove('collapsed');
            item.classList.add('active');
        }
    });
});



// for making password strong
function validatePassword() {
    var passwordInput = document.getElementById('exampleInputPassword1');
    var password = passwordInput.value;
    var passwordError = document.getElementById('passwordError');
    
    // Define the regular expression for password validation
    var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    
    if (password.match(passwordRegex)) {
        passwordError.textContent = ''; // No error message if the password is valid
    } else {
        passwordError.textContent = 'Password must contain at least one uppercase letter, one digit, and one special character.';
    }
}

