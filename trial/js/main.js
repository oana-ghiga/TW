const images = document.querySelectorAll('.image-container img');
const popups = document.querySelectorAll('.popup');

images.forEach((img, index) => {
  img.addEventListener('click', () => {
    popups[index].style.display = 'block';
  });
});
