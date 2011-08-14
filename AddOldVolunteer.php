<?php

include("system/verif_conx.php");

foreach($_GET as $i=>$v)
	$tab[$i]=$v;
	
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
{ 
	if(isset($_SESSION['ctrl']) && !empty($_SESSION['ctrl']))
	{
		include("classes/class_ctrl.php");

		$c=unserialize($_SESSION['ctrl']);

		if(!empty($c))
			$c->AddOldVolunteer($tab, $_GET['id']);
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"0;url=ListCurrentVolunteers.php\"/>"; // on renvoe au menu;
}
else
	echo "<meta http-equiv=\"refresh\" content=\"0;url=ListCurrentVolunteers.php\"/>"; // on renvoie au menu;