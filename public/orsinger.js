"use strict";
// Consider the following code:


// Log true if the input is equal to 21, otherwise log false.
function isBlackJack(input) {
    if (input == 21) {
        return true;
    } else {
        return false;
    }
}

var outcome = isBlackJack(21);
//console.log(outcome);

if (outcome == true) {
    alert('Black-Jack 21, you WIN!');
} else {
    alert('YOU LOSE!');
}   