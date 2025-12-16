document.getElementById("registerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirm = document.getElementById("confirm").value.trim();

    document.getElementById("userError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("passError").textContent = "";
    document.getElementById("confirError").textContent = "";

    let valid = true;

    if (username === "") {
        document.getElementById("userError").textContent =
            "Username must not be empty";
        valid = false;
    } else if (username.length < 3) {
        document.getElementById("userError").textContent =
            "Username must be at least 3 characters long";
        valid = false;
    }

    if (email === "") {
        document.getElementById("emailError").textContent =
            "Email must not be empty";
        valid = false;
    } else if (!email.includes("@")) {
        document.getElementById("emailError").textContent =
            "Email is not valid";
        valid = false;
    }

    if (password === "") {
        document.getElementById("passError").textContent =
            "Password must not be empty";
        valid = false;
    } else if (password.length < 6) {
        document.getElementById("passError").textContent =
            "Password must be at least 6 characters long";
        valid = false;
    }

    if (confirm === "") {
        document.getElementById("confirError").textContent =
            "Please confirm your password";
        valid = false;
    } else if (password !== confirm) {
        document.getElementById("confirError").textContent =
            "Passwords do not match";
        valid = false;
    }

    if (valid) {
        alert("Registration successful ✅");
        document.getElementById("registerForm").reset();
    }
});
