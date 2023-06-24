const albumsButton = document.querySelector('.albumsButtonContainer');
const profileButton = document.querySelector('.profileButtonContainer');
const logoutButton = document.querySelector('.logoutButtonContainer');
const loginButton = document.querySelector('.loginButtonContainer');
const signupButton = document.querySelector('.signupButtonContainer');

const menuProfile = document.querySelector('.profile');
const menuAlbums = document.querySelector('.albums');
const menuLogout = document.querySelector('.logout');
const menuLogin = document.querySelector('.login');
const menuSignup = document.querySelector('.signup');

var isAuthenticated = false;

function checkAuth() {
    if (isAuthenticated) {
      loginButton.style.display = 'none';
      signupButton.style.display = 'none';
      menuLogin.style.display = 'none';
      menuSignup.style.display = 'none';
    } else {
      albumsButton.style.display = 'none';
      profileButton.style.display = 'none';
      logoutButton.style.display = 'none';
      menuAlbums.style.display = 'none';
      menuProfile.style.display = 'none';
      menuLogout.style.display = 'none';
    }
  }

checkAuth();

// document.getElementById("loginForm").addEventListener("submit", function(event) {
//     event.preventDefault(); // Prevent form submission
//
//     var username = document.getElementById("username").value;
//     var password = document.getElementById("password").value;
//
//     var data = {
//         username: username,
//         password: password
//     };
//
//     // Send the login request to the backend
//     fetch("login_back.php", {
//         method: "POST",
//         headers: {
//         "Content-Type": "application/json"
//         },
//         body: JSON.stringify(data)
//     })
//             .then(response => response.json())
//             .then(data => {
//                 // Handle the response from the backend
//                 alert(data.message); // Display the response message
//
//                 // Checking if the login was successful
//                 if (data.message === "Login successful") {
//                     // Redirect to mainPage
//                     isAuthenticated = true;
//                     window.location.href = "../html/mainPage.html";
//                     checkAuth();
//                 }
//             })
//             .catch(error => {
//                 console.error("Error:", error);
//             });
// });