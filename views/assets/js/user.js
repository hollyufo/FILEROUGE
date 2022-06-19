const form = document.getElementById('codes')
const error_code = document.getElementById('error_code')
const invitecode = document.getElementById('invitecode')
const selecter = document.getElementById('selecte')
form.addEventListener('submit', (e) => {
    var index = 0
    if (invitecode.value === '' || invitecode.value == null) {
        index++
        invitecode.classList.add("is-invalid");
        selecter.classList.add("is-invalid");
        error_code.innerHTML = "Code is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   