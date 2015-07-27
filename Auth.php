<?php

require_once 'Log.php';
require_once 'functions.php';


class Auth 
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function attempt ($username, $password)
    {
        if (self::escape($username == 'guest') && password_verify(self::escape($password), self::$password)) {
            $_SESSION['LOGGED_IN_USER'] = $username;
            $log1 = new Log();
            $log1->logInfo("User $username logged in.");
        } else {
            $log1 = new Log();
            $log1->logError("User $username failed to log in.");
        }
    }

    public static function check ()
    {
        if (isset($_SESSION['LOGGED_IN_USER'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function user ()
    {
        if (!empty($_SESSION['LOGGED_IN_USER'])) {
            return $_SESSION['LOGGED_IN_USER'];
        }
    }

    public static function logout ()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        session_destroy();

        Auth::redirect();  
    }

    public static function redirect ()
    {
        header("location: /login.php");
        exit();  
    }

    public static function login ()
    {
        header("location: /authorized.php");
        exit();
    }

    public static function escape($input)
    {
        $input = htmlspecialchars(strip_tags($input));
        return $input;
    }

}