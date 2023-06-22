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

// dynamic image loading section
const imageGrid = document.querySelector('.image_grid');
const imageTemplate = document.querySelector('#image_template');
const card_types = ['small_card', 'medium_card', 'large_card'];

const observerOptions = {
  root: null,
  rootMargin: '0px',
  threshold: 0.5
};

const observerCallback = entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const lazyImage = entry.target;
      lazyImage.src = lazyImage.dataset.src;
      // lazyImage.onload = () => lazyImage.classList.remove('lazy-image');
      observer.unobserve(lazyImage);
    } else {
      const lazyImage = entry.target;
      lazyImage.src = '';
      lazyImage.classList.add('lazy-image');
    }
  });
};

// getting the root element
var r = document.querySelector(':root');
var rs = getComputedStyle(r);

const observer = new IntersectionObserver(observerCallback, observerOptions);

const images = [...Array(100).keys()].map(i => `https://placekitten.com/200/200?image=${i + 1}`);
var idx = 0;
try {
  if (images && imageTemplate && imageTemplate.content) {
    images.forEach(image => {
      const newImage = imageTemplate.content.cloneNode(true);
      var imageCard = newImage.querySelector('.image_card');
      const lazyImage = newImage.querySelector('.lazy-image');

      imageCard.classList.add(card_types[idx % 3]);
      switch (card_types[idx % 3]) {
        case 'small_card':
          var card_height = rs.getPropertyValue('--card_small') * 10 - 30;
          lazyImage.style.height = card_height + 'px';
          break;
        case 'medium_card':
          var card_height = rs.getPropertyValue('--card_medium') * 10 - 30;
          lazyImage.style.height = card_height + 'px';
          break;
        case 'large_card':
          var card_height = rs.getPropertyValue('--card_large') * 10 - 30;
          lazyImage.style.height = card_height + 'px';
          break;
      }
      idx++;

      lazyImage.dataset.src = image;

      imageCard.addEventListener('click', () => {
        // Open new page with enlarged image, description, and comment section
        window.location.href = "../html/spotlightPage.html";
      });

      imageGrid.appendChild(newImage);
      observer.observe(lazyImage);

      imageGrid.appendChild(newImage);
      observer.observe(lazyImage);
    });
  } else {
    throw new Error('Images array is null');
  }
} catch (error) {
  
}