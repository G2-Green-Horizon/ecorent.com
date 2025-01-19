document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#profileForm");
    form.addEventListener("submit", function (event) {
        let valid = true;

        // Clear previous error messages.
        clearErrors();

        // Validate First Name.
        const firstName = document.getElementById("firstName").value;
        if (!/^[a-zA-Z-' ]*$/.test(firstName)) {
            showError("firstName", "Only letters and white space allowed.");
            valid = false;
        } else {
            showValid("firstName");
        }

        // Validate Last Name.
        const lastName = document.getElementById("lastName").value;
        if (!/^[a-zA-Z-' ]*$/.test(lastName)) {
            showError("lastName", "Only letters and white space allowed.");
            valid = false;
        } else {
            showValid("lastName");
        }

        // Validate Email.
        const email = document.getElementById("email").value;
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailRegex.test(email)) {
            showError("email", "Invalid email format.");
            valid = false;
        } else {
            showValid("email");
        }

        // If form is invalid, prevent submission.
        if (!valid) {
            event.preventDefault();
        }
    });

    // Function to show error message (turns field red).
    function showError(field, message) {
        const inputField = document.getElementById(field);
        const errorMessage = document.getElementById(field + "Error");
        inputField.classList.add("is-invalid");
        errorMessage.textContent = message;
    }

    // Function to show valid input (turns field green).
    function showValid(field) {
        const inputField = document.getElementById(field);
        inputField.classList.remove("is-invalid");
        inputField.classList.add("is-valid");
    }

    // Function to clear all errors.
    function clearErrors() {
        const inputs = form.querySelectorAll("input");
        inputs.forEach(function (input) {
            input.classList.remove("is-invalid");
            input.classList.remove("is-valid");
            const errorMessage = document.getElementById(input.id + "Error");
            if (errorMessage) {
                errorMessage.textContent = "";
            }
        });
    }
});

// For the toast function.
const toastEl = document.querySelector('.toast');
if (toastEl) {
    const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
    toast.show();
}