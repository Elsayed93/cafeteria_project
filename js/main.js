/*
let imgArr = document.getElementsByClassName('prodImg');
console.log(imgArr);
let n = imgArr.length;
for (let i = 0; i < n; i++) {
    imgArr[i].addEventListener('click', function(){
        document.getElementById('myOrder').innerHTML= 'product name' + ' product price' + ' + Icon' + ' - Icon' + ' EGP' + ' 25';
        console.log(document.getElementById('myOrder'));

    });  
};
*/

/************************************************************ */

$(document).ready(function(){
    $('.prodImg').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });
});

