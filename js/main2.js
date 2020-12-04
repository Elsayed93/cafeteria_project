
// when I click on the product image 
$('.prodImg').on('click', function () {
    var id = $(this).attr('value');
    console.log($('#myOrder').html);
    $.ajax({
        method: 'GET',
        url: 'showOrder.php',
        data: {
            'id': id,
        },
        success: function (responseText) {
            $('#myOrder').html = responseText;
            $('#myOrder').append(responseText);
        }
    });
});

// when I increase my order item
var counter = 1;
function upOrder() {
    counter++;
    let res1 = $('#counter').html(counter);
    let result = $('#counter').html();
    let res2 = $('#productPrice').attr('data-target');
    let totalPrice = result * res2;
    $('#productPrice').html('EGP ' + totalPrice);

    // total order price 
    $('#orderPrice').html('EGP ' + totalPrice);

    // $.ajax({
    //     method: 'GET',
    //     url: 'showOrder.php',
    //     data: {
    //         'counter': counter,
    //     },
    //     success: function (responseText) {
    //         document.getElementById('counter').innerHTML = responseText;
    //     }
    // });

};

// when I decrease my order item
function downOrder() {
    counter--;

    if (counter >= 0) {
        let res1 = $('#counter').html(counter);
        let result = $('#counter').html();
        let res2 = $('#productPrice').attr('data-target');
        let totalPrice = result * res2;
        $('#productPrice').html('EGP ' + totalPrice);

        // total order price 
        $('#orderPrice').html('EGP ' + totalPrice);


    } else {
        counter = 0;
    }
};


// when I confirm my Order 
$(document).on('click', '#confirmBtn', function () {
    let myOrder = $('#myOrder').html();
    console.log(myOrder);
    let userNotes = $('#notesId').val();
    console.log(userNotes);
    let roomNo = $('#rooms').val();
    console.log(roomNo);
    let orderPrice = $('#orderPrice').html();
    console.log(orderPrice);

    $.ajax({
        url: 'confirmOrder.php',
        type: 'POST',
        data: {
            // 'save': 1,
            'myOrder': myOrder,
            'userNotes': userNotes,
            'roomNo': roomNo,
            'orderPrice': orderPrice
        },
        success: function (response) {
            $('#myOrder').val('');
            $('#notesId').val('');
            $('#myOrder').append(response);
        }
    });
});






