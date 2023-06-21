document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var data = {
        username: username,
        password: password
    };

    // Send the login request to the backend
    fetch("login_back.php", {
        method: "POST",
        headers: {
        "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the backend
                alert(data.message); // Display the response message
                
                // Checking if the login was successful
                if (data.message === "Login successful") {
                    // Redirect to mainPage
                    window.location.href = "../html/mainPage.html";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
});