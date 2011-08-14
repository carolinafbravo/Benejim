<?php

//*****************************************************************************//
//* 	script d'accueil et de retour en cas d'erreur						  *// 
//*****************************************************************************//
// inclusion système
include ("system/verif_conx.php") ;

include("classes/class_ctrl.php");

$c=new ctrl($_SESSION['login'], $_SESSION['password']);

if(!empty($c))
{
	$c->afficher_index();

	$_SESSION['ctrl']=serialize($c);
}
else
	echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"/>"; // on renvoie au menu

?>