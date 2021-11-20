window.addEventListener("DOMContentLoaded",function(){
    const requestIcon = document.getElementById("request-icon");
    const requestList = document.getElementById("request-list");
    const acceptRequestButtons = document.getElementsByClassName("accept-request");
    const denyRequestButtons = document.getElementsByClassName("deny-request");
    const message = document.getElementById("message");
    const matchPlayers =document.getElementById("match-players");
    const toggleRequests = () =>{
        requestList.classList.toggle("toggleDown");
    }

    const acceptRequest = (e) => {
        console.log();
        let partipantId = e.target.getAttribute('data-id');
        let response = request(partipantId,"ACEPTADO");
        response.then(rpt => {
            updateListOfParticipants(rpt.participant);
            showMessage(rpt.message,"success")
        });
        removeRequest(e);
    }
    
    const denyRequest = (e) => {
        let partipantId = e.target.getAttribute('data-id');
        let response = request(partipantId,"RECHAZADO");
        response.then(rpt => showMessage(rpt.message,"info"));
        removeRequest(e);
    }

    const showMessage = (msg,typeMessage) =>{

        message.classList.remove("info");
        message.classList.remove("success");
        switch(typeMessage){
            case "success":
                message.children[0].classList[1] = "fa-check-circle";
                message.classList.add("success");
                break;
            case "info":
                message.children[0].classList[1] = "fa-info-circle";
                message.classList.add("info");
            break;
        }
        message.classList.add("show");
        
        message.children[1].innerText = msg;
        setTimeout(function(){
            message.classList.remove("show");
        },3000);
    }

    const request = async (partipantId,participantStatus) =>{
        const options = {
            headers: {
                'X-CSRF-TOKEN' : csrf_token,
            },
            method : 'PUT',
            body : JSON.stringify({
                'participant_id' : partipantId,
                'status' : participantStatus,
            })
        }
        const response = await fetch(url,options)
                .then(resp => resp.json())
                .then(json => json)
                .catch(err => console.error(err));
        return response;
    }

    const removeRequest = (e) => {
        let parent = e.target.parentNode.parentNode.parentNode;
        e.target.parentNode.parentNode.remove();
        if(parent.children.length === 0) {
            parent.innerText = "No hay notificaciones";
        }
    }
    

    const updateListOfParticipants = (data) => {
        data = JSON.parse(data);
        console.log(data);
        const matchPlayer = 
        `<div class="match-player">
            <img src="{{asset('assets/img/profile/'.$participant->user()->getProfilePicture())}}" alt="">
        </div>`;
        const div = document.createElement('div');
        div.classList.add("match-player");
        div.innerHTML = `<img src="http://127.0.0.1:8000/assets/img/profile/${data.profile}"; alt=""></img>`;
        console.log(matchPlayers.append(div));


    }

    requestIcon.addEventListener("click",toggleRequests);

    for(acceptRequestButton of acceptRequestButtons){
        acceptRequestButton.addEventListener("click",acceptRequest);
    }
    for(denyRequestButton of denyRequestButtons){
        denyRequestButton.addEventListener("click",denyRequest);
    }



});