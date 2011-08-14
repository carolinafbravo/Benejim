


<?php
if(isset($val['suivi']))
		$value=$val['suivi'];

echo "<form method=\"POST\" action=\"Enreg_suivi.php\">";
echo "<h4>Suivi:</h4>";

echo "<label>Date de l'entretien:</label>";
echo "<input type=\"text\" name=\"date_ent\" value=".$value['date_ent']."><br>";
echo "<label>moyen_contact:</label>";
echo "<input type=\"text\" name=\"moyen_contact\" value=".$value['moyen_contact']."><br>";
echo "<label>Description:</label>";
echo "<input type=\"text\" name=\"description\" value=".$value['description']."><br>";



echo "</form>";
?>