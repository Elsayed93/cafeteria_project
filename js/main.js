// function showOrder(){
//     document.getElementById('myOrder').innerHTML= 'product name' + ' product price' + ' + Icon' + ' - Icon' + ' EGP' + ' 25';
//     console.log(document.getElementById('myOrder'));
//     showOrder();
// }
let imgArr = document.getElementsByClassName('prodImg');
console.log(imgArr);
let n = imgArr.length;
for (let i = 0; i < n; i++) {
    // const element = array[i];
    imgArr[i].addEventListener('click', function(){
        document.getElementById('myOrder').innerHTML= 'product name' + ' product price' + ' + Icon' + ' - Icon' + ' EGP' + ' 25';
        console.log(document.getElementById('myOrder'));

    });  
};
// document.getElementsByClassName('prodImg').addEventListener('click', function(){
//     document.getElementById('myOrder').innerHTML= 'product name' + ' product price' + ' + Icon' + ' - Icon' + ' EGP' + ' 25';
//     console.log(document.getElementById('myOrder'));

// });

