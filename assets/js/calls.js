    let cartTotal = 0;

    // add items to the shopping cart, checks if item already exists in the cart
    function addToCart(val) {
        let id = val[0];
        let price = val[1];

        $.ajax({
            type: 'POST',
            url:'includes/calls.php',
            data: {
                'addToCart' : 1,
                'id' : id
            },
            success: function (data) {
                // console.log(data);
                cartTotal = data['added'] === 1 ? cartTotal + price : cartTotal;
                $('#cart-link').html('View items in cart.');
                console.log(data);
                alert('Cart has been updated');
            }
        })
    }

    function validateCoupon(val) {
        console.log('Coupon : ' + val[0] + 'size is : ' + val[1] + 'Total is : ' + val[2]);
        let message;
        let coupon = val[0];
        let size = val[1];
        let total = val[2];
        $.ajax({
            type: 'POST',
            url:'includes/calls.php',
            data: {
                'validateCoupon' : 1,
                'coupon' : coupon,
                'cart_total' : total,
                'quantity' : size
            },
            success: function (data) {
                // let selected = response['id'];
                console.log(data);
                if (parseInt(data) === parseInt(total)){
                    message = 'Coupon can not be used with this order'
                }
                else {
                    message = 'Coupon discount applied successfully'
                    $('#cart_total').val(data);
                }
                alert(message);
            }
        })
    }