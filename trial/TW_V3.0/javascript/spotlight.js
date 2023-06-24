const spotlightImage = document.querySelector('.spotlight-image');

// Retrieve the value of the 'imageSrc' parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const imageSrc = urlParams.get('imageSrc');

// Use the image source as needed in your page
console.log(imageSrc);

spotlightImage.src = images[imageSrc];