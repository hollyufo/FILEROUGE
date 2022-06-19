const form = document.getElementById('note')
const error_title = document.getElementById('error_title')
const notename = document.getElementById('name')
const error_notebody = document.getElementById('error_notebody')
const notebody = document.getElementById('notebody')
form.addEventListener('submit', (e) => {
    var index = 0
    if (notename.value === '' || notename.value == null) {
        index++
        notename.classList.add("is-invalid");
        error_title.innerHTML = "note title is required"
    }
    if (notebody.value === '' || notebody.value == null) {
        index++
        notebody.classList.add("is-invalid");
        error_notebody.innerHTML = "Note body is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   