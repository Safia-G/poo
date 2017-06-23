<?php
require_once('./classes/FighterClass.php');
require_once('./classes/ThiefClass.php');
require_once('./classes/MageClass.php');

$richard = new Fighter('Richard', Fighter::MEDIUM_PV, Fighter::HIGH_PM, Fighter::LOW_POWER);
$jean = new Thief('Jean', Fighter::HIGH_PV, Fighter::LOW_PM, Fighter::MEDIUM_POWER);

echo($jean->getPv());
echo('<br>');

$richard->slash($jean);
echo($jean->getPv());
 ?>
