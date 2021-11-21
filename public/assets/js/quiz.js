window.addEventListener("DOMContentLoaded",function(){
    const answers = document.getElementsByClassName("answer");
    let data = {};


    const selectAnswer = (e) =>{
        let parent = e.target.parentNode;
        for(answerItem of parent.children){
            answerItem.classList.remove("selected");
        }
        e.target.classList.add("selected");
        let question =  e.target.closest(".question-container").getAttribute("id");
        data[question] = e.target.innerHTML;
        console.log(data);
    }

    for(answer of answers){
        answer.addEventListener("click",selectAnswer);
    }


})