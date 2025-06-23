document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tabBtn');
    const tabContents = document.querySelectorAll('.tabContent');
    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-target');
    
            // Hide all tab contents
            tabContents.forEach((content) => {
                content.classList.add('hidden');
            });
    
            // Show the selected tab content
            document.getElementById(target).classList.remove('hidden');
    
            // Remove active class from all tabs
            tabs.forEach((tab) => {
                tab.classList.remove('active');
            });
    
            // Add active class to the clicked tab
            tab.classList.add('active');
        });
    });
})

