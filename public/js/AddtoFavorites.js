// AddToFavorites.js
function toggleFavorite(button) {
    // Get the product ID from the button's data attribute
    const productId = button.getAttribute('data-product-id');
    if (!productId) {
        console.error('No product ID found');
        alert('Error: Could not identify product');
        return;
    }

    const icon = button.querySelector("i");
    const isCurrentlyFavorited = icon.style.color === "red";
    
    // Optimistically update UI
    icon.style.color = isCurrentlyFavorited ? "" : "red";
    
    // Create form data
    const formData = new FormData();
    formData.append('product_id', productId);
    
    // Determine which endpoint to call
    const endpoint = isCurrentlyFavorited ? '/wishlist/delete' : '/wishlist/store';
    
    fetch(endpoint, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); // Change to text() since your PHP returns redirects
    })
    .then(data => {
        try {
            // Try to parse as JSON in case it's a JSON response
            const jsonData = JSON.parse(data);
            if (jsonData.success) {
                console.log('Operation successful');
            } else {
                throw new Error(jsonData.message || 'Operation failed');
            }
        } catch (e) {
            // If it's not JSON, it's probably a redirect response
            console.log('Operation completed');
        }
    })
    .catch(error => {
        // Revert the icon on error
        icon.style.color = isCurrentlyFavorited ? "red" : "";
        console.error('Error:', error);
        alert('Failed to update wishlist');
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Find all wishlist buttons and initialize them
    const wishlistButtons = document.querySelectorAll('[data-wishlist-button]');
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            toggleFavorite(this);
        });
    });
});