const spotlightImage = document.getElementById('spotlight-image');
const plantId = document.getElementById('plantId').innerHTML;

// Retrieve the value of the 'imageSrc' parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const imageSrc = urlParams.get('imageSrc');
// const plantId = urlParams.get('imageId');

// Use the image source as needed in your page
console.log(imageSrc);


// buttons

const addToAlbum = document.querySelector('.album-add-button');
const likes = document.querySelector('.like-numbers');
const likeButton = document.querySelector('.like-button');

const likesCountElement = document.getElementById('likesCount');

const url = `/api/v1/plant/${plantId}`
fetch(url)
  .then(response => response.json())
  .then(data => {
      console.log(data);
    var plantName = data.name;
      likesCountElement.textContent = data.likes;
      spotlightImage.src = data.image_link;


  })
  .catch(error => {
    // Handle any errors
    console.error(error);
});



