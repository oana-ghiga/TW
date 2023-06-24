const albumsButton = document.querySelector('.albumsButtonContainer');
const profileButton = document.querySelector('.profileButtonContainer');
const logoutButton = document.querySelector('.logoutButtonContainer');
const loginButton = document.querySelector('.loginButtonContainer');
const signupButton = document.querySelector('.signupButtonContainer');
const topButton = ocument.querySelector('.topButtonContainer');

albumsButton.addEventListener('click', () => {
    const url = '/albums';
    window.location.href = url;
});

profileButton.addEventListener('click', () => {
    const url = '/user';
    window.location.href = url;
});

loginButton.addEventListener('click', () => {
    const url = '/login';
    window.location.href = url;
});

signupButton.addEventListener('click', () => {
    const url = '/register';
    window.location.href = url;
});

signupButton.addEventListener('click', () => {
    const url = '/register';
    window.location.href = url;
});

