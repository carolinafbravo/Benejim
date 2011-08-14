<?php

include ("system/simpleconx.php") ;

@session_start() ; 

if (!isset($_SESSION['login'])) 
{
	header("Location: start.php") ; 
	exit () ; 
}

?>
