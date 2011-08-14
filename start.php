<?php
//***********************************************************************//
//*		Script permettant l'identification de l'utilisateur et créé 	*//
//*		connexion à la base												*//
//***********************************************************************//
include("system/simpleconx.php") ;

@session_destroy() ;

if(isset($_POST['login']))
	$login = $_POST['login'] ; //Login
if(isset($_POST['password']))
	$password = $_POST['password'] ;

if (isset($login)) 
{
	if (!empty($login)) 
	{ 
		if (!empty($password)) 
		{ //on cherche sur l'admin
			$search=mysql_query("select * from utilisateur where login='".$login."'");
			if(mysql_num_rows($search) > 0)
			{ 
				$find = mysql_fetch_array($search) ;
				
				if ($password == $find['mdp'])
				{   
					session_start() ;
					
					$_SESSION['login'] = $login ;
					$_SESSION['password'] = $password ;
					$_SESSION['master'] = $find['id_utilisateur'] ;
					$_SESSION['mail'] = $find['mail'] ;
					header("Location: index.php") ;
					
					exit () ;
				} 
			}
		}
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Loggez vous !</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
</head>
<body bgcolor="#FFFFFF">

<form method="post">
<div align="center">
<table cellpadding="10">
<tr>
<td align="center"><IMG src="gfx/logo.jpg" border="0"><br><br>
<table border="0">
<th>Bienvenue sur l'application de gestion des b&eacute;n&eacute;voles de Marciac</th>
<tr><td><font face="Verdana" size="2">Login</font></td><td><input type="text" name="login" size="20" /></td></tr>
<tr><td><font face="Verdana" size="2">Passe</font></td><td><input type="password" name="password" size="20" /></td></tr>
<tr><td colspan="2" align="center"><br><input type="submit" value="Identification" /></td></tr>
</table>
</td></tr>
</table>
<br><a href="creer_profil.php" style="text-decoration: none"><font face="Verdana" size="2">Cr&eacute;er un compte</font></a>
<br><a href="send_logs.php" style="text-decoration: none"><font face="Verdana" size="2">Mot de passe oublié ?</font></a>
</div>
</form>

</body>

</html>
