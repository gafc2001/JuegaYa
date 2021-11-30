window.addEventListener("DOMContentLoaded",function(){
    const requestIcon = document.getElementById("request-icon");
    const countRequest = document.getElementById("count-requests");
    const requestList = document.getElementById("request-list");
    const acceptRequestButtons = document.getElementsByClassName("accept-request");
    const denyRequestButtons = document.getElementsByClassName("deny-request");
    const alert = document.getElementById("alert");
    const matchPlayers =document.getElementById("match-players");
    const currentPlayers = document.getElementById("current-players");
    const map = document.getElementById("map");
    
    const toggleRequests = () =>{
        requestList.classList.toggle("toggleDown");
    }

    const acceptRequest = (e) => {
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

        alert.classList.remove("info");
        alert.classList.remove("success");
        switch(typeMessage){
            case "success":
                alert.children[0].classList[1] = "fa-check-circle";
                alert.classList.add("success");
                break;
            case "info":
                alert.children[0].classList[1] = "fa-info-circle";
                alert.classList.add("info");
            break;
        }
        alert.classList.add("show");
        
        alert.children[1].innerText = msg;
        setTimeout(function(){
            alert.classList.remove("show");
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
        countRequest.innerText =  requestList.children.length;
        if(parent.children.length === 0) {
            parent.innerText = "No hay notificaciones";
        }
    }

    const updateListOfParticipants = (data) => {
        data = JSON.parse(data);
        const div = document.createElement('div');
        div.classList.add("match-player");
        div.innerHTML = `<img src="${window.location.protocol + "//" + window.location.host}/image/${data.profile}"; alt=""></img>`;
        matchPlayers.append(div);
        currentPlayers.innerText = matchPlayers.children.length;
    }

    requestIcon.addEventListener("click",toggleRequests);

    for(acceptRequestButton of acceptRequestButtons){
        acceptRequestButton.addEventListener("click",acceptRequest);
    }
    for(denyRequestButton of denyRequestButtons){
        denyRequestButton.addEventListener("click",denyRequest);
    }



});