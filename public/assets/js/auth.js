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
