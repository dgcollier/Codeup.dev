<?php  

session_start();
$sessionId = session_id();

require_once '../functions.php';

endSession();
header("location: /login.php");
exit();   

function endSession ()
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
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
</body>
</html>