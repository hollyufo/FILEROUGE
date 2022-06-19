const form = document.getElementById('addproject')
const error_name = document.getElementById('error_name')
const pname = document.getElementById('pname')
const error_description = document.getElementById('error_description')
const description = document.getElementById('description')
form.addEventListener('submit', (e) => {
    var index = 0
    if (pname.value === '' || pname.value == null) {
        index++
        pname.classList.add("is-invalid");
        error_name.innerHTML = "Project name is required"
    }
    if (description.value === '' || description.value == null) {
        index++
        description.classList.add("is-invalid");
        error_description.innerHTML = "Project name is required"
    }
    if (index > 0) {
        e.preventDefault()
    }

})   