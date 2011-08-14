<?php 

include 'system/verif_conx.php'; 

$id = (int)$_GET['id']; 
$result=mysql_query("SELECT * FROM photos WHERE id = '".$id."'");
$row = mysql_fetch_assoc($result); 
 
$image = base64_decode($row['image']); 
$image_type=$row['type'];
$size = $row['size'];

$ext = explode('/', $image_type); 
$name = $id . '.' . $ext[1];  
mysql_free_result($result);
header("Content-type: ".$image_type); 
header("Content-length: ".$size); 
header("Content-Disposition: attachment; filename=".$name); 

print $image;  

 exit; 
?>