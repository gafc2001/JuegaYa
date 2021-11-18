window.addEventListener("DOMContentLoaded",function(){
    const formSignIn = document.getElementById("form-signin");
    const forms = document.getElementsByClassName("form");
    const signIn = document.getElementById("sign-in");
    const closeButton = document.getElementById("close-form");
    const passwords = document.getElementsByClassName("password");
    const inputs = document.getElementsByClassName("input");
    const inputContainers = document.getElementsByClassName("input-container");
    const submitButtons = document.getElementsByClassName("btn-submit");
    const showPasswordButtons = document.getElementsByClassName("show-password");
    

    let isPasswordVisible = false;
    let isFormOpen = formSignIn.classList.contains('active')?true:false;

    const openForm = () => {
        document.body.classList.add("active");
        formSignIn.classList.add("active");
        setTimeout(() => {isFormOpen = true},1100);
    }
    const closeForm = () => {
        formSignIn.classList.remove("active");
        document.body.classList.remove("active");
        setTimeout(() => {isFormOpen = false},1100);
    }
    const closeFormFromBody = (e) => {
        
        let isFormClicked = formSignIn.contains(e.target);
        if (!isFormClicked) {
            if(isFormOpen) {
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
    const validateForm = () => {
        for(input of inputs){
            let value = input.value.trim();
            if(value.length === 0) {
                for(inputContainer of inputContainers){
                    inputContainer.classList.add("invalid-input");
                }
                for(submitButton of submitButtons){
                    submitButton.classList.add("btn-disabled");
                    submitButton.setAttribute("disabled",'true');
                }
            }else{
                for(inputContainer of inputContainers){
                    inputContainer.classList.remove("invalid-input");
                }
                for(submitButton of submitButtons){
                    submitButton.classList.remove("btn-disabled");
                    submitButton.removeAttribute("disabled");
                }
            }
        }
    }


    signIn.addEventListener("click",openForm);
    closeButton.addEventListener("click",closeForm);
    document.addEventListener("click",closeFormFromBody);
    
    for(form of forms){
        console.log(form);
        form.addEventListener("submit",validateForm);
    }
    
    for(input of inputs){
        input.addEventListener("input",validateForm);
    }

    for(showPasswordButton of showPasswordButtons){
        showPasswordButton.addEventListener("click",showPassword);
    }

    
    
    
})