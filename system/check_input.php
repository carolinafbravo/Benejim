<?php
function check_input(&$tab)
{
	foreach($tab as $i=>$val)
	{ 
		if(!isset($val) || empty($val))
			$val="NA";
	}
}

?>