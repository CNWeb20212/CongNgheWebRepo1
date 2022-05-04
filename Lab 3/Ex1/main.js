var btnElements = document.querySelectorAll('.btn-box');
var textElement = document.querySelector('.text-content');


for (var i=0; i<btnElements.length; i++){
    btnElements[i].addEventListener('mouseover', function(){
        textElement.style = 'color:' + this.innerText;
    });
    btnElements[i].addEventListener('mouseout', function(){
        textElement.style = 'color: black';
    });
}