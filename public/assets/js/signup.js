window.addEventListener("DOMContentLoaded",function(){
    const signUp = document.getElementById("sign-up");
    const signUpPassword = document.getElementById("signup-password");
    const confirmPassword = document.getElementById("confirm-password");
    const passwordContainers = document.getElementsByClassName("password-container");
    const messagePassword = document.getElementById("message-password");
    
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
    confirmPassword.addEventListener("input",verifiyPassword);
});