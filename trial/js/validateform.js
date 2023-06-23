function validateform() {
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var password = document.getElementById("password").value;

  var emailRegex = /\S+@\S+\.\S+/;
  var phoneRegex = /^\d{10}$/;
  var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

  if (!emailRegex.test(email)) {
    alert("Invalid email format. Please enter a valid email address.");
    return false;
  }

  if (!phoneRegex.test(phone)) {
    alert("Invalid phone number. Please enter a 10-digit phone number.");
    return false;
  }

  if (!passwordRegex.test(password)) {
    alert("Invalid password format. Password must contain at least 8 characters, one capital letter, and one number.");
    return false;
  }

  return true;
}
