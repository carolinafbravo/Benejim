<?php

class ihm
{
	public function _construct()
	{
	}
	
	public function afficher($content)
	{
		eval('?>'.file_get_contents("ihm/template.php").'<?php');	
	}
	
	// fonction affichant une fenetre d alerte informative
	public function afficher_alert($str, $redir="")
	{
		if($redir!="")
			echo "<script>alert('".$str."');</script>
					<meta http-equiv=\"refresh\" content=\"0;url=".$redir."\"/>";	
			else
				echo "<script>alert('".$str."');</script>";
	}
	
	// fonction de debogage de variables
	public function debug_var($var, $var2=0, $var3=0, $var4=0, $var5=0)
	{
		echo "<br><br>var1=".$var;
		echo "<br><br>var2=".$var2;
		echo "<br><br>var3=".$var3;
		echo "<br><br>var4=".$var4;
		echo "<br><br>var5=".$var5;
	}
	
	// fonction de debogage de tableaux
	public function debug_tab($tab)
	{
		echo "<pre>";
		print_r($tab);
		echo "</pres>";
	}
	
	public function _destruct()
	{
	}
}

?>