<?php
/*
Cette clase sert a controler et repartir les instructions des differents modules de l'appli. Son constructeur initie la base de donnees et
gere les tableaux d'armees, d'escouades, d'usines...
Il repartit les taches vers les modules desires.

class ctrl
*/

@session_start();

include("classes/class_BDD.php");
include("classes/class_ihm.php");

class ctrl
{
	private $_bdd;
	private $_ihm;
	private $_clt;
	private $_tab_benevoles;
	private $_tab_equipes;
	
	function __construct($log, $mdp)
	{ 
		$this->_bdd=new BDD($log, $mdp); 
		$this->_ihm=new ihm();

		$this->init();
	}
	
	private function init()
	{ 
		if($this->_bdd->lire_benevoles($tab_benevoles))
			$this->_tab_benevoles=$tab_benevoles; 
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la récupération des données des bénévoles", "start.php");
		
		if($this->_bdd->lire_equipes($tab_equipe))
			$this->_tab_equipe=$tab_equipe;
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la récupération des données des différents secteurs", "start.php");
		
		if($this->_bdd->lire_camping($camping))
		{
			if(sizeof($camping)>0)
			{
				foreach($this->_tab_benevoles as $i=>$val)
				{ 
					foreach($camping as $j=>$v)
					{ 
						if($v['id']==$val['id']) 
						{
							$this->Supprimer_Elt_Tab($this->_tab_benevoles, $val['id']);
							$val['details_camping']=$v; 
							$this->_tab_benevoles[]=$val;							
						}
					}
				}
			}
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la récupération des données des différents secteurs", "start.php");
			
		if($this->_bdd->Lire_suivi($suivi))
		{
			if(sizeof($suivi)>0)
			{
				foreach($this->_tab_benevoles as $i=>$val)
				{ 
					foreach($suivi as $j=>$v)
					{ 
						if($v['id']==$val['id']) 
						{
							$this->Supprimer_Elt_Tab($this->_tab_benevoles, $val['id']);
							$val['suivi']=$v; 
							$this->_tab_benevoles[]=$val;							
						}
					}
				}
			}
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la récupération du suivi des bénévoles", "start.php");
		
		if($this->_bdd->Lire_historique($hist))
		{ 
			if(sizeof($hist)>0)
			{
				foreach($this->_tab_benevoles as $i=>$val)
				{ 
					if (isset($hist[$val['id']]))
					{
						$this->Supprimer_Elt_Tab($this->_tab_benevoles, $val['id']);
						$val['hist']=$hist[$val['id']]; 
						$this->_tab_benevoles[]=$val;							
					}
					
				}
			}
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la récupération de l\'appréciation des bénévoles", "start.php");
	}
		
	public function afficher_index()
	{  
		$content="coucou";
		$this->_ihm->afficher($content);
	}
	
	// méthodes de gestion des bénévoles
	public function ListCurrentVolunteers()
	{ 
		if(!empty($this->_tab_benevoles))
		{ 
			$content="<h3>Gestion des b&eacute;n&eacute;voles</h3>
				<table id=\"content-table\"><tr><td>&nbsp;</td><td>&nbsp;</td><td>Nom</td><td>Pr&eacute;nom</td></tr>";
			
			foreach($this->_tab_benevoles as $i=>$val)
			{
				$content.=	"<tr>
								<td><a href=\"PrintBadge.php?id=".$val['id']."\"><img src=\"img/icons/medal_gold_1.png\"/></a></td>
								<td><a href=\"ShowVolunteer.php?id=".$val['id']."\"><img src=\"img/icons/eye.png\"/></a></td>
								<td><a href=\"RemoveVolunteer.php?id=".$val['id']."\"><img src=\"img/icons/cancel.png\"/></a></td>
								<td>".$val['name']."</td><td>".$val['prenom']."</td>
							</tr>";
			}

			$content.="</table>";
			$this->_ihm->afficher($content);
		}	
		else
			$this->_ihm->afficher_alert("Problème rencontré dans l\'affichage des données des bénévoles",
								"index.php");
	}
	
	public function NewVolunteer()
	{
		$content="<h3>Nouveau b&eacute;n&eacute;vole</h3>";
		
		ob_start();
		eval('?>'.file_get_contents("ihm/AddVolunteerForm.php"));	
		$content.= ob_get_contents();
		ob_end_clean();
		
		ob_start();
		eval('?>'.file_get_contents("ihm/ShowConversation.html"));	
		$content.= ob_get_contents();
		ob_end_clean();
		
		$this->_ihm->afficher($content);
	}
	
	public function AddVolunteer($tab, $img)
	{ 
		$this->remplacement($tab);
		$this->remplacement($img);  
		$ok=false;
		foreach($this->_tab_benevoles as $i=>$val)
		{ 
			if($val['name']===$tab['name'] && $val['prenom']===$tab['prenom'] 
					&& $val['dnaissance']===$tab['dnaissance'])
			{ 
				$this->_ihm->afficher_alert("Ce bénévole existe déjà, nous l\'ajoutons automatiquement", 
									"AddOldVolunteer.php?id=".$val['id']."&contact=".$tab['contact']."&date_ent=".$tab['date_ent']."
									&moyen_contact=".$tab['moyen_contact']."&description=".$tab['description']);
				$ok=true; 
			}
		}

		if(!$this->_bdd->AddVolunteer($tab, $img, $id) && !$ok)
			$this->_ihm->afficher_alert("Problème rencontré lors de l\'écriture du bénévole", "ListCurrentVolunteers.php");
		elseif(!$ok)
		{ 
			$tab['id']=$id;
			$tab['image']=$img;
			$this->_tab_benevoles[]=$tab;
			$_SESSION['ctrl']=serialize($this);
			if($this->_bdd->InsertConversationVolunteer($tab, $id))
					$this->_ihm->afficher_alert("Enregistrement effectué", "ListCurrentVolunteers.php");
				else
					$this->_ihm->afficher_alert("Problème rencontré lors de la mis à jour du profil", "Enregistrement effectué", "ListCurrentVolunteers.php");
		}
	}
	
	public function AddOldVolunteer($id, $tab)
	{
		foreach($this->_tab_benevoles as $i=>$val)
		{ 
			if($val['id']===$id)
			{
				$this->_tab_benevoles[]=$val; 
				$_SESSION['ctrl']=serialize($this);
				if($this->_bdd->UpdateOldVolunteer($id))
					$this->_ihm->afficher_alert("Bénévole ajouté");
				else
					$this->_ihm->afficher_alert("Problème rencontré lors de la mis à jour du profil", "ListCurrentVolunteers.php");
				if($this->_bdd->InsertConversationVolunteer($tab, $id))
					$this->_ihm->afficher_alert("Suivi ajouté");
				else
					$this->_ihm->afficher_alert("Problème rencontré lors de la mis à jour du profil", "ListCurrentVolunteers.php");
			}
		}
	}
	
	// fonction d'affichage d'un benevole
	public function ShowVolunteer($id)
	{
		foreach($this->_tab_benevoles as $i=>$val)
		{
			if($val['id']==$id)
			{ 
				ob_start();
				$content="<h3>Modifier b&eacute;n&eacute;vole</h3>";
				eval('?>'.file_get_contents("ihm/ShowVolunteerForm.php").'<?php');	
				$content.= ob_get_contents();
				ob_end_clean();
			}
		}
	$this->_ihm->afficher($content);

	}
	
	// fonction modifiant un benevole dans la BDD
	public function ModifyVolunteer($tab, $img)
	{
		if($this->_bdd->ModifyVolunteer($tab, $img))
		{
			$this->Supprimer_Elt_Tab($this->_tab_benevoles, $tab['id']);
			$this->_tab_benevoles[]=$tab;
			$_SESSION['ctrl']=serialize($this);
			$this->_ihm->afficher_alert("Modification effectuée", "ListCurrentVolunteers.php");
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la modification du bénévole", "ListCurrentVolunteers.php");
	}
	
	// fonction enlevant un benevole des benevoles actifs
	public function RemoveVolunteer($id)
	{
		if($this->_bdd->RemoveVolunteer($id))
		{
			$this->Supprimer_Elt_Tab($this->_tab_benevoles, $id);
			
			$_SESSION['ctrl']=serialize($this);
			
			$this->_ihm->afficher_alert("Suppression effective", "ListCurrentVolunteers.php");
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de la suppression", "ListCurrentVolunteers.php");
	}
	
	
	
	// FONCTION GERANT LE SUIVI DES BENEVOLES
	
	// fonction d'enregistrement d'un benevole
	public function AddConversation($tab)
	{
		if($this->_bdd->Enreg_suivi($tab))
		{
			$this->Supprimer_Elt_Tab($this->_tab_benevoles, $tab['id']);
			$this->_tab_benevoles['suivi']=$tab;
			$_SESSION['ctrl']=serialize($this);
			
			$this->_ihm->afficher_alert("Insertion effectuée", "ListCurrentVolunteers.php");
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de l\écriture du suivi du bénévole", "ListCurrentVolunteers.php");
	}
	
	
	
	// FONCTION GERANT LE SUIVI DES BENEVOLES
	
	// fonction d'enregistrement d'un benevole
	public function AddHistorique($tab)
	{
		if($this->_bdd->Enreg_hist($tab))
		{
			$this->Supprimer_Elt_Tab($this->_tab_benevoles, $tab['id']);
			$this->_tab_benevoles['hist']=$tab;
			$_SESSION['ctrl']=serialize($this);
			
			$this->_ihm->afficher_alert("Insertion effectuée", "ListCurrentVolunteers.php");
		}
		else
			$this->_ihm->afficher_alert("Problème rencontré lors de l\écriture du suivi du bénévole", "ListCurrentVolunteers.php");
	}
	
	
	public function print_badge($id)
	{
		foreach($this->_tab_benevoles as $i=>$val)
		{
			if($val['id']==$id)
				include("Badge.php");
		}
	}
	
	// méthodes système
	
	private function Supprimer_Elt_Tab(&$tab, $id)
	{
		foreach($this->_tab_benevoles as $i=>$val)
		{
			if($val['id']!=$id)
				$tmp[]=$val;
		}
		$tab=$tmp;
	}
	
	private function Ajouter_Elt_Tab(&$tab, $id)
	{ 
		foreach($this->_tab_benevoles as $i=>$val)
		{
			if($val['id']!=$id)
				$tmp[]=$val;
			else
			{
				foreach($tab as $j=>$v)
				{
					if($val['id']==$v['id'])
						$ajout_tmp[]=$v;
				}
				$tmp[]=$ajout_tmp;
			}
		}
		$tab=$tmp;
	}
	
	private function verif_saisie(&$var, &$clt="")
	{
		$var=str_replace("'", "\'", $var);
		$var=str_replace("\"", "\\\"", $var);
		if(!empty($clt))
			$clt[]=$var;
	}
	
	private function remplacement(&$str)
	{
		$str=str_replace("\"", "\\\"", $str);
		$str=str_replace("'", "\'", $str);
	}
	
	// méthodes privées de traduction de langue
	private function datefr($date) 
	{ 
		$split = explode("-",$date); 
		$annee = $split[0]; 
		$mois = $split[1]; 
		$jour = $split[2]; 
		return $jour."-".$mois."-".$annee; 
	} 
	
	private function dateus($date) 
	{ 
		$split = explode("-",$date); 
		$annee = $split[2]; 
		$mois = $split[1]; 
		$jour = $split[0]; 
		return $annee."-".$mois."-".$jour; 
	} 
	
	public function __destruct()
	{
	}
}

?>