const btnEye = document.getElementById('btn-eye-login');
const inputPassword = document.querySelector('.password-login');

btnEye.addEventListener('click', function(e){

if( inputPassword.type == "password" ){

    e.target.setAttribute("class", "fas fa-eye-slash");
    inputPassword.type = "text";
    
} else {

    e.target.setAttribute("class", "fas fa-eye");
    inputPassword.type = "password";
    
}

});

$(document).ready(function(){
    var email = $(".email-login");
    var password = $(".password-login");
    var email_err = $('.email-error');
    var pass_err = $('.password-error');

    $('#form-login').on("submit", function(e){

        if( email.val() == '' && password.val() == '' ){
            e.preventDefault();
            email.addClass("border-red");
            password.addClass("border-red");
            email_err.css("display", "block");
            pass_err.css("display", "block");
        } else {
            email.removeClass("border-red");
            password.removeClass("border-red");
            email_err.css("display", "none");
            pass_err.css("display", "none");
        }

        if( email.val() == '' ){
            e.preventDefault();
            email.addClass("border-red");
            email_err.css("display", "block");
        } else {
            email.removeClass("border-red");
            email_err.css("display", "none");
        }

        if( password.val() == '' ){
            e.preventDefault();
            password.addClass("border-red");
            pass_err.css("display", "block");
        } else {
            password.removeClass("border-red");
            pass_err.css("display", "none");
        }


    });
})

// console.log(validateEmail("admin.com"));

// function validateEmail(email) {
//     const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// }