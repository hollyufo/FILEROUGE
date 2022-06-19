const password = document.getElementById('password')
const email = document.getElementById('Email')
const form = document.getElementById('login')
const error = document.getElementById('error')
const error_message = document.getElementById('error_message')
form.addEventListener('submit', (e) => {
    var index = 0
    if (email.value === '' || email.value == null) {
        index++
        email.classList.add("is-invalid");
        error.innerHTML = "Email is required"
    }
    if (password.value === '' || password.value == null) {
        index++
        password.classList.add("is-invalid");
        error_message.innerHTML = "Password is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   