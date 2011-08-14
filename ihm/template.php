<html>
	<head>
		<title>Gestion des b&eacute;n&eacute;voles de Marciac</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	
		
		

        <!-- jQuery -->
		<script type="text/javascript" src="js/jquery_002.js"></script>
        
        <!-- required plugins -->
		<script type="text/javascript" src="js/date.js"></script>
		<!--[if lt IE 7]><script type="text/javascript" src="js/jquery.bgiframe.min.js"></script><![endif]-->
        
        <!-- jquery.datePicker.js -->
		<script type="text/javascript" src="js/jquery.js"></script>
        
        <!-- datePicker required styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css">
		
        <!-- page specific styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.css">
        
		<!--
			<script type="text/javascript" src="js/test-volunteer.js"></script>  
		-->
        <!-- page specific scripts -->
		<script type="text/javascript" charset="utf-8">
		
           $(function()
			{
				$('.date-pick').datePicker(
					{
						startDate: '01/01/1900'
					}
				);	
				
				$('.date-pick').next().html($('<img src="img/icons/calendar.png"/>'));
				
			});
			
			
			
		</script>
	</head>

	<body>
	
		<div align="center">
		<table id="main">
				<tr><td>
				<table >
					<tr id="header-row"><td colspan="2">
						<a href="index.php"> 
							<img id="bandeau" src="img/bandeau.png" title="JiM"/><br>
						</a>
					</td></tr>
					
					<tr id="content-row">
					<td id="left-col" >
					
					<div id="menu">
						<h3>Menu</h3>
						<ul>
							<li>
								<a href="ListCurrentVolunteers.php">
								<img class="icon" src="img/icons/user.png" alt="G&eacute;rer vos b&eacute;n&eacute;voles" >
								B&eacute;n&eacute;voles</a>
								<ul>
									<li>
										<a href="NewVolunteer.php">
										<img class="icon" src="img/icons/user_add.png" alt="G&eacute;rer vos b&eacute;n&eacute;voles" >
										Ajouter b&eacute;n&eacute;vole</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="">
								<img class="icon" src="img/icons/group.png" alt="" />Equipes</a>
							</li>
							
					
							<li>
								<a href="">
								<img class="icon" src="img/icons/house.png" alt="" />Cantine</a>
							</li>
				
							<li>
								<a href="system/session_destroy.php" onclick="return confirm('D&#233;sirez vous vraiment quitter ?')">
								<img class="icon" src="img/icons/cancel.png" alt="" title="Quitter"/>&nbsp;Quitter</a>
							</li>
						</ul>
					
					</div>
					
					</td>
				
					<td id="right-col" >
						<?php echo $content; ?>
					</td>
					</tr>
				</font>
				
				</table>
				</td></tr>
		</table>
		</div>
	
	</body>

</html>