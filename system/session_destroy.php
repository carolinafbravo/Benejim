<?php
//***********************************************************************//
//*		Script permettant la destruction des variables de session avant *//
//* 	de quitter l'appli												*// 
//***********************************************************************//

session_destroy() ;
header ("Location: ../start.php") ;

?>
