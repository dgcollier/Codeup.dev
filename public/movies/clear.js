"use strict";

var confirm = confirm('Are you sure you want to clear your queue? This action cannot be undone.')

if (confirm) {
    location.replace('clear.php');
} else {
    location.replace('index.php');
}