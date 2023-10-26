document.addEventListener("DOMContentLoaded", function() {
    const nameDropdown = document.getElementById("name-dropdown");
    const usernameField = document.getElementById("username");
    const birthdayField = document.getElementById("birthday");
    const emailField = document.getElementById("email");
    const aboutMeField = document.getElementById("aboutMe");

    nameDropdown.addEventListener("change", function() {
        console.log('Dropdown change event triggered');
        const selectedUserId = nameDropdown.value;

        if (selectedUserId) {
            // Make an AJAX request to fetch user data based on the selected user ID
            fetch(`/get-user-data/${selectedUserId}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {


                        usernameField.value = data.username;
                        birthdayField.value = data.birthday;
                        emailField.value = data.email;
                        aboutMeField.value = data.aboutMe;
                    } else {
                        // Clear the fields if no data is found
                        usernameField.value = "";
                        birthdayField.value = "";
                        emailField.value = "";
                        aboutMeField.value = "";
                    }
                })
                .catch(error => console.error(error));
        } else {
            // Clear the fields if no user is selected
            usernameField.value = "niets";
            birthdayField.value = "";
            emailField.value = "";
            aboutMeField.value = "";
        }
    });
});
