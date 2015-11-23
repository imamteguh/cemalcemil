<?php
@session_start();
if(isset($_SESSION['email_login']))
{
	unset($_SESSION['email_login']);
	session_destroy();
	header('location:index.php');
}

?>