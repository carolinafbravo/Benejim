

<form method="POST" action="Enreg_hist.php">

<?php
if(isset($val['hist']))
		$value=$val['hist'];
?>
<h4>Historique:</h4>;
<label>Ann&eacute;e:</label>


<input type="text" name="darriveecamping" value="
<?php if (isset($value[''])) echo "value=\"".$val['name']."\"";?>
.$value['contact']."><br>";
		echo "<label>Date de l'entretien:</label>";
		echo "<input type=\"text\" name=\"date_ent\" value=".$value['date_ent']."><br>";
		echo "<label>moyen_contact:</label>";
		echo "<input type=\"text\" name=\"moyen_contact\" value=".$value['moyen_contact']."><br>";
		echo "<label>Description:</label>";
		echo "<input type=\"text\" name=\"description\" value=".$value['description']."><br>";

		echo "</form>";
	}
?>