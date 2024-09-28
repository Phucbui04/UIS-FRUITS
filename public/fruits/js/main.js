


$(document).ready(function () {
    $('.service-stick').slick({
        slidesToShow: 3,  // Show 3 items at a time (for desktop)
        slidesToScroll: 1,  // Scroll one item at a time
        arrows: true,  // Show arrows
        prevArrow: $('#prev-service'),  // Custom Prev button
        nextArrow: $('#next-service'),  // Custom Next button
        infinite: false,  // Disable infinite scrolling
        dots: false,  // Disable dots at the bottom
        responsive: [
            {
                breakpoint: 1024,  // For tablets and medium screens
                settings: {
                    slidesToShow: 2,  // Show 2 items
                    arrows: true,  // Keep arrows visible
                }
            },
            {
                breakpoint: 768,  // For smaller tablets
                settings: {
                    slidesToShow: 1,  // Show 1 item at a time
                    arrows: true,  // Keep arrows visible
                }
            },
            {
                breakpoint: 480,  // For mobile screens
                settings: {
                    slidesToShow: 1,  // Show 1 item at a time
                    arrows: true,  // Hide arrows on mobile
                    dots: false  // Show dots for mobile
                }
            }
        ]
    });
});
$(document).ready(function () {
    $('.related-stick').slick({
        slidesToShow: 4,  // Show 3 items at a time (for desktop)
        slidesToScroll: 1,  // Scroll one item at a time
        arrows: true,  // Show arrows
        prevArrow: $('#prev-service'),  // Custom Prev button
        nextArrow: $('#next-service'),  // Custom Next button
        infinite: false,  // Disable infinite scrolling
        dots: false,  // Disable dots at the bottom
        responsive: [
            {
                breakpoint: 1024,  // For tablets and medium screens
                settings: {
                    slidesToShow: 2,  // Show 2 items
                    arrows: true,  // Keep arrows visible
                }
            },
            {
                breakpoint: 768,  // For smaller tablets
                settings: {
                    slidesToShow: 1,  // Show 1 item at a time
                    arrows: true,  // Keep arrows visible
                }
            },
            {
                breakpoint: 480,  // For mobile screens
                settings: {
                    slidesToShow: 1,  // Show 1 item at a time
                    arrows: true,  // Hide arrows on mobile
                    dots: false  // Show dots for mobile
                }
            }
        ]
    });
});

$(document).ready(function () {
    $('.product-image-thumbnail').slick({
        slidesToShow: 4,  // Show 3 items at a time (for desktop)
        slidesToScroll: 1,  // Scroll one item at a time
        arrows: true,  // Show arrows
        prevArrow: $('#prev-service'),  // Custom Prev button
        nextArrow: $('#next-service'),  // Custom Next button
        infinite: false,  // Disable infinite scrolling
        dots: false,  // Disable dots at the bottom
        responsive: [
            {
                breakpoint: 1024,  // For tablets and medium screens
                settings: {
                    slidesToShow: 2,  // Show 2 items
                    arrows: true,  // Keep arrows visible
                }
            },
            {
                breakpoint: 768,  // For smaller tablets
                settings: {
                    slidesToShow: 1,  // Show 1 item at a time
                    arrows: true,  // Keep arrows visible
                }
            },
            {
                breakpoint: 480,  // For mobile screens
                settings: {
                    slidesToShow: 1,  // Show 1 item at a time
                    arrows: true,  // Hide arrows on mobile
                    dots: false  // Show dots for mobile
                }
            }
        ]
    });
});

function changeImage(imageUrl) {
    document.getElementById('main-image').src = imageUrl;
}

function increaseQuantity() {
    let quantityInput = document.getElementById('quantity');
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1
}

function decreaseQuantity() {
    let quantityInput = document.getElementById('quantity');
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1
    }
}




