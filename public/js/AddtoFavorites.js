function toggleFavorite(button) {
    const icon = button.querySelector("i");
    
    // Toggle between red and gray color for the heart icon
    if (icon.style.color === "red") {
        icon.style.color = "gray"; // Original color
    } else {
        icon.style.color = "red"; // Favorite color
    }
}