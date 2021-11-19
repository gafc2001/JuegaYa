window.addEventListener("DOMContentLoaded",function(){
    const signUp = document.getElementById("sign-up");
    const formSignUp = document.getElementById("form-signup");
    const signUpPassword = document.getElementById("signup-password");
    const confirmPassword = document.getElementById("confirm-password");
    const passwordContainers = document.getElementsByClassName("password-container");
    const messagePassword = document.getElementById("message-password");
    


    const openSignUpForm = () => {
        document.body.classList.add("active");
        formSignUp.classList.add("active");
        setTimeout(() => {isFormOpen = true},1100);
    }
    const verifiyPassword = (e) =>{
        if(signUpPassword.value === confirmPassword.value){
            for(container of passwordContainers){
                container.classList.remove('invalid-input');
            }
            messagePassword.style.display = 'none';
        }else{
            for(container of passwordContainers){
                container.classList.add('invalid-input');
            }
            messagePassword.style.display = 'block';
        }
    }

    signUp.addEventListener("click",openSignUpForm);
    confirmPassword.addEventListener("input",verifiyPassword);
});