document.querySelector("form").addEventListener("submit", function(e) {

    let fullname = document.getElementById("fullname").value;
    let email = document.getElementById("email").value;
    let pass = document.getElementById("password").value;
    let confirmPass = document.getElementById("confirm_password").value;
    let error = document.getElementById("error");

    error.innerHTML = "";

    if (fullname === "") {
        error.innerHTML = "Full name is required.";
        e.preventDefault();
        return;
    }

    if (email === "") {
        error.innerHTML = "Email is required.";
        e.preventDefault();
        return;
    }

    if (pass.length < 6) {
        error.innerHTML = "Password must be at least 6 characters.";
        e.preventDefault();
        return;
    }

    if (pass !== confirmPass) {
        error.innerHTML = "Passwords do not match.";
        e.preventDefault();
        return;
    }

    alert("Account created successfully!");
});
