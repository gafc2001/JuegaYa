window.addEventListener("DOMContentLoaded",function(){
    const formSignIn = document.getElementById("form-signin");
    const formSignUp = document.getElementById("form-signup");
    const forms = document.getElementsByClassName("form");
    const signIn = document.getElementById("sign-in");
    const closeButtons = document.getElementsByClassName("close-form");
    const passwords = document.getElementsByClassName("password");
    const showPasswordButtons = document.getElementsByClassName("show-password");
    

    let isPasswordVisible = false;
    let isSignInFormOpen = formSignIn.classList.contains('active')?true:false;
    let isSignUpFormOpen = false;
    const openForm = () => {
        document.body.classList.add("active");
        formSignIn.classList.add("active");
        setTimeout(()=>{changeFormState(true)},1100);
    }
    
    const changeFormState = (state) =>{
        isSignInFormOpen = state;
        isSignUpFormOpen = state;
        console.info(isSignInFormOpen,isSignUpFormOpen);
    }
    const closeForm = () => {
        formSignIn.classList.remove("active");
        formSignUp.classList.remove("active");
        document.body.classList.remove("active");
        setTimeout(() => {changeFormState(false)},1100);
    }
    const closeFormFromBody = (e) => {
        let isFormClicked = formSignIn.contains(e.target) || formSignUp.contains(e.target);
        if (!isFormClicked) {
            if(isSignInFormOpen || isSignUpFormOpen) {
                closeForm();
            }

        }
    }
    const showPassword = () =>{
        for(password of passwords){
            password.setAttribute("type",isPasswordVisible?"text":"password");
        }
        isPasswordVisible = !isPasswordVisible;
    }
    


    signIn.addEventListener("click",openForm);
    document.addEventListener("click",closeFormFromBody);
    
    for(closeButton of closeButtons){
        closeButton.addEventListener("click",closeForm);
    }
    for(showPasswordButton of showPasswordButtons){
        showPasswordButton.addEventListener("click",showPassword);
    }

    
    
    
})