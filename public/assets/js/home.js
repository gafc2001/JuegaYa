window.addEventListener("DOMContentLoaded",function(){

    const search = document.getElementById("search");
    const districts = document.getElementsByClassName("district")

    const displayDistricts =(display) =>{
        Array.from(districts).forEach(e => e.style.display = display);
    }

    const filterDistrict = (e) => {
        displayDistricts("none");
        if(e.target.value == ""){
            displayDistricts("block");
        }
        for(district of districts) {
            let districtValue = district.innerText.toLowerCase();
            let value = e.target.value.toLowerCase();
            if(districtValue.includes(value)){
                district.style.display = "block";
            }
        }
    }



    search.addEventListener("input",filterDistrict);


});