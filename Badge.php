<?php

//$url="http://localhost/benevoles_marciac/image.php?id=".$val["id"];
$photo="C:\wamp\www\image_magick\desert.png";
//$blob=file_get_contents($url);
//$photo = new imagick();
//$photo->readImageBlob($url);


$nom=$val["name"];
$prenom=$val["prenom"];
$anee=date("Y");
$equipe="INFORMATIQUE";
$camping=$val["camping"];
$duree=$val["duree"];

switch($duree)
{
	case 1:
		$bg="white";
		break;
	case 2:
		$bg="blue";
		break;
	case 3:
		$bg="yellow";
		break;
	default:
		$bg="white";
		break;
}


/* Création d'un object pour la photo du benevole */
$img= new Imagick($photo);

/* Création d'un nouvel objet pour le text */
$text1 = new ImagickDraw();
$text1->setFontSize(22);
$text1->annotation(100, 50, $nom);

$text2 = new ImagickDraw();
$text2->setFontSize(16);
$text2->annotation(100, 75, $prenom);

$text3 = new ImagickDraw();
$text3->setFontSize(16);
$text3->setfillcolor("red");
$text3->annotation(100, 100, $anee);


$text4 = new ImagickDraw();
$text4->setFontSize(30);
$text4->setgravity(imagick::GRAVITY_CENTER);
$text4->annotation(0,50,$equipe);

$square = new Imagick();
$square->newImage(20, 20, "red");

/* Création d'un nouvel objet pour le canvas */
$canvas = new Imagick();
$canvas->newImage(350, 150, $bg);

/* Dessine le ImagickDraw sur la nouvelle image */
$canvas->drawImage($text1);
$canvas->drawImage($text2);
$canvas->drawImage($text3);
$canvas->drawImage($text4);

$canvas->compositeImage( $img, imagick::COMPOSITE_DEFAULT, 0, 0 );

if ($camping == 1)
	$canvas->compositeImage($square,imagick::COMPOSITE_DEFAULT, 200, 80 );
	
/* Une bordure noire d'un pixel autour de l'image */
$canvas->borderImage('black', 1, 1);

/* Définition du format à PNG */
$canvas->setImageFormat('png');

/* Affiche l'image */
header("Content-Type: image/png");
echo $canvas;
?>
