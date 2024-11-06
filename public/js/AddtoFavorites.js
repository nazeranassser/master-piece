// Wishlist functionality handler
document.addEventListener('DOMContentLoaded', function() {
    // Initialize wishlist buttons
    initWishlistButtons();
    
    // Check initial wishlist status for all products
    checkWishlistStatus();

    // Initialize wishlist count
    updateWishlistCount();
});

function initWishlistButtons() {
    const wishlistButtons = document.querySelectorAll('[data-wishlist-button]');
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            handleWishlistToggle(this);
        });
    });
}

function updateWishlistCount() {
    fetch('/wishlist/count')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const wishlistCount = document.querySelector('#wishlistCount');
                if (wishlistCount) {
                    wishlistCount.textContent = data.count;
                    wishlistCount.style.display = data.count > 0 ? 'inline' : 'none';
                }
            }
        })
        .catch(error => console.error('Error updating wishlist count:', error));
}

function handleWishlistToggle(button) {
    // Get product ID and current state
    const productId = button.getAttribute('data-product-id');
    const icon = button.querySelector('i');
    const isInWishlist = icon.classList.contains('text-danger');

    // Prepare form data
    const formData = new FormData();
    formData.append('product_id', productId);

    // Determine endpoint based on current state
    const endpoint = isInWishlist ? '/wishlist/delete' : '/wishlist/store';

    // Send request to server
    fetch(endpoint, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Toggle heart icon
            toggleHeartIcon(icon);
            
            // Update wishlist count
            updateWishlistCount();
            var numLove = document.getElementById('love').innerText;

            // Show success message
            showMessage(isInWishlist ? 'Product removed from wishlist' : 'Product added to wishlist', 'success');
            if(!isInWishlist){
                document.getElementById('love').innerText-=(-1);
            }
            // Handle removal from wishlist page
            if (isInWishlist && window.location.pathname === '/wishlist') {
                const productCard = button.closest('.col-md-4');
                if (productCard) {
                    // Add fade-out animation
                    productCard.style.transition = 'opacity 0.3s ease';
                    productCard.style.opacity = '0';
                    
                    // Remove element after animation
                    setTimeout(() => {
                        productCard.remove();
                        
                        // Check if wishlist is empty after removal
                        const remainingItems = document.querySelectorAll('.col-md-4');
                        document.getElementById('love').innerText=remainingItems.length;
                        if (remainingItems.length === 0) {
                            const container = document.querySelector('.row');
                            if (container) {
                                container.innerHTML = '<p class="text-center w-100">Your wishlist is currently empty.</p>';
                            }
                        }
                    }, 300);
                }
            }
        } else {
            // Revert UI change on failure
            showMessage(data.message || 'Failed to update wishlist', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showMessage('Please login to manage your wishlist', 'error');
        
        // Redirect to login page after a short delay
       
    });
}

function toggleHeartIcon(icon) {
    icon.classList.toggle('text-danger');
    icon.classList.toggle('text-secondary');
}

function checkWishlistStatus() {
    const buttons = document.querySelectorAll('[data-wishlist-button]');
    buttons.forEach(button => {
        const productId = button.getAttribute('data-product-id');
        
        fetch(`/wishlist/check?product_id=${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.inWishlist) {
                    const icon = button.querySelector('i');
                    if (icon) {
                        icon.classList.remove('text-secondary');
                        icon.classList.add('text-danger');
                    }
                }
            })
            .catch(error => console.error('Error checking wishlist status:', error));
    });
}

function showMessage(message, type) {
    // Create toast notification
    const toast = document.createElement('div');
    toast.className = `toast position-fixed bottom-0 end-0 m-3 ${type === 'error' ? 'bg-danger' : 'bg-success'}`;
    toast.style.zIndex = '1050';
    
    toast.innerHTML = `
        <div class="toast-body text-white">
            ${message}
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Show toast using Bootstrap
    const bsToast = new bootstrap.Toast(toast, {
        autohide: true,
        delay: 3000
    });
    bsToast.show();
    
    // Remove toast after it's hidden
    toast.addEventListener('hidden.bs.toast', () => {
        toast.remove();
    });
}

// Optional: Function to check authentication status
function checkAuthStatus() {
    return fetch('/check-auth', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (!data.authenticated) {
            window.location.href = '/login?redirect=' + encodeURIComponent(window.location.pathname);
            return false;
        }
        return true;
    })
    .catch(error => {
        console.error('Auth check failed:', error);
        return false;
    });
}