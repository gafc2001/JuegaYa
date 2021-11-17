window.addEventListener("DOMContentLoaded",function(){
    let isFormOpen = false;

    const form = document.getElementById("form-container");
    const signIn = document.getElementById("sign-in");
    const closeButton = document.getElementById("close-form");
   
    const openForm = () => {
        document.body.classList.add("active");
        form.classList.add("active");
        setTimeout(() => {isFormOpen = true},1100);
    }
    const closeForm = () => {
        form.classList.remove("active");
        document.body.classList.remove("active");
        setTimeout(() => {isFormOpen = false},1100);
    }
    const closeFormFromBody = (e) => {
        
        let isFormClicked = form.contains(e.target);
        if (!isFormClicked) {
            if(isFormOpen) {
                closeForm();
            }
        }
    }

    signIn.addEventListener("click",openForm);
    closeButton.addEventListener("click",closeForm);
    document.addEventListener("click",closeFormFromBody);

    
    
    
})