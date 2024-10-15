<?php
require_once ('../../db_config.php');
require_once ('Database.php');
require_once ('Dtable.php');
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name 
    $secure = SECURE; 
    $httponly = true;// This stops JavaScript being able to access the session id.
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
		header('Location: ../?Status=Browser Support');
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    session_name($session_name);
    session_start();           
    session_regenerate_id();
}
$db=new Database();
$datatable=New Dtable();
	function handleException( $exception ) {
	  echo  $exception->getMessage();
	}
set_exception_handler( 'handleException' );
?>
