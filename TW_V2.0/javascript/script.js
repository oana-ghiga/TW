// get the dropdownButton and dropdown elements
const dropdownContainer = document.querySelector('.dropdownContainer');
const dropdownButton = document.querySelector('.dropdownButton');
const dropdown = document.querySelector('.dropdownMenu');
const searchBar = document.querySelector('.searchBarContainer');
const searchButton = document.querySelector('.searchButtonContainer');
const filterButton = document.querySelector('.filterButtonContainer');
const filterMenu = document.querySelector('.filterMenuContainer');

// hide the dropdown menu initially
dropdown.style.display = 'none';
searchBar.style.display = 'none';
filterMenu.style.display = 'none';

// add a click event listener to the dropdownButton
dropdownButton.addEventListener('click', () => {
  // toggle the display property of the dropdown element
  dropdown.style.display = dropdown.style.display === 'none' ? 'flex' : 'none';
  if (dropdownButton.style.display === 'none') {
    dropdown.style.display = 'flex';
  }
});

// add a click event listener to the search button
searchButton.addEventListener('click', () => {
  // toggle the display property of the search button element
  searchBar.style.display = searchBar.style.display === 'none' ? 'flex' : 'none';
});

filterButton.addEventListener('click', () => {
  // toggle the display property of the filter button element
  filterMenu.style.display = filterMenu.style.display === 'none' ? 'flex' : 'none';
});

// add a click event listener to the document object
document.addEventListener('click', (event) => {
  // close the dropdown menu if the user clicks anywhere else on the page
  if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
    dropdown.style.display = 'none';
  }
  // close the search bar if the user clicks anywhere else on the page
  if (!searchButton.contains(event.target) && !searchBar.contains(event.target)) {
    searchBar.style.display = 'none';
  }
  // close the filter menu if the user clicks anywhere else on the page
  if (!filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
    filterMenu.style.display = 'none';
  }
});

// Highlight filter menu list elements when clicked
const listItems = document.querySelectorAll('li');

listItems.forEach(item => {
  item.addEventListener('click', () => {
    if (item.classList.contains('selected')) {
      item.classList.remove('selected');
      item.style.backgroundColor = 'white';
      item.style.color = '#828282';
    } else {
      item.classList.add('selected');
      item.style.backgroundColor = '#7B886B';
      item.style.color = 'white';
    }
  });
});

// authenthication check section 
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

function checkAuth() {
  if (isAuthenticated()) {
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

// mock function to check if the user is authenticated
function isAuthenticated() {
  return true;
}

checkAuth();

// dynamic image loading section
const imageGrid = document.querySelector('.image-grid');
const imageTemplate = document.querySelector('#image-template');

const intersectionObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const lazyImage = entry.target;
      lazyImage.src = lazyImage.dataset.src;
      lazyImage.onload = () => lazyImage.classList.remove('lazy-image');
      intersectionObserver.unobserve(lazyImage);
    }
  });
});

const images = [...Array(1000).keys()].map(i => `https://placekitten.com/200/200?image=${i + 1}`);
images.forEach(image => {
  const newImage = imageTemplate.content.cloneNode(true);
  const lazyImage = newImage.querySelector('.lazy-image');
  lazyImage.dataset.src = image;
  imageGrid.appendChild(newImage);
  intersectionObserver.observe(lazyImage);
});














