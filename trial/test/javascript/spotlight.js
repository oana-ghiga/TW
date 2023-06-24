const spotlightImage = document.querySelector('.spotlight-image');

// Retrieve the value of the 'imageSrc' parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const imageSrc = urlParams.get('imageSrc');
const imageId = urlParams.get('imageId');

// Use the image source as needed in your page
console.log(imageSrc);

spotlightImage.src = images[imageSrc];

// buttons

const addToAlbum = document.querySelector('.album-add-button');
const likes = document.querySelector('.like-numbers');
const likeButton = document.querySelector('.like-button');

const likesCountElement = document.getElementById('likesCount');
likesCountElement.textContent = updatedLikesCount;

