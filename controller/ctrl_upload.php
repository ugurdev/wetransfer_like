<?php
$_FILES['fichier']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['fichier']['size'];     //La taille du fichier en octets.
$_FILES['fichier']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['fichier']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
$maxsize = $_POST["MAX_FILE_SIZE"];
$maxwidth = 1200;
$maxheight = 700;



if ($_FILES['fichier']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['fichier']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

$image_sizes = getimagesize($_FILES['fichier']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";


// Créer un identifiant difficile à deviner
$nom = md5(uniqid(rand(), true));
$nom = 'localhost/wetransfer_like/cloud/'.$nom;


$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'],'../cloud/' .basename($_FILES['fichier']['name']));
if ($resultat) echo "Transfert réussi";


?>