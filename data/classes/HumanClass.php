<?php

abstract class Human
{
  const LOW_PV = 100;
  const MEDIUM_PV = 150;
  const HIGH_PV = 200;

  const LOW_PM = 0;
  const MEDIUM_PM = 10;
  const HIGH_PM = 30;

  const LOW_POWER = 2;
  const MEDIUM_POWER = 5;
  const HIGH_POWER = 10;

  private $pv;
  private $pm;
  private $name;
  private $power;


  public function __construct($name, $pv, $pm, $power)
  {
    $this->setPm($pm);
    $this->setPv($pv);
    $this->setPower($power);
    $this->setName($name);
  }
  private function setName($name)
  {
    $this->name = $name;
  }
  public function setPv($pv)
  {
    if ($pv === Self::LOW_PV || $pv === Self::MEDIUM_PV || $pv === Self::HIGH_PV) {
     $this->pv = $pv;
   } else {
     var_dump("erreur");die;
   }
    $this->pv = $pv;
  }
  public function getPv()
  {
    return $this->pv;
  }

  public function setPm($pm)
  {
    if ($pm === Self::LOW_PM || $pm === Self::MEDIUM_PM || $pm === Self::HIGH_PM) {
     $this->pm = $pm;
   } else {
     var_dump("erreur");die;
   }
  {
    $this->pm = $pm;
  }
  }
  public function getPm()
  {
    return $this->pm;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPower($power)
  {
    if ($power === Self::LOW_POWER || $power === Self::MEDIUM_POWER || $power === Self::HIGH_POWER) {
     $this->power = $power;
   } else {
     var_dump("erreur");die;
   }
  {
    $this->power = $power;
  }
  }
  public function getPower()
  {
    return $this->power;
  }

  public function dealDamage($enemy)
  {
    $enemy->receiveDamage($this->getPower() * 5);
  }

  public function receiveDamage($damage)
  {
    $this->pv = $this->getPv() - $damage;
  }
  }
 ?>
