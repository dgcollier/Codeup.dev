// Be sure to link jquery!
// <script src="/js/jquery.js"></script>
"use strict";
$(document).ready(function() {

    var konami = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
    var keylog = [];

    $(document).keydown(function (e){
        var newContent = keylog.push(e.keyCode);
        console.log(e.keyCode);
        // console.log(keylog);

        if (keylog.length > konami.length) {
            keylog.shift();
        }

        if (konami.toString() == keylog.toString()) {
            alert('You have added 30 lives');
            // add fun stuff here!!!
        }
    });
});