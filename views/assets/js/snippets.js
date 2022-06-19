const form = document.getElementById('snippet')
const error_title = document.getElementById('error_title')
const title = document.getElementById('title')
const body_code = document.getElementById('error_body')
const description = document.getElementById('description')
const code = document.getElementById('code')
const errorcode = document.getElementById('errorcode')
form.addEventListener('submit', (e) => {
    var index = 0
    if (title.value === '' || title.value == null) {
        index++
        title.classList.add("is-invalid");
        error_title.innerHTML = "Title is required"
    }
    if (description.value === '' || description.value == null) {
        index++
        description .classList.add("is-invalid");
        body_code.innerHTML = "Explanation is required"
    }
    if (code.value === '' || code.value == null) {
        index++
        code .classList.add("is-invalid");
        errorcode.innerHTML = "Code is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   