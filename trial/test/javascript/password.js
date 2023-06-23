document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var form = event.target;
    var formData = new FormData(form);
    var jsonData = {};

    formData.forEach(function(value, key) {
        jsonData[key] = value;
    });

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../changePass.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            alert(response.message);
            form.reset();
        }
    };
    xhr.send(JSON.stringify(jsonData));
    console.log(JSON.stringify(jsonData));
    xhr.responseText;
});
