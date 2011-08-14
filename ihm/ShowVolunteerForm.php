<form method="post" action="ModifyVolunteer.php" enctype="multipart/form-data">
<label>Civilit&eacute;: </label>

<?php if(isset($val['id']) && !empty($val['id'])) echo"<input type=\"hidden\" name=\"id\" value=\"".$val['id']."\">";?>
<?php if(isset($val['actif']) && !empty($val['actif'])) echo"<input type=\"hidden\" name=\"actif\" value=\"".$val['actif']."\">";?>
<?php if(isset($val['mineur']) && !empty($val['mineur'])) echo"<input type=\"hidden\" name=\"mineur\" value=\"".$val['mineur']."\">";?>
<select name="civilite">
	<option value="1" <?php if (isset($val['civilite']) && ($val['civilite']==1)) echo "selected=\"selected\""; ?> >Mademoiselle</option>
	<option value="2" <?php if (isset($val['civilite']) && ($val['civilite']==2)) echo "selected=\"selected\""; ?>>Madame</option>
	<option value="3" <?php if (isset($val['civilite']) && ($val['civilite']==3)) echo "selected=\"selected\""; ?>>Monsieur</option>
</select><br/>
<label>Nom:</label>
<input id="c1" type="text" name="name" <?php if (isset($val['name'])) echo "value=\"".$val['name']."\"";?> /><br/>
<label>Pr&eacute;nom:</label>
<input type="text" name="prenom"  <?php if (isset($val['prenom'])) echo "value=\"".$val['prenom']."\"";?>/><br/>

<label>Sexe:</label><br />
<input type="radio" name="sexe" value="1" 
<?php if (isset($val['sexe']) && ($val['sexe']==1)) echo "checked=\"true\""; ?> />Masculin
<input type="radio" name="sexe" value="2" 
<?php if (isset($val['sexe']) && ($val['sexe']==2)) echo "checked=\"true\""; ?> /> F&eacute;minin<br/>

<label>Profession:</label>
<input type="text" name="profession" 
<?php if (isset($val['profession'])) echo "value=\"".$val['profession']."\"";?>/><br/>

<label>Date naissance:</label>
<input type="text" name="dnaissance" class="date-pick dp-applied" 
<?php if (isset($val['dnaissance'])) echo "value=\"".$val['dnaissance']."\"";?> /><br/>

<label>Nationalit&eacute;:</label>
<input type="text" name="nationalite"  
<?php if (isset($val['nationalite'])) echo "value=\"".$val['nationalite']."\"";?>/><br/>

<label>Adresse:</label><br/>
<input type="text" name="adresse1"  
<?php if (isset($val['adresse1'])) echo "value=\"".$val['adresse1']."\"";?>/><br/>
<input type="text" name="adresse2" 
<?php if (isset($val['adresse2'])) echo "value=\"".$val['adresse2']."\"";?> /><br/>
<input type="text" name="adresse3" 
<?php if (isset($val['adresse3'])) echo "value=\"".$val['adresse3']."\"";?> /><br/>

<label>Code Postal:</label>
<input type="text" name="cp"  
<?php if (isset($val['cp'])) echo "value=\"".$val['cp']."\"";?>/><br/>

<label>Ville:</label>
<input type="text" name="ville" 
<?php if (isset($val['ville'])) echo "value=\"".$val['ville']."\"";?> /><br/>

<select name="pays"> 
<option value="France">France</option> 
<option value="Afghanistan">Afghanistan</option> 
<option value="Albania">Albania</option> 
<option value="Algeria">Algeria</option> 
<option value="American Samoa">American Samoa</option> 
<option value="Andorra">Andorra</option> 
<option value="Angola">Angola</option> 
<option value="Anguilla">Anguilla</option> 
<option value="Antarctica">Antarctica</option> 
<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
<option value="Argentina">Argentina</option> 
<option value="Armenia">Armenia</option> 
<option value="Aruba">Aruba</option> 
<option value="Australia">Australia</option> 
<option value="Austria">Austria</option> 
<option value="Azerbaijan">Azerbaijan</option> 
<option value="Bahamas">Bahamas</option> 
<option value="Bahrain">Bahrain</option> 
<option value="Bangladesh">Bangladesh</option> 
<option value="Barbados">Barbados</option> 
<option value="Belarus">Belarus</option> 
<option value="Belgium">Belgium</option> 
<option value="Belize">Belize</option> 
<option value="Benin">Benin</option> 
<option value="Bermuda">Bermuda</option> 
<option value="Bhutan">Bhutan</option> 
<option value="Bolivia">Bolivia</option> 
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
<option value="Botswana">Botswana</option> 
<option value="Bouvet Island">Bouvet Island</option> 
<option value="Brazil">Brazil</option> 
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
<option value="Brunei Darussalam">Brunei Darussalam</option> 
<option value="Bulgaria">Bulgaria</option> 
<option value="Burkina Faso">Burkina Faso</option> 
<option value="Burundi">Burundi</option> 
<option value="Cambodia">Cambodia</option> 
<option value="Cameroon">Cameroon</option> 
<option value="Canada">Canada</option> 
<option value="Cape Verde">Cape Verde</option> 
<option value="Cayman Islands">Cayman Islands</option> 
<option value="Central African Republic">Central African Republic</option> 
<option value="Chad">Chad</option> 
<option value="Chile">Chile</option> 
<option value="China">China</option> 
<option value="Christmas Island">Christmas Island</option> 
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
<option value="Colombia">Colombia</option> 
<option value="Comoros">Comoros</option> 
<option value="Congo">Congo</option> 
<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
<option value="Cook Islands">Cook Islands</option> 
<option value="Costa Rica">Costa Rica</option> 
<option value="Cote D'ivoire">Cote D'ivoire</option> 
<option value="Croatia">Croatia</option> 
<option value="Cuba">Cuba</option> 
<option value="Cyprus">Cyprus</option> 
<option value="Czech Republic">Czech Republic</option> 
<option value="Denmark">Denmark</option> 
<option value="Djibouti">Djibouti</option> 
<option value="Dominica">Dominica</option> 
<option value="Dominican Republic">Dominican Republic</option> 
<option value="Ecuador">Ecuador</option> 
<option value="Egypt">Egypt</option> 
<option value="El Salvador">El Salvador</option> 
<option value="Equatorial Guinea">Equatorial Guinea</option> 
<option value="Eritrea">Eritrea</option> 
<option value="Estonia">Estonia</option> 
<option value="Ethiopia">Ethiopia</option> 
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
<option value="Faroe Islands">Faroe Islands</option> 
<option value="Fiji">Fiji</option> 
<option value="Finland">Finland</option> 
<option value="France">France</option> 
<option value="French Guiana">French Guiana</option> 
<option value="French Polynesia">French Polynesia</option> 
<option value="French Southern Territories">French Southern Territories</option> 
<option value="Gabon">Gabon</option> 
<option value="Gambia">Gambia</option> 
<option value="Georgia">Georgia</option> 
<option value="Germany">Germany</option> 
<option value="Ghana">Ghana</option> 
<option value="Gibraltar">Gibraltar</option> 
<option value="Greece">Greece</option> 
<option value="Greenland">Greenland</option> 
<option value="Grenada">Grenada</option> 
<option value="Guadeloupe">Guadeloupe</option> 
<option value="Guam">Guam</option> 
<option value="Guatemala">Guatemala</option> 
<option value="Guinea">Guinea</option> 
<option value="Guinea-bissau">Guinea-bissau</option> 
<option value="Guyana">Guyana</option> 
<option value="Haiti">Haiti</option> 
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
<option value="Honduras">Honduras</option> 
<option value="Hong Kong">Hong Kong</option> 
<option value="Hungary">Hungary</option> 
<option value="Iceland">Iceland</option> 
<option value="India">India</option> 
<option value="Indonesia">Indonesia</option> 
<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
<option value="Iraq">Iraq</option> 
<option value="Ireland">Ireland</option> 
<option value="Israel">Israel</option> 
<option value="Italy">Italy</option> 
<option value="Jamaica">Jamaica</option> 
<option value="Japan">Japan</option> 
<option value="Jordan">Jordan</option> 
<option value="Kazakhstan">Kazakhstan</option> 
<option value="Kenya">Kenya</option> 
<option value="Kiribati">Kiribati</option> 
<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
<option value="Korea, Republic of">Korea, Republic of</option> 
<option value="Kuwait">Kuwait</option> 
<option value="Kyrgyzstan">Kyrgyzstan</option> 
<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
<option value="Latvia">Latvia</option> 
<option value="Lebanon">Lebanon</option> 
<option value="Lesotho">Lesotho</option> 
<option value="Liberia">Liberia</option> 
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
<option value="Liechtenstein">Liechtenstein</option> 
<option value="Lithuania">Lithuania</option> 
<option value="Luxembourg">Luxembourg</option> 
<option value="Macao">Macao</option> 
<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
<option value="Madagascar">Madagascar</option> 
<option value="Malawi">Malawi</option> 
<option value="Malaysia">Malaysia</option> 
<option value="Maldives">Maldives</option> 
<option value="Mali">Mali</option> 
<option value="Malta">Malta</option> 
<option value="Marshall Islands">Marshall Islands</option> 
<option value="Martinique">Martinique</option> 
<option value="Mauritania">Mauritania</option> 
<option value="Mauritius">Mauritius</option> 
<option value="Mayotte">Mayotte</option> 
<option value="Mexico">Mexico</option> 
<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
<option value="Moldova, Republic of">Moldova, Republic of</option> 
<option value="Monaco">Monaco</option> 
<option value="Mongolia">Mongolia</option> 
<option value="Montserrat">Montserrat</option> 
<option value="Morocco">Morocco</option> 
<option value="Mozambique">Mozambique</option> 
<option value="Myanmar">Myanmar</option> 
<option value="Namibia">Namibia</option> 
<option value="Nauru">Nauru</option> 
<option value="Nepal">Nepal</option> 
<option value="Netherlands">Netherlands</option> 
<option value="Netherlands Antilles">Netherlands Antilles</option> 
<option value="New Caledonia">New Caledonia</option> 
<option value="New Zealand">New Zealand</option> 
<option value="Nicaragua">Nicaragua</option> 
<option value="Niger">Niger</option> 
<option value="Nigeria">Nigeria</option> 
<option value="Niue">Niue</option> 
<option value="Norfolk Island">Norfolk Island</option> 
<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
<option value="Norway">Norway</option> 
<option value="Oman">Oman</option> 
<option value="Pakistan">Pakistan</option> 
<option value="Palau">Palau</option> 
<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
<option value="Panama">Panama</option> 
<option value="Papua New Guinea">Papua New Guinea</option> 
<option value="Paraguay">Paraguay</option> 
<option value="Peru">Peru</option> 
<option value="Philippines">Philippines</option> 
<option value="Pitcairn">Pitcairn</option> 
<option value="Poland">Poland</option> 
<option value="Portugal">Portugal</option> 
<option value="Puerto Rico">Puerto Rico</option> 
<option value="Qatar">Qatar</option> 
<option value="Reunion">Reunion</option> 
<option value="Romania">Romania</option> 
<option value="Russian Federation">Russian Federation</option> 
<option value="Rwanda">Rwanda</option> 
<option value="Saint Helena">Saint Helena</option> 
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
<option value="Saint Lucia">Saint Lucia</option> 
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
<option value="Samoa">Samoa</option> 
<option value="San Marino">San Marino</option> 
<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
<option value="Saudi Arabia">Saudi Arabia</option> 
<option value="Senegal">Senegal</option> 
<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
<option value="Seychelles">Seychelles</option> 
<option value="Sierra Leone">Sierra Leone</option> 
<option value="Singapore">Singapore</option> 
<option value="Slovakia">Slovakia</option> 
<option value="Slovenia">Slovenia</option> 
<option value="Solomon Islands">Solomon Islands</option> 
<option value="Somalia">Somalia</option> 
<option value="South Africa">South Africa</option> 
<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
<option value="Spain">Spain</option> 
<option value="Sri Lanka">Sri Lanka</option> 
<option value="Sudan">Sudan</option> 
<option value="Suriname">Suriname</option> 
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
<option value="Swaziland">Swaziland</option> 
<option value="Sweden">Sweden</option> 
<option value="Switzerland">Switzerland</option> 
<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
<option value="Tajikistan">Tajikistan</option> 
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
<option value="Thailand">Thailand</option> 
<option value="Timor-leste">Timor-leste</option> 
<option value="Togo">Togo</option> 
<option value="Tokelau">Tokelau</option> 
<option value="Tonga">Tonga</option> 
<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
<option value="Tunisia">Tunisia</option> 
<option value="Turkey">Turkey</option> 
<option value="Turkmenistan">Turkmenistan</option> 
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
<option value="Tuvalu">Tuvalu</option> 
<option value="Uganda">Uganda</option> 
<option value="Ukraine">Ukraine</option> 
<option value="United Arab Emirates">United Arab Emirates</option> 
<option value="United Kingdom">United Kingdom</option> 
<option value="United States">United States</option> 
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
<option value="Uruguay">Uruguay</option> 
<option value="Uzbekistan">Uzbekistan</option> 
<option value="Vanuatu">Vanuatu</option> 
<option value="Venezuela">Venezuela</option> 
<option value="Viet Nam">Viet Nam</option> 
<option value="Virgin Islands, British">Virgin Islands, British</option> 
<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
<option value="Wallis and Futuna">Wallis and Futuna</option> 
<option value="Western Sahara">Western Sahara</option> 
<option value="Yemen">Yemen</option> 
<option value="Zambia">Zambia</option> 
<option value="Zimbabwe">Zimbabwe</option>
</select><br/>

<label>T&eacute;l&eacute;phone fixe:</label>
<input type="text" name="tel"  
<?php if (isset($val['tel'])) echo "value=\"".$val['tel']."\"";?> /><br/>

<label>Fax:</label>
<input type="text" name="fax"  
<?php if (isset($val['fax'])) echo "value=\"".$val['fax']."\"";?>/><br/>

<label>Portable:</label>
<input type="text" name="portable"  
<?php if (isset($val['portable'])) echo "value=\"".$val['portable']."\"";?>/><br/>

<label>Email:</label>
<input type="text" name="email"  
<?php if (isset($val['email'])) echo "value=\"".$val['email']."\"";?>/><br/>

<label>Photo:</label>
<?php 
if (isset($val['id']))
echo "<img src=\"image.php?id=".$val['id']."\"><br>"; ?>
<input type="file" name="image"><br />
 
<label>Permis Poids Lourd:</label><br />
<input type="radio" name="permis_pl" value="1" 
<?php if(isset($val['permis_pl']) && ($val['permis_pl']==1)) echo "checked=\"true\""; ?> />Oui<br />
<input type="radio" name="permis_pl" value="2" 
<?php if (isset($val['permis_pl']) &&($val['permis_pl']==2)) echo "checked=\"true\""; ?>/>Non<br />

<label>Dur&eacute;e:</label>
<select name="duree">
	<option value="1" 
	<?php if (isset($val['duree']) && ($val['duree']===1)) echo "selected=\"selected\""; ?>>
	Tout le festival</option>
	<option value="2" 
	<?php if (isset($val['duree']) && ($val['duree']===2)) echo "selected=\"selected\""; ?>>
	1ere semaine</option>
	<option value="3" 
	<?php if (isset($val['duree']) && ($val['duree']===3)) echo "selected=\"selected\""; ?>>
	2eme semaine</option>
</select><br/>


<label>Date arriv&eacute;e:</label>
<input type="text"  name="darrivee" class="date-pick dp-applied" 
<?php  if (isset($val['darrivee'])) echo "value=\"".$val['darrivee']."\"";?>/><br/>

<label>Date d&eacute;part:</label>
<input type="text"  name="ddepart" class="date-pick dp-applied" 
<?php  if (isset($val['ddepart'])) echo "value=\"".$val['ddepart']."\"";?>/><br/>

<label>Langue &eacute;trang&egrave;re:</label>
<input type="text" name="langue_etrangere"  
<?php  if (isset($val['langue_etrangere'])) echo "value=\"".$val['langue_etrangere']."\"";?>/><br/>

<label>Affectation envoy&eacute;e:</label><br />
<input type="radio" name="affectation" value="1" 
<?php if (isset($val['affectation']) && ($val['affectation']==1))
		echo "checked=\"true\""; ?>/>Oui
<input type="radio" name="affectation" value="2" 
<?php if (isset($val['affectation']) && ($val['affectation']==2)) 
		echo "checked=\"true\""; ?>/>Non 
<br />
 
<label>Badge imprim&eacute;e:</label><br />  
<input type="radio" name="badge" value="1" 
<?php if (isset($val['badge']) && ($val['badge']==1)) echo "checked=\"true\""; ?>/>Oui
<input type="radio" name="badge" value="2" 
<?php if(isset($val['badge']) &&($val['badge']==2)) echo "checked=\"true\""; ?>/>Non<br /> 
 
<label>Camping:</label><br />
<input type="radio" name="camping" value="1" 
<?php if (isset($val['camping']) && ($val['camping']==1)) echo "checked=\"true\""; ?>/>Oui
<input type="radio" name="camping" value="2" 
<?php if (isset($val['camping']) && ($val['camping']==2)) echo "checked=\"true\""; ?>/>Non<br />
 
  <label>Equipe:</label>
  
  <select name="equipe">
	<option value="1" 
	<?php if (isset($val['equipe']) && ($val['equipe']==1)) 
		echo "selected=\"selected\""; ?>>Coulisses</option>
	<option value="2" 
	<?php if (isset($val['equipe']) &&($val['equipe']==2))
		echo "selected=\"selected\""; ?>>Jazz au Coeur</option>
	<option value="3" 
	<?php if (isset($val['equipe']) &&($val['equipe']==3))
		echo "selected=\"selected\""; ?>>Bar Place</option>
	<option value="4" 
	<?php if (isset($val['equipe']) &&($val['equipe']==4))
		echo "selected=\"selected\""; ?>>Voyages</option>
	<option value="5" 
	<?php if (isset($val['equipe']) &&($val['equipe']==5))
		echo "selected=\"selected\""; ?>>Securite</option>
	<option value="6" 
	<?php if (isset($val['equipe']) &&($val['equipe']==6))
		echo "selected=\"selected\""; ?>>Chauffeurs</option>
	<option value="7" 
	<?php if (isset($val['equipe']) &&($val['equipe']==7)) 
		echo "selected=\"selected\""; ?>>Repas benevoles</option>
	<option value="8" 
	<?php if (isset($val['equipe']) && ($val['equipe']==8))
	echo "selected=\"selected\""; ?>>Repas musiciens off</option>
	<option value="9" 
	<?php if(isset($val['equipe']) &&($val['equipe']==9))
	echo "selected=\"selected\""; ?>>Placeurs</option>
	<option value="10" 
	<?php if (isset($val['equipe']) &&($val['equipe']==10))
	echo "selected=\"selected\""; ?>>Informatique</option>
  </select><br/>
  
<?php 
	if(isset($val))
	{
		list( $day,$month, $year) = explode('-', $val['dnaissance']);
		$diff = time() - gmmktime(0,0,0,$day,$month,$year);
		$mineur = ( $diff <= 18*3600 );  

		if($mineur) 
		{ 
		
			echo "<h4>Responsable l&eacute;gal:</h4>";
			echo "<label>Nom:</label>";
			echo "<input type=\"text\" name=\"respon_nom\" value=\"";
			if (isset($val['respon_nom'])) echo $val['respon_nom'];
			echo "\"><br />";
			
			echo "<label>Pr&eacute;nom:</label>";
			echo "<input type=\"text\" name=\"respon_nom\" value=\"";
			if (isset($val['respon_prenom'])) echo $val['respon_prenom'];
			echo "\"><br />";
			
			echo "<label>T&eacute;l&eacute;phone:</label>";
			echo "<input type=\"text\" name=\"resp_tel\" value=\"";
			if (isset($val['respon_prenom'])) echo $val['respon_prenom'];
			echo "\"><br />";
		}
		if(($val['camping']==1) && isset($val['details_camping']))
		{
		
			$value=$val['details_camping'];
			echo "<h4>Camping:</h4>";
			echo "<label>Date d'arriv&eacute;e:</label>";
			echo "<input type=\"text\" name=\"darriveecamping\" value=".$value['darriveecamping']."><br>";
			echo "<label>Date de d&eacute;part:</label>";
			echo "<input type=\"text\" name=\"ddepartcamping\" value=".$value['ddepartcamping']."><br>";
			echo "<label>Camping pay&eacute;:</label>";
			echo "<input type=\"radio\" name=\"paye\" value=\"1\"";
			if ($value['paye']==1) 
				echo "checked=\"true\""; 
			echo "/>Oui <input type=\"radio\" name=\"paye\" value=\"2\""; 
			if($value['paye']==2)
				echo "checked=\"true\""; 
			echo "/>Non<br /> ";
		
			
			if($value['type_paiement']==1)
			{
				echo "<label>Type de paiement</label>";
				echo "<input type=\"text\" name=\"type_paiement\" value=\"Esp&egrave;ces\"></br>";
			}
			else
			{
				if(!empty($value['n_cheque1']))
				{
					echo "<label>N° de ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"n_cheque1\" value=\"".$value['n_cheque1']."\"></br>";
					echo "<label>Montant du ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"montant_cheque1\" value=\"".$value['montant_cheque1']."\"><br>";
					echo "<label>titulaire du ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"titulaire_cheque1\" value=\"".$value['titulaire_cheque1']."\"><br>";
					echo "<label>Banque &eacute;mettrice du ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"banque_cheque1\" value=\"".$value['banque_cheque1']."\"><br>";
				}
				
				if(!empty($value['n_cheque2']))
				{
					echo "<input type=\"text\" name=\"n_cheque2\" value=\"Ch&egrave;que\"><br>";
					echo "<label>N° du 2&egrave;me ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"n_cheque2\" value=\"".$value['n_cheque2']."\">";
					echo "<label>Montant du 2&egrave;me ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"montant_cheque2\" value=\"".$value['montant_cheque2']."\"><br>";
					echo "<label>titulaire du 2&egrave;me ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"titulaire_cheque2\" value=\"".$value['titulaire_cheque2']."\"><br>";
					echo "<label>Banque &eacute;mettrice du 2&egrave;me ch&egrave;que:</label>";
					echo "<input type=\"text\" name=\"banque_cheque2\" value=\"".$value['banque_cheque2']."\"><br>";
				}
			}
		}
	}
?>

