<?php
  require_once('Class/SpaceMarineClass.php');
  require_once('Class/ChaosMarineClass.php');
  require_once('Class/CombatClass.php');
  require_once('Class/RenderClass.php');


  $vulkor = new SpaceMarine('Safia', Human::MEDIUM_PV, Human::LOW_POWER);
  $tulkor = new ChaosMarine('Voldemort', Human::HIGH_PV, Human::HIGH_POWER);
  $combat = new Combat();
  $combat->fullCombat($vulkor, $tulkor);
