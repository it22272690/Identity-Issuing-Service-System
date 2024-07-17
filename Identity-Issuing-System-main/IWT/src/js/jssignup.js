var passwordInput = document.getElementById('password');
var confirmPasswordInput = document.getElementById('confirmPassword');
var passwordMatchWarning = document.getElementById('passwordMatchWarning');

confirmPasswordInput.addEventListener('input', function() {
  if (passwordInput.value !== confirmPasswordInput.value) {
    passwordMatchWarning.style.display = 'block'; // Show the warning message
  } else {
    passwordMatchWarning.style.display = 'none'; // Hide the warning message
  }
});



var agreementCheckbox = document.getElementById('agreement');
var signupButton = document.getElementById('signupButton');

agreementCheckbox.addEventListener('change', function() {
  signupButton.disabled = !agreementCheckbox.checked;
});
