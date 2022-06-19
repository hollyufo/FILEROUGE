const sform = document.getElementById('signup')
const fullname = document.getElementById('name')
const invite = document.getElementById('invite')
const semail = document.getElementById('semail')
const error_code = document.getElementById('error_code')
const error_name = document.getElementById('error_name')
const error_semail = document.getElementById('serror_email')
const serror_password = document.getElementById('serror_password')
const spassword = document.getElementById('spassword')
sform.addEventListener('submit', (e) => {
    var index = 0
    if (invite.value === '' || invite.value == null) {
        index++
        error_code.innerHTML = "invite code is required"
    }
    if (fullname.value === '' || fullname.value == null) {
        index++
        error_name.innerHTML = "Full name is required"
    }
    if (semail.value === '' || semail.value == null) {
        index++
        error_semail.innerHTML = "Email is required"
    }
    if (spassword.value === '' || spassword.value == null) {
        index++
        serror_password.innerHTML = "Password is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   