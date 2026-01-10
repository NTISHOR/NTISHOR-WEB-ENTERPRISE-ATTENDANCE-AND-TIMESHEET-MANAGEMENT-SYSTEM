document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let email = document.getElementById("email").value.trim();
    let pass  = document.getElementById("password").value;
    let error = document.getElementById("login-error");

    error.innerHTML = "";

    if (email === "") {
        error.innerHTML = "Email is required.";
        return;
    }

    if (pass === "") {
        error.innerHTML = "Password is required.";
        return;
    }

    alert("Login successful (frontend only).");
});
