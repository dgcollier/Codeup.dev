// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'blue'; // TODO: change this to your favorite color from the list

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.

var message = '';

if (color === 'red') {
    message = 'Red is the color of that school in Norman.';
} else if (color === 'orange') {
    message = 'Orange is the color of a really awesome school in Austin.';
} else if (color === 'yellow') {
    message = 'Yellow is the color of cowards and dirt burglars.';   
} else if (color === 'green') {
    message = 'Green is the color of money, at least in America.';
} else if (color === 'blue') {
    message = 'Blue is the color of the ocean.';
} else {
    message = 'Error: that\'s just fake purple!';
}

console.log(color);
console.log(message);


