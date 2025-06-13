const authInput = document.querySelectorAll('input[name="user_type"]');
const company_form_input = document.querySelectorAll('.company_form_input');


authInput.forEach((input) => {
    input.addEventListener('change', function(e) {
        const userType = e.target.value;
        if(userType == 'client'){
            company_form_input.forEach((input) => {
                input.classList.remove('hidden');
            })
        }else{
            company_form_input.forEach((input) => {
                input.classList.add('hidden');
            })
        }
    })
})


const registerForm = document.querySelector('#registerForm');

registerForm.addEventListener('submit', function(e){
    console.log("e")
    console.log(e)
    e.submitter.classList.add('isloading')
    e.preventDefault();
    const formData = new FormData(this);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    $axios.post('http://127.0.0.1:8000/register', data)
        .then(response => {
            if(response.data.isSuccess){
                const redirectUrl = response.data.redirect_url;
                if(redirectUrl){
                    window.location.href = redirectUrl;
                }
            }
            // Handle success, maybe redirect or show a success message
        })
        .catch(error => {
            const errors = error.response?.data?.errors;
            
            for (const key in errors) {
                const errorMessages = errors[key];
                const inputElement = document.querySelector(`[name="${key}"]`);
                if (inputElement) {
                    let errorContainer = inputElement.nextElementSibling;
                    if (!errorContainer || !errorContainer.classList.contains('error-message')) {
                        errorContainer = document.createElement('div');
                        errorContainer.classList.add('error-message');
                        inputElement.parentNode.insertBefore(errorContainer, inputElement.nextSibling);
                    }
                    errorContainer.innerHTML = errorMessages.join('<br>');
                }
            }
            // Handle error, show error messages
        })
        .finally(() => {
            e.submitter.classList.remove('isloading')
        })

})