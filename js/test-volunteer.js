$(document).ready(function(){

	//alert('hello');
	$('select[name=civilite] option[value=2]').attr("selected","selected");

	$('input[name=name]').val('Dupont');
	$('input[name=prenom]').val('Marie');
	$('input[name=sexe][value=2]').attr('checked', true);
	$('input[name=profession]').val('informaticienne');
	//$('input[name=dnaissance]').val('1980-01-01');
	$('input[name=nationalite]').val('francaise');
	$('input[name=adresse1]').val('rue des cygnes');
	$('input[name=adresse2]').val('app. 6');
	$('input[name=adresse3]').val('num 5');
	$('input[name=cp]').val('15402');
	$('input[name=ville]').val('Marciac');
	$('select[name=pays] option[value="France"]').attr("selected","selected");

	
	
	$('input[name=tel]').val('66-66-66-66-66');
	$('input[name=fax]').val('77-77-77-77-77');
	$('input[name=portable]').val('88-88-88-88-88');
	$('input[name=email]').val('marie@hotmail.fr');
	$('input[name=permis_pl][value=2]').attr('checked', true);
	
	$('select[name=duree] option[value=2]').attr("selected","selected");
	
	$('input[name=darrivee]').val('2011-07-30');
	$('input[name=ddepart]').val('2011-08-17');
	$('input[name=langue_etrangere]').val('anglais, espagnol');
	
	$('input[name=affectation][value=2]').attr('checked', true);
	$('input[name=badge][value=2]').attr('checked', true);
	$('input[name=camping][value=2]').attr('checked', true);
	
	
	$('select[name=equipe] option[value=4]').attr("selected","selected");
	
	//$('input[name=]').val('');
	
});