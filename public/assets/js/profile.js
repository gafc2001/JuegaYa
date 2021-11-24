window.addEventListener("DOMContentLoaded",function(){
    // const editButton = document.getElementById("edit-profile");
    const profilePicture = document.getElementById("profile_picture");
    const imgProfile = document.getElementById("current-img-picture");
    const selectInput = document.getElementsByClassName("select");
    const gender =document.getElementById("gender");
    const sport =document.getElementById("sport");
    const district = document.getElementById("district");
    console.log(district);


    // const editProfile = () => {
    //     console.log("click");
    // };
    const onInputImageChange = (e) => {
        console.log('change');
        console.log(profilePicture.files);
        console.log(profilePicture.files[0]);
        let fileName = URL.createObjectURL(profilePicture.files[0]);

        imgProfile.setAttribute("src", fileName);
    }

    profilePicture.addEventListener('change', onInputImageChange);

    NiceSelect.bind(gender, { searchable: true })
    NiceSelect.bind(sport, { searchable: true })
    NiceSelect.bind(district, { searchable: true })    
});