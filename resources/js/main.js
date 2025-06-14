import "../scss/app.scss";

/* Js Files */
import "./header.js";
import "./auth.js";
import "./swipers.js";
import "./tabs.js";
import "./vueInit.js";
import "./dashboard-vueInit.js";
import "./axios.js";

// Prevent number input scroll behavior globally
document.addEventListener('wheel', function (event) {
    if (
      document.activeElement.type === 'number' &&
      document.activeElement === document.activeElement.ownerDocument.activeElement
    ) {
      document.activeElement.blur()
    }
}, { passive: false })

// Making Alert 
let currentAlertTimeout = null;
let alertDuration = 4000;
const existingAlert = document.querySelector('.alert');
if (existingAlert) {
  existingAlert.remove();
  clearTimeout(currentAlertTimeout);
}

window.makeAlert = function(message = '', type = 'success'){
  const alertBox = document.createElement('div');
  const successIcon = `<svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 shrink-0 stroke-current"
            fill="none"
            viewBox="0 0 24 24">
            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>`;
  const errorIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
  </svg>`;
  const alertIcon = type === 'success' ? successIcon : errorIcon;

  alertBox.setAttribute('role', 'alert');
  alertBox.className = `alert alert-${type}`;
  alertBox.innerHTML = `
      ${alertIcon}
      <span>${message}</span>
  `;
  document.body.appendChild(alertBox);

  currentAlertTimeout = setTimeout(() => {
    alertBox.remove();
    currentAlertTimeout = null;
  }, alertDuration);
}