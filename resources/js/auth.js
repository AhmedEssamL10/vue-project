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


const formSubmittion = document.querySelector('#authForm');

if(formSubmittion) {
    formSubmittion.addEventListener('submit', function(e){
        e.submitter.classList.add('isloading')
        e.preventDefault();
        const formData = new FormData(this);
        const actionUrl = e.target.getAttribute('action');
        
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
    
        $axios.post(actionUrl, data)
            .then(response => {
                if(response.data.isSuccess){
                    const redirectUrl = response.data.redirect_url;
                    if(redirectUrl){
                        window.location.href = redirectUrl;
                    }
                }
            })
            .catch(error => {
                const errors = error.response?.data?.errors;
                if(errors){
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
                }
    
                makeAlert(error.response?.data?.message, 'error')
            })
            .finally(() => {
                e.submitter.classList.remove('isloading')
            })
    
    })
};

const logoutBtn = document.querySelector('#handleLogout');

if(logoutBtn){
    logoutBtn.addEventListener('click', function(e){
        const logoutUrl = this.getAttribute('data-logout-url');
        $axios.post(logoutUrl)
            .then(response => {
                if(response.data.isSuccess){
                    const redirectUrl = response.data.redirect_url;
                    if(redirectUrl){
                        window.location.href = redirectUrl;
                    }
                }
            })
            .catch(error => {
                makeAlert(error.response?.data?.message, 'error')
            })
            .finally(() => {})
    })
}
