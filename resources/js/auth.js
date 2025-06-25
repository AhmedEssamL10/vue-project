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


const formSubmissions = document.querySelectorAll('.authForm');

if (formSubmissions.length) {
    formSubmissions.forEach((form) => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = e.submitter;
            if (submitBtn) submitBtn.classList.add('isloading');

            const formData = new FormData(form);
            const actionUrl = form.getAttribute('action');

            // const data = {};
            // formData.forEach((value, key) => {
            //     data[key] = value;
            // });

            $axios.post(actionUrl, formData)
                .then(response => {
                    if (response.data.isSuccess) {
                        const redirectUrl = response.data.redirect_url;
                        if (redirectUrl) {
                            window.location.href = redirectUrl;
                        }
                    }
                })
                .catch(error => {
                    const errors = error.response?.data?.errors;
                    if (errors) {
                        for (const key in errors) {
                            const errorMessages = errors[key];
                            const inputElement = form.querySelector(`[name="${key}"]`);
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

                    makeAlert(error.response?.data?.message || 'حدث خطأ ما', 'error');
                })
                .finally(() => {
                    if (submitBtn) submitBtn.classList.remove('isloading');
                });
        });
    });
}


const logoutBtn = document.querySelectorAll('.handleLogout');

if(logoutBtn && logoutBtn.length){
    logoutBtn.forEach((btn) => {
        btn.addEventListener('click', function(e){
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
    })
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const container = toggle.closest('.password_wrapper');
            const input = container.querySelector('input[type="password"], input[type="text"]');
            if (input) {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                container.classList.toggle('passwordHidden');
                // Optional: toggle SVG or class
                // Example: toggle.classList.toggle('showing');
            }
        });
    });
});
