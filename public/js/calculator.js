(function () {
'use strict';
    var display1 = document.getElementById('display1').value;
    var display2 = document.getElementById('display2').value;
    var display3 = document.getElementById('display3').value; 

    var btn1 = document.getElementById('btn1');
    var btn2 = document.getElementById('btn2');
    var btn3 = document.getElementById('btn3');
    var btn4 = document.getElementById('btn4');
    var btn5 = document.getElementById('btn5');
    var btn6 = document.getElementById('btn6');
    var btn7 = document.getElementById('btn7');
    var btn8 = document.getElementById('btn8');
    var btn9 = document.getElementById('btn9');
    var btn0 = document.getElementById('btn0');
    var btnPlus = document.getElementById('btnPlus');
    var btnMinus = document.getElementById('btnMinus');
    var btnTimes = document.getElementById('btnTimes');
    var btnDivide = document.getElementById('btnDivide');
    var btnClear = document.getElementById('btnClear');
    var btnEquals = document.getElementById('btnEquals');
    var answer;

    var buttonClick = function (event) {
        if(document.getElementById('display2').value == '') {
            display1 = this.value;
            document.getElementById('display1').value += display1;
        } else {
            display3 = this.value;
            document.getElementById('display3').value += display3;
        }
    };

    var operate = function (event) {
        document.getElementById('display2').value = this.value;
    };

    var result = function sum() {
        var doMath = document.getElementById('display1').value + document.getElementById('display2').value + document.getElementById('display3').value;

        document.getElementById('display1').value = eval(doMath);
        document.getElementById('display2').value = '';
        document.getElementById('display3').value = '';
    }



    var clearResult = function () {
        document.getElementById('display1').value= '';
        document.getElementById('display2').value= '';
        document.getElementById('display3').value= '';
    };

    btn1.addEventListener('click', buttonClick);
    btn2.addEventListener('click', buttonClick);
    btn3.addEventListener('click', buttonClick);
    btn4.addEventListener('click', buttonClick);
    btn5.addEventListener('click', buttonClick);
    btn6.addEventListener('click', buttonClick);
    btn7.addEventListener('click', buttonClick);
    btn8.addEventListener('click', buttonClick);
    btn9.addEventListener('click', buttonClick);
    btn0.addEventListener('click', buttonClick);
    btnPlus.addEventListener('click', operate, false);
    btnMinus.addEventListener('click', operate, false);
    btnTimes.addEventListener('click', operate, false);
    btnDivide.addEventListener('click', operate, false);
    btnClear.addEventListener('click', clearResult, false);
    btnEquals.addEventListener('click', result, false);
})();