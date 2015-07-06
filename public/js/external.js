// console log a hello
console.log ('Hello from external JavaScript.')

var someBoolean = true;

if(someBoolean) {
    console.log("This variable is true.")
}

var someBoolean = false;
    if(someBoolean) {
        console.log("This variable is " + someBoolean)
    }
    else
        console.log("This variable is " + someBoolean)

var loggedOn = true;
var isCaptain = true;
var captainIsOnDuty = true;
var message = '';

if (loggedOn && isCaptain) {
    if (captainIsOnDuty) {
        message = 'Welcome aboard, Captain. Please stay off the rum.';
    } else {
            message = "Welcome aboard, Captain.";
    }
} else if (loggedOn) {
    message = 'Welcome aboard, crew-member.';
} else {
    message = 'Your are not yet logged on.';
}

console.log(message);