
function signIn(event) {
    event.preventDefault(); // Prevent form from submitting the traditional way

    // Get form values
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Simple validation
    if (email === "" || password === "") {
        alert("Please fill in both fields.");
        return;
    }
    window.location.href = 'home.html';
}
function signUp(event) {
    event.preventDefault(); 

    const name = document.getElementById('name').value;

    const email = document.getElementById('newEmail').value;
    const password = document.getElementById('newPassword').value;
    //const confirmPassword = document.getElementById('confirmPassword').value;

    if (email === "" || password === "" || confirmPassword === "") {
        alert("Please fill in all fields.");
        return;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }
    window.location.href = 'Home.html';
}
function Instagram(){
    alert("Sorry Now we are fixing a problem in our instagram , For any info please contact us on phone number or visit us.");  
}



const form = document.getElementById('booking-form');
const errorMessage = document.getElementById('error-message');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  let isValid = true;

  const name = document.getElementById('name').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const people = document.getElementById('people').value.trim();
  const date = document.getElementById('date').value.trim();
  const time = document.getElementById('time').value.trim();

  if (name === '' || phone === '' || people === '' || date === '' || time === '') {
    isValid = false;
    errorMessage.textContent = 'Please fill in all fields!';
  }

  if (isValid) {
    form.submit();
  }
});