<?php  

    function inputHas($key)
    {
        if (isset($_REQUEST[$key])) {
            return true;
        } else {
            return false;
        }
    }

    function inputGet($key)
    {
        if (empty($_REQUEST[$key])) {
            return NULL;
        } else {
            return $_REQUEST[$key];
        }
    }

    function escape($input)
    {
        $input = htmlspecialchars(strip_tags($input));
        return $input;
    }

?>