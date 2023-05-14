// get the dropdownButton and dropdown elements
const dropdownContainer = document.querySelector('.dropdownContainer');
const dropdownButton = document.querySelector('.dropdownButton');
const dropdown = document.querySelector('.dropdownMenu');
const searchBar = document.querySelector('.searchBarContainer');
const searchButton = document.querySelector('.searchButtonContainer');

// hide the dropdown menu initially
dropdown.style.display = 'none';
searchBar.style.display = 'none';

// add a click event listener to the dropdownButton
dropdownButton.addEventListener('click', () => {
  // toggle the display property of the dropdown element
  dropdown.style.display = dropdown.style.display === 'none' ? 'flex' : 'none';
  if (dropdownButton.style.display === 'none') {
    dropdown.style.display = 'flex';
  }
});

// add a click event listener to the document object
document.addEventListener('click', (event) => {
  // close the dropdown menu if the user clicks anywhere else on the page
  if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
    dropdown.style.display = 'none';
  }
});

// add a click event listener to the search button
searchButton.addEventListener('click', () => {
  // toggle the display property of the search button element
  searchBar.style.display = searchBar.style.display === 'none' ? 'flex' : 'none';
});

// add a click event listener to the document object
document.addEventListener('click', (event) => {
  // close the search bar if the user clicks anywhere else on the page
  if (!searchButton.contains(event.target) && !searchBar.contains(event.target)) {
    searchBar.style.display = 'none';
  }
});

const albumsButton = document.querySelector('.albumsButtonContainer');
const profileButton = document.querySelector('.profileButtonContainer');
const logoutButton = document.querySelector('.logoutButtonContainer');
const loginButton = document.querySelector('.loginButtonContainer');
const signupButton = document.querySelector('.signupButtonContainer');

function checkAuth() {
  if (isAuthenticated()) {
    loginButton.style.display = 'none';
    signupButton.style.display = 'none';
  } else {
    albumsButton.style.display = 'none';
    profileButton.style.display = 'none';
    logoutButton.style.display = 'none';
  }
}

// mock function to check if the user is authenticated
function isAuthenticated() {
  return true;
}

checkAuth();