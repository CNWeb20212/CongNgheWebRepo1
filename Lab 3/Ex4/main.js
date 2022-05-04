var inputName = document.querySelector('.input-name');
var inputEmail = document.querySelector('.input-email');
var inputTelephone = document.querySelector('.input-telephone');

var btn = document.querySelector('.btn');

var showSection = document.querySelector('.show-section'); 
var showText = document.querySelector('.show-text');


function checkName() {
    var cnt=0;

    for(var i=0; i<inputName.value.length; i++){
        if(inputName.value[i] !== ' ') cnt++;
    }

    if(cnt === 0) return false;

    return true;
}

function checkEmail() {
    var cnt=0;

    for(var i=0; i<inputEmail.value.length; i++){
        if(inputEmail.value[i] === '@') cnt++;
    }

    if(cnt !== 1) return false;

    return true;
}

function checkTelephone() {
    for(var i=0; i<inputTelephone.value.length; i++){
        if(inputTelephone.value[i] > '9' || inputTelephone.value[i] < '0' ) return false;
    }

    if(inputTelephone.value.length == 0) return false;

    return true;
}

function showMessage(){

    if(checkName() && checkEmail() && checkTelephone()){
        var newText = 'Bạn đã hoàn thành form!';

        showText.innerHTML = newText;
        showSection.classList.remove('hidden');
        showText.classList.add('center');
    }
    else {
        var newText='';

        if(!checkName()) newText += 'Bạn nhập tên chưa đúng. <br>';
        if(!checkEmail()) newText += 'Bạn nhập email chưa đúng. <br>';
        if(!checkTelephone()) newText += 'Bạn nhập số điện thoại chưa đúng. <br>';

        newText += 'Hãy nhập lại!';

        showText.innerHTML = newText;
        showSection.classList.remove('hidden');
        showText.classList.remove('center');
    }
}

btn.addEventListener('click', showMessage);
