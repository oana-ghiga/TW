const spotlightImage = document.querySelector('.spotlight-image');

// Retrieve the value of the 'imageSrc' parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const imageSrc = urlParams.get('imageSrc');
const plantId = urlParams.get('imageId');

// Use the image source as needed in your page
console.log(imageSrc);

spotlightImage.src = images[imageSrc];

// buttons

const addToAlbum = document.querySelector('.album-add-button');
const likes = document.querySelector('.like-numbers');
const likeButton = document.querySelector('.like-button');

const likesCountElement = document.getElementById('likesCount');
likesCountElement.textContent = updatedLikesCount;

const endpoint = '/plant/${plantId}';
fetch(endpoint)
  .then(response => response.json())
  .then(data => {
    var plantName = data.name;
    var updatedLikesCount = data.likes;
    console.log(data);
  })
  .catch(error => {
    // Handle any errors
    console.error(error);
});



