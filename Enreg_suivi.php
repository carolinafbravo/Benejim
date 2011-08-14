<?php

include("system/verif_conx.php");
include("system/check_input.php");

foreach($_POST as $i=>$val)
	$tab[$i]=$val;

foreach($tab as $j)
{ 
	 if($j =='')
		$j="NA";
}

if(isset($_SESSION['ctrl']) && !empty($_SESSION['ctrl']))
{
	include("classes/class_ctrl.php");

	$c=unserialize($_SESSION['ctrl']);

	if(!empty($c))
		$c->AddConversation($tab);
}
else
	echo "<meta http-equiv=\"refresh\" content=\"0;url=ListCurrentVolunteers.php\"/>"; // on renvoie au menu;