document.addEventListener("DOMContentLoaded", function() {
    const nameDropdown = document.getElementById("name-dropdown");
    const usernameField = document.getElementById("username");
    const birthdayField = document.getElementById("birthday");
    const emailField = document.getElementById("email");

    nameDropdown.addEventListener("change", async function() {
        console.log('Dropdown change event triggered');
        const selectedUserId = nameDropdown.value;

        if (selectedUserId) {
            try {
                const response = await fetch(`/get-user-data/${selectedUserId}`);

                if (!response.ok) {
                    throw new Error(`Fetch request failed with status: ${response.status}`);
                }

                const data = await response.json();

                if (data) {
                    usernameField.value = data.username;
                    birthdayField.value = data.birthday;
                    emailField.value = data.email;
                } else {
                    // Clear the fields if no data is found
                    usernameField.value = "";
                    birthdayField.value = "";
                    emailField.value = "";
                }
            } catch (error) {
                console.error("Error during fetch:", error);
                // Handle the error more gracefully, e.g., display an error message to the user
            }
        } else {
            // Clear the fields if no user is selected
            usernameField.value = "";
            birthdayField.value = "";
            emailField.value = "";
        }
    });
});
