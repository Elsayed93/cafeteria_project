
$('.prodImg').on('click', function(){
    var id = $(this).attr('value');
        
    $.ajax({
        method: 'GET',
        url: 'showOrder.php',
        data: {
            'id': id,
        },
        success: function (responseText) {
            document.getElementById('myOrder').innerHTML = responseText;
        }
    });
});

let counter = 0; 

function upOrder(){
    counter ++;
    var res1 = $('#counter').html(counter);
    var result = $('#counter').html();
    // console.log(result);
    var res2 = $('#productPrice').attr('data-target'); 
    // console.log(res1);
    // console.log(res2);
    // console.log(result * res2);
    $('#productPrice').html(result * res2);
    
    
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

function downOrder(){
    counter --;
    
    if(counter >= 0) {
        var res1 = $('#counter').html(counter);
        var result = $('#counter').html();
        // console.log(result);
        var res2 = $('#productPrice').attr('data-target'); 
        // console.log(res1);
        // console.log(res2);
        // console.log(result * res2);
        $('#productPrice').html(result * res2);
    
    }else {
        counter = 0;
    }
   

};






