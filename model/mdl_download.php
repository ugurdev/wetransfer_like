<?php

require_once 'connect.php';

global $bdd;

$sql = "SELECT link_id FROM file_upload WHERE id" ;

$response = $bdd->prepare( $sql );
$response->bindParam(':name', $name, PDO::PARAM_STR);
$response->bindParam(':url', $url, PDO::PARAM_STR);
$response->bindParam(':date', $date, PDO::PARAM_STR);
$response->bindParam(':fileSize', $fileSize, PDO::PARAM_STR);
$response->bindParam(':ext', $ext, PDO::PARAM_STR);
$response->execute();
?>