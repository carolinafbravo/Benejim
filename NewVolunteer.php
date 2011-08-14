<?php

include("system/verif_conx.php");

if(isset($_SESSION['ctrl']) && !empty($_SESSION['ctrl']))
{
	include("classes/class_ctrl.php");

	$c=unserialize($_SESSION['ctrl']);

	if(!empty($c))
	{
		$c->NewVolunteer();
		$_SESSION['ctrl']=serialize($c);
	}
}
else
	echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"/>"; // on renvoie au menu;