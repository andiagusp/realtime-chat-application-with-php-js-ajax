const passwordField = document.querySelector(".form .field input[type=password]");
const eyeButton = document.querySelector(".form .field i");

eyeButton.addEventListener('click', function() {
   
    if (passwordField.type == "password") {
        passwordField.type = "text";
        eyeButton.classList.add("active");
    } else {
        passwordField.type = "password";
        eyeButton.classList.remove("active");
    }
});