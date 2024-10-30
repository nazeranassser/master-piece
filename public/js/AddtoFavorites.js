// AddtoFavorites.js
function toggleFavorite(button, customerId, productId) {
    const icon = button.querySelector("i");
 
    if (icon.style.color === "red") {
        icon.style.color = ""; // Unfavorite
    } else {
        icon.style.color = "red"; // Favorite
        fetch('controllers/add_to_wishlist.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ customer_id: customerId, product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error("Failed to add to wishlist.");
                icon.style.color = ""; // Revert icon color on failure
            }
        })
        .catch(error => console.error("Error:", error));
    }
 }