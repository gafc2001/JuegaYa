window.addEventListener("DOMContentLoaded",function(){
    const editButton = document.getElementById("edit-profile");
    const profilePicture = document.getElementById("profile_picture");
    const imgProfile = document.getElementById("current-img-picture");
    const editProfile = () => {
        console.log("click");
    };
    const onInputImageChange = (e) => {
        console.log('change');
        console.log(profilePicture.files);
        console.log(profilePicture.files[0]);
        let fileName = URL.createObjectURL(profilePicture.files[0]);

        imgProfile.setAttribute("src", fileName);
    }

    profilePicture.addEventListener('change', onInputImageChange);
    editButton.addEventListener("click",editProfile);
});