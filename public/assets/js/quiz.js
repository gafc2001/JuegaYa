window.addEventListener("DOMContentLoaded", function () {
    const answers = document.getElementsByClassName("answer");
    const timePlaying = document.getElementById("time-playing");
    const age = document.getElementById("age");
    const sendButton = document.getElementById("btn-send");
    const dates = document.getElementsByClassName("date");

    let data = {};

    const selectAnswer = (e) => {

        let parent = e.target.parentNode;
        for (answerItem of parent.children) {
            answerItem.classList.remove("selected");
        }
        e.target.classList.add("selected");
        let question = e.target.closest(".question-container").getAttribute("data-type");

        let dataId = e.target.getAttribute("data-id");
        if (dataId) {
            data[question] = dataId;
        }
        else {
            data[question] = e.target.innerHTML;
        }
    }
    const getDate = (e) => {
        let inputDate = new Date(e.target.value);
        let formatDate = inputDate.toISOString().split('T')[0];
        switch (e.target.id) {
            case "time-playing":
                data["TIME_PLAYING"] = formatDate;
                break;
            case "age":
                data["AGE"] = formatDate;
                break;

        }
    }

    const sendData = async() => {
        const options = {
            headers: {
                'X-CSRF-TOKEN' : csrf_token,
            },
            method : 'POST',
            body : JSON.stringify(data)
        }
        const response = await fetch(url,options)
                            .then(rps => rps.text())
                            .then(json => console.log(json))
        window.location.href = window.location.protocol + "//" + window.location.host + "/home";
    }

    Array.from(answers).forEach(e => e.addEventListener("click", selectAnswer));
    Array.from(dates).forEach(e => e.addEventListener("change", getDate));
    sendButton.addEventListener("click", sendData);

})