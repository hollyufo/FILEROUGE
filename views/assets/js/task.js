const form = document.getElementById('form')
const error_title = document.getElementById('error_title')
const title = document.getElementById('taskname')
const body_code = document.getElementById('error_body')
// explanation
const explanation = document.getElementById('explanation')
const error_explanation = document.getElementById('error_explanation')
const users = document.getElementById('users')
const date1 = document.getElementById('date1')
const date2 = document.getElementById('date2')
const status1 = document.getElementById('status')
form.addEventListener('submit', (e) => {
    var index = 0
    if (title.value === '' || title.value == null) {
        index++
        title.classList.add("is-invalid");
        error_title.innerHTML = "Title is required"
    }
    if (explanation.value === '' || explanation.value == null) {
        index++
        explanation.classList.add("is-invalid");
        users.classList.add("is-invalid");
        date1.classList.add("is-invalid");
        date2.classList.add("is-invalid");
        status1.classList.add("is-invalid");
        error_explanation.innerHTML = "explanation is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   