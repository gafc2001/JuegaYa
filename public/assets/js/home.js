window.addEventListener("DOMContentLoaded",function(){

    const search = document.getElementById("search");
    const districts = document.getElementsByClassName("district")
    const menu = document.getElementById("menu");
    const closeMenu = document.getElementById("close");
    const sidebar = document.getElementById("sidebar");

    closeMenu.style.left = sidebar.offsetWidth+10+ "px";
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

    const openSidebar = () => {
        document.body.classList.add("active");
        sidebar.classList.add("active");
        setTimeout(() =>{closeMenu.classList.add('active')},400);
    }
    const closeSidebar = () => {
        document.body.classList.remove("active");
        sidebar.classList.remove("active");
        closeMenu.classList.remove('active');
    }

    search.addEventListener("input",filterDistrict);
    menu.addEventListener("click",openSidebar);
    closeMenu.addEventListener("click",closeSidebar);


});