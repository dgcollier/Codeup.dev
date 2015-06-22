// start all JS files with:
'use strict';
(function() {

    // do-while loop should return true/ false.
    // empty string or cancel will return false or null/ undefined, which act as false
    // loop will execute until response valuates as true (line 7 valuates as false)

    var response;
    do {
        response = prompt('What is your name?');
    } while(!response);

    //if person's name is Ben or Ryan, say 'hello instructor'
    //else say 'hello student'

    // if (response.toLowerCase().trim() === 'ben' || response.toLowerCase().trim() ==='ryan') {
    //     //  if use "if (response === ('Ben' || 'Ryan'))", will evaluate strings as true, since non-empty.>>
    //     //>> so "if response is true or true will always evaluate true"
    //     // .toLowerCase allows string to evaluate regardless of caps status
    //     // .trim allows string to contain a space before or after
    //     alert('Hello instructor!');
    // } else if { (response.toLowerCase().trim() === 'jd') {
    //     alert('Hello fellow!');
    // } else if { (response.toLowerCase().trim() === 'jenni') || (response.toLowerCase().trim() === 'hannah') {
    //     alert('Hello staff!');
    // } else if { (response.toLowerCase().trim() === 'michael girdley') {
    //     alert('Hello boss!'); 
    // } else {
    //     alert('Hello student!');
    // }

    //when you have a long else-if chain, use SWITCH!

    switch ((response.toLowerCase().trim())) {
        case 'ben':
        case 'ryan':
        case 'issac':
            alert('Hello instructor!');
            break;
        case 'jenni':
        case 'hannah':
        case 'rafa':
            alert('Hello staff!');
            break;
        default:
            alert('Hello student!');
            break;
    };

    // do not use unary operators (x++ or ++x) within a variable

    // 1 + 1 = 2, but '1' + 1 = 11 

    // if a booleam value is true, return 'heads'
    // else return 'tails'
    function headsOrTails (booleanValue) {
        if (booleanValue) {
            return 'heads';
        } else {
            return 'tails';
        }
        // OR replace if/else with below:

        return booleanValue ? 'heads' : 'false';
    };

    var books = [
        'Hitch-hiker\'s Guide',
        'House of Leaves',
        'The Bones Clocks',
        'The Great Gatsby'

    ];

    // var i = 0;

    // console.log('Book #: ' + (i + 1))
    //     // this is the same as writing out:

    // var index = i + 1;

    // console.log('Book #: ' + index);


    // for (var i = 0; i < books.length; i++) {
    //     console.log('I have read ' + books[i]);
    // }

    var literaryBragging = function(bookTitle, i) {
        console.log('I have read ' + bookTitle);
    };

    books.forEach(literaryBragging);

    literaryBragging('Tale of Two Cities');
    literaryBragging('Animal Farm');
    literaryBragging('2001: A Space Odyssey');
    literaryBragging('Lord of the Flies');

    // by defining function in a variable, we have an event handler, then we can call the function manually or with forEach

    var firstName = 'Ben';
    var lastName = 'Batschelet';

    function formalName(fName, lName) {
        return lName + ', ' + fName; 
    }

    var myName = formalName(firstName, lastName);
    var yourName = formalName('David', 'Simonelli');

        console.log(myName);
        console.log(yourName);

    var promptFName = prompt('What is your first name?');
    var promptLName = prompt('What is your last name?');

    var userName = formalName(promptFName, promptLName);

        console.log(userName);


    var oldBook = books.splice(1, 1);
        console.log(oldBook);
    //splice always returns an array, this returns an array with 1 item
        // (index of where to start, number of items to return)
        // (1, 0, 'The Fault in Our Starts', 'The Shining')
            // this will add two items to an array in the 2nd and 3rd spots, increasing the index of all but index[0] by 1
        console.log(books);
        books.splice(4, 0, 'Prisoner of Azkaban');
        console.log(books);

    var shapes = [{
        type: 'rectangle',
        top: 37,
        bottom: 30,
        left: 15,
        right: 20,
        getArea: function() {
            return this.getWidth() * this.getHeight();;
        },
        getPerimeter: function() {
            return 2 * (this.getWidth() + this.getHeight());
        },
        getWidth: function() {
            return Math.abs(this.right - this.left);    
        },
        getHeight: function() {
            return Math.abs(this.top - this.bottom);
        },
    }, {
        type: 'rectangle',
        top: 30,
        bottom: 25,
        left: 12,
        right: 123,
        getArea: function() {
            return this.getWidth() * this.getHeight();
        },
        getPerimeter: function() {
            return (this.getWidth() + this.getHeight());
        },
        getWidth: function() {
            return Math.abs(this.right - this.left);    
        },
        getHeight: function() {
            return Math.abs(this.top - this.bottom);
        },
    }, {
        type: 'rectangle',
        top: 39,
        bottom: 38,
        left: 15,
        right: 20,
        getArea: function() {
            return this.getWidth() * this.getHeight();;
        },
        getPerimeter: function() {
            return (this.getWidth() + this.getHeight());
        },
        getWidth: function() {
            return Math.abs(this.right - this.left);    
        },
        getHeight: function() {
            return Math.abs(this.top - this.bottom);
        },
    }];

    shapes.forEach(function(shape) {
        console.log('Width: ' + shape.getWidth());
        console.log('Height: ' + shape.getHeight());
        console.log('Area: ' + shape.getArea());
        console.log('Perimeter: ' + shape.getPerimeter());
        console.log('---');

    });

// end all JS files with:
})();
