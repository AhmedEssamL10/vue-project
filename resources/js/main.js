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