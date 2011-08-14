<?php

include("system/verif_conx.php");

if(isset($_GET['id']) && ! empty($_GET['id']) && is_numeric($_GET['id']))
{
	if(isset($_SESSION['ctrl']) && !empty($_SESSION['ctrl']))
	{
		include("classes/class_ctrl.php");

		$c=unserialize($_SESSION['ctrl']);

		if(!empty($c))
			$c->RemoveVolunteer($_GET['id']);
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"0;url=ListCurrentVolunteers.php\"/>"; // on renvoie au menu;
}
else
	echo "<meta http-equiv=\"refresh\" content=\"0;url=ListCurrentVolunteers.php\"/>"; // on renvoie au menu;