<?php

$date = $_POST['date'];
$jour = date('l', strtotime($date));

switch ($jour) {
    case 'Monday':
        $jour_fr = 'Lundi';
        break;
    case 'Tuesday':
        $jour_fr = 'Mardi';
        break;
    case 'Wednesday':
        $jour_fr = 'Mercredi';
        break;
    case 'Thursday':
        $jour_fr = 'Jeudi';
        break;
    case 'Friday':
        $jour_fr = 'Vendredi';
        break;
    case 'Saturday':
        $jour_fr = 'Samedi';
        break;
    case 'Sunday':
        $jour_fr = 'Dimanche';
        break;
    default:
        $jour_fr = 'Erreur: Jour invalide';
        break;
}

echo $jour_fr;
?>