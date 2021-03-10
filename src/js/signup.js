/**
 * this for signup
 */
const form =  document.querySelector('.signup form');
const confirmButton = form.querySelector('.btn button');
const errorMessage = document.querySelector('.error-txt');

form.addEventListener('submit', function(event) {

    event.preventDefault();

});


confirmButton.addEventListener('click', function() {

    // ajax
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === xhr.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    errorMessage.style.display = "block";
                    errorMessage.innerHTML = data; 
                }
            }
        }
    }

    // send data ajax to php
    // create form object
    let formSignup = new FormData(form);

    // sending to php
    xhr.send(formSignup);

});