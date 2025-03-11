// const hamMenu = document.querySelector('.ham-menu');
const offScreenMenu = document.querySelector('.off-screen-menu');
const hamburger = document.querySelector('.hamburger-menu');

function toggleMenu() {
    offScreenMenu.classList.toggle('active'); 
    hamburger.classList.toggle('active');
}

document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.createElement("input");
    const mainContent = document.querySelector("main");

    // Add a search input field above the main content
    searchInput.type = "text";
    searchInput.placeholder = "Search this page...";
    searchInput.style.marginBottom = "20px";
    mainContent.parentNode.insertBefore(searchInput, mainContent);

    // Function to perform the search
    const performSearch = (query) => {
        const sections = mainContent.querySelectorAll("section");
        sections.forEach((section) => {
            const textContent = section.textContent.toLowerCase();
            if (textContent.includes(query.toLowerCase())) {
                section.style.backgroundColor = "#ffff99"; // Highlight matching section
            } else {
                section.style.backgroundColor = ""; // Remove highlight if no match
            }
        });
    };

    // Event listener for input changes
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.trim();
        performSearch(query);
    });
});
