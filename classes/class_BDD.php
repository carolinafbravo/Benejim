<?php

//***********************************************************************//
//*		Classe gérant les connexions et les requêtes vers la BDD		*//
//***********************************************************************//
class BDD
{
	// variables de l'obj BDD
	private $_link;
	private $_db="benevoles_marciac";
	private $_host="localhost";
	private $_login;
	private $_password;
	
	// Constructeur
	// prend en param la base de données, le serveur et les login et mot de passe
	public function __construct($log, $mdp)
	{ 
		// lancement de la connexion à la BDD
		$this->connect($log, $mdp);
	}
	
	//accesseurs en écriture
	private function ecrire_db($db)
	{
		$this->_db=$db;
	}
	private function ecrire_host($host)
	{
		$this->_host=$host;
	}
	private function ecrire_login($log)
	{
		$this->_login=$log;
	}
	private function ecrire_password($mdp)
	{
		$this->_password=$mdp;
	}
	
	// accesseurs en lecture
	private function lire_db(&$db)
	{
		$db=$this->_db;
	}
	private function lire_host(&$host)
	{
		$host=$this->_host;
	}
	private function lire_login(&$log)
	{
		$log=$this->_login;
	}
	private function lire_password(&$mdp)
	{
		$mdp=$this->_password;
	}
	
	// méthode privée de BDD
	
	// méthode de connexion à la BDD
	private function connect($log, $mdp)
    { 	// connexion au serveur et à la base
		$this->_link = mysql_connect($this->_host, "root", "") or die("Erreur sur la base de donn&eacute;es: ".mysql_error()); 
		
		$this->ecrire_login($log);
		$this->ecrire_password($mdp);
		$_SESSION['login']=$log;
		$_SESSION['password']=$mdp;
		
		mysql_select_db($this->_db, $this->_link) or die("Erreur sql: la table recherch&eacute;e n\'existe pas.");

    }

	// méthodes publiques de BDD

	// méthode visant à retrouver les données de la connexion
    public function __wakeup()
    { 	// réinitialisation de la connexion
        $this->connect($_SESSION['login'],$_SESSION['password']);
    }

	
	
	// FONCTIONS GERANT LES BENEVOLES
	
	
	// fonction lisant dans la BDD les informations de TOUS les benevoles/salaries qui ont 
	// deja participes au festival
	public function lire_benevoles(&$tab_benevoles)
	{
		$res=mysql_query("select * from benevoles order by nom, prenom")
						or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)>=0)
		{
			while($row=mysql_fetch_assoc($res))
			{
				$tmp['id']=$row['id'];
				$tmp['civilite']=$row['civilite'];
				$tmp['name']=$row['nom'];
				$tmp['prenom']=$row['prenom'];
				$tmp['adresse1']=$row['adresse1'];
				$tmp['adresse2']=$row['adresse2'];
				$tmp['adresse3']=$row['adresse3'];
				$tmp['cp']=$row['cp'];
				$tmp['ville']=$row['ville'];
				$tmp['pays']=$row['pays'];
				$tmp['tel']=$row['tel'];
				$tmp['fax']=$row['fax'];
				$tmp['portable']=$row['portable'];
				$tmp['email']=$row['email'];
				$tmp['nationalite']=$row['nationalite'];
				$tmp['langue_etrangere']=$row['langue_etrangere'];
				$tmp['profession']=$row['profession'];
				$tmp['mineur']=$row['mineur'];
				$tmp['sexe']=$row['sexe'];
				$tmp['dnaissance']=$row['date_naissance'];
				$tmp['permis_pl']=$row['permis_pl'];
				$tmp['duree']=$row['duree'];
				$tmp['affectation']=$row['affectation_envoyee'];
				$tmp['badge']=$row['badge_imprime'];
				$tmp['darrivee']=$row['date_arrivee'];
				$tmp['ddepart']=$row['date_depart'];
				$tmp['equipe']=$row['id_equipe'];
				$tmp['camping']=$row['camping'];
				$tmp['actif']=$row['actif'];
				$tab_benevoles[]=$tmp;
			}
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	}
	
	// fonction lisant tous les benevoles actifs cette annee
	public function lire_current_benevoles(&$tab_benevoles)
	{
		$res=mysql_query("select * from benevoles where actif='1' order by nom, prenom")
						or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)>=0)
		{
			while($row=mysql_fetch_assoc($res))
			{
				$tmp['id']=$row['id'];
				$tmp['civilite']=$row['civilite'];
				$tmp['name']=$row['nom'];
				$tmp['prenom']=$row['prenom'];
				$tmp['adresse1']=$row['adresse1'];
				$tmp['adresse2']=$row['adresse2'];
				$tmp['adresse3']=$row['adresse3'];
				$tmp['cp']=$row['cp'];
				$tmp['ville']=$row['ville'];
				$tmp['pays']=$row['pays'];
				$tmp['tel']=$row['tel'];
				$tmp['fax']=$row['fax'];
				$tmp['portable']=$row['portable'];
				$tmp['email']=$row['email'];
				$tmp['nationalite']=$row['nationalite'];
				$tmp['langue_etrangere']=$row['langue_etrangere'];
				$tmp['profession']=$row['profession'];
				$tmp['mineur']=$row['mineur'];
				$tmp['sexe']=$row['sexe'];
				$tmp['dnaissance']=$row['date_naissance'];
				$tmp['permis_pl']=$row['permis_pl'];
				$tmp['duree']=$row['duree'];
				$tmp['affectation']=$row['affectation_envoyee'];
				$tmp['badge']=$row['badge_imprime'];
				$tmp['darrivee']=$row['date_arrivee'];
				$tmp['ddepart']=$row['date_depart'];
				$tmp['equipe']=$row['id_equipe'];
				$tmp['camping']=$row['camping'];
				$tmp['actif']=$row['actif'];
				$tab_benevoles[]=$tmp;
			}
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	}
	
	// fonction inserant dans la bdd un nouveau benevole en verifiant s il est mineur
	public function AddVolunteer($tab, $img, &$id)
	{
		$diff = time() - strtotime( $tab['dnaissance'] );
		$mineur = ( $diff <= 18*3600 );
		
		$res=mysql_query("insert into benevoles (id, civilite, nom, prenom, adresse1, adresse2, adresse3, cp, ville,
						pays, tel, fax, portable, email, nationalite, langue_etrangere, profession,
						mineur, sexe, date_naissance, permis_pl, duree, affectation_envoyee,
						badge_imprime, date_arrivee, date_depart, id_equipe, camping, actif)
						VALUES ('', '".$tab['civilite']."', '".$tab['name']."', '".$tab['prenom']."', '".$tab['adresse1']."', '".$tab['adresse2']."'
						, '".$tab['adresse3']."', '".$tab['cp']."', '".$tab['ville']."', '".$tab['pays']."', '".$tab['tel']."'
						, '".$tab['fax']."', '".$tab['portable']."', '".$tab['email']."', '".$tab['nationalite']."', '".$tab['langue_etrangere']."'
						, '".$tab['profession']."', '".$mineur."', '".$tab['sexe']."', '".$tab['dnaissance']."', '".$tab['permis_pl']."', '".$tab['duree']."'
						, '".$tab['affectation']."','".$tab['badge']."','".$tab['darrivee']."', '".$tab['ddepart']."', '".$tab['equipe']."', '".$tab['camping']."', '1')")      
						or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		$id=mysql_insert_id();
	
		$image=chunk_split(base64_encode(file_get_contents($img['tmp_name'])));
		
		$res2=mysql_query("insert into photos (id, image, size, type) VALUES ('".$id."', '".$image."', '".$img['size']."', '".$img['type']."')")
				or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if($res && $res2)
			return true;
		else
			return false;
	}
	
	// fonction mettant a jour dans la bdd un benevole deja presents sur d'anciens festivals 
	public function UpdateOldVolunteer($id)
	{ 
		$res=mysql_query("update benevoles set actif='1' where id='".$id."'")
					or die("Erreur sur la requ&ecirc;te: ".mysql_erroro());
		return $res;
	}
	
	// fonction supprimant un benevole de la liste des benevoles actifs (ceuwx presents cette annee)
	public function RemoveVolunteer($id)
	{
		$res=mysql_query("update benevoles set actif='2' where id='".$id."'")
					or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		return $res;
	}
	
	
	// FONCTIONS GERANT L'APPRECIATION DES BENEVOLES
	
	
	// fonction lisant l'appreciation des benevoles
	public function Lire_historique(&$hist)
	{
		$res=mysql_query("select id from historique")
				or die("Erreur sur la requ&ecirc;te: ".mysql_erroro());
		
		if(mysql_num_rows($res)>=0)
		{
			while($row=mysql_fetch_assoc($res))
				$tab_id[]=$row['id'];
			mysql_free_result($res);
			
			foreach($tab_id as $i=>$v)
			{
				$res=mysql_query("select * from historique where id='".$v."'")
						or die("Erreur sur la requ&ecirc;te: ".mysql_error());
				if(mysql_num_rows($res)>=0)
				{
					$ben = array();
					while($row=mysql_fetch_assoc($res))
					{
						$ben [] = array (
							'id'=> $row['id'],
							'annee'=> $row['annee'],
							'annee'=>$row['annee'],
							'equipe'=>$row['equipe'],
							'plus_prendre_a_l_avenir'=>$row['plus_prendre_a_l_avenir'],
							'changer_equipe'=>$row['changer_equipe'],
							'commentaires'=>$row['commentaires']
						);
					}
					$hist[$v] = $ben;
				}
			}
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	}
	
	// fonction écrivant le suivi d'un ancien bénévole
	public function InsertConversationVolunteer($tab, $id)
	{
		$res=mysql_query("insert into suivi set id='".$id."', contact='".$tab['contact']."', date_ent='".$tab['date_ent']."',
						moyen_contact='".$moyen_contact."', description='".$tab['description']."' where id='".$id."'")
						or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		return $res;
	}
	
	//fonction écrivant l'appreciation des benvoles
	public function Enreg_hist($tab)
	{
		$res=mysql_query("insert into historique (id, annee, equipe, plus_prendre_a_l_avenir, changer_equipe, commentaires)
					VALUES ('".$tab['id']."', '".$tab['annee']."', '".$tab['equipe']."', '".$tab['plus_prendre_a_l_avenir']."', '".$tab['changer_equipe']."', 
					'".$tab['commentaires']."')") or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		return $res;
	}
	
	
	
	
	// FONCTIONS GERANT LE SUIVI DES CANDIDATURES BENEVOLES
	
	
	// fonction lisant le suivi de chaque bénévole
	public function Lire_suivi(&$suivi)
	{
		$res=mysql_query("select * from suivi")
				or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)>=0)
		{
			while($row=mysql_fetch_assoc($res))
			{
				$tmp['id']=$row['id'];
				$tmp['contact']=$row['contact'];
				$tmp['date_ent']=$row['date_ent'];
				$tmp['moyen_contact']=$row['moyen_contact'];
				$tmp['description']=$row['description'];
				$suivi[]=$tmp;
			}
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	}

	//fonction écrivant le suivi des benvoles
	public function Enreg_suivi($tab)
	{
		$res=mysql_query("insert into suivi (id, contact, date_ent, moyen_contact, description)
					VALUES ('".$tab['id']."', '".$tab['contact']."', '".$tab['date_ent']."', '".$tab['moyen_contact']."', '".$tab['description']."')") 
					or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		return $res;
	}
	
	
	// FONCTIONS GERANT LES ACCES BDD AU CAMPING
	
	// fonction lisant les données du camping
	public function lire_camping(&$camping)
	{
		$res=mysql_query("select * from camping")
				or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)>=0)
		{
			while($row=mysql_fetch_assoc($res))
			{
				$tmp['id']=$row['id'];
				$tmp['darriveecamping']=$row['darriveecamping'];
				$tmp['ddepartcamping']=$row['ddepartcamping'];
				$tmp['paye']=$row['paye'];
				$tmp['type_paiement']=$row['type_paiement'];
				$tmp['n_cheque1']=$row['n_cheque1'];
				$tmp['montant_cheque1']=$row['montant_cheque1'];
				$tmp['titulaire_cheque1']=$row['titulaire_cheque1'];
				$tmp['banque_cheque1']=$row['banque_cheque1'];
				$tmp['n_cheque2']=$row['n_cheque2'];
				$tmp['montant_cheque2']=$row['montant_cheque2'];
				$tmp['titulaire_cheque2']=$row['titulaire_cheque2'];
				$tmp['banque_cheque2']=$row['banque_cheque2'];
				$camping[]=$tmp;
			}
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	}
	
	
	// FONCTIONS GERANT LES PHOTOS/IMAGES
	
	
	 //fonction lisant la photo d'un benevoles
	 public function Lire_photo(&$img, $id)
	 {
		$res=mysql_query("select * from photos where id='".$id."'");  die("select * from photos where id='".$id."'");
					//	or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)>0)
		{
			while(mysql_fetch_assoc($res))
			{
				$img['image']=$row['photo'];
				$img['size']=$row['size'];
				$img['type']=$row['type'];
			}		
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	 }
	 
	 // fonction ecrivant une photo dans la BDD
	 public function Ecrire_photo($img, $id)
	 {
		$res=mysql_query("insert into photos (id, photo, type, size) values ('".$id."', '".$img['image']."', '".$img['type']."', '".$img['size']."')")
						or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		return $res;
	 }
	 
	// fonction modifiant dans la bdd un benevole
	public function ModifyVolunteer($tab, $img)
	{
		$res=mysql_query("update benevoles set civilite='".$tab['civilite']."', nom='".$tab['name']."', prenom='".$tab['prenom']."',
							adresse1='".$tab['adresse1']."', adresse2='".$tab['adresse2']."', adresse3='".$tab['adresse3']."',
							cp='".$tab['cp']."', ville='".$tab['ville']."', pays='".$tab['pays']."', tel='".$tab['tel']."', 
							fax='".$tab['fax']."', portable='".$tab['portable']."', email='".$tab['email']."', nationalite='".$tab['nationalite']."',
							langue_etrangere='".$tab['langue_etrangere']."', profession='".$tab['profession']."', mineur='".$tab['mineur']."',
							sexe='".$tab['sexe']."', date_naissance='".$tab['dnaissance']."', permis_pl='".$tab['permis_pl']."',
							duree='".$tab['duree']."', affectation_envoyee='".$tab['affectation']."', badge_imprime='".$tab['badge']."',
							date_arrivee='".$tab['darrivee']."', date_depart='".$tab['ddepart']."', id_equipe='".$tab['equipe']."',
							camping='".$tab['camping']."', actif='1' where id='".$tab['id']."'")
		or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		return $res;
	}
	
	// fonction lisant l'identifiant d'un benevole
	public function Lire_id_benevole($tab)
	{
		$res=mysql_query("select id from benevoles where nom='".$tab['name']."' and prenom='".$tab['prenom']."'
							and date_naissance='".$tab['dnaissance']."'")
							or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)==1)
		{
			$row=mysql_fetch_assoc($res);
			return $row['id'];
		}
		else
			return 0;
	}
	
	// fonction lisant dans la BDD les informations sur les differents equipes du festival
	public function lire_equipes(&$tab_equipe)
	{
		$res=mysql_query("select * from equipes")
					or die("Erreur sur la requ&ecirc;te: ".mysql_error());
		if(mysql_num_rows($res)>0)
		{
			while($row=mysql_fetch_assoc($res))
			{
				$tmp[]=$row['id'];
				$tmp[]=$row['label'];
				$tmp[]=$row['id_chef_equipe'];
				$tmp[]=$row['acces_coulisse'];
				$tab_equipe[]=$tmp;
			}
			mysql_free_result($res);
			return true;
		}
		else
			return false;
	}
	
	
	
	// Autres méthodes de l'obj BDD
	public function _destruct()
	{
		mysql_close();
	}
}

?>