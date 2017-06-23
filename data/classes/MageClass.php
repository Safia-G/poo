<?php
require_once('HumanClass.php');

class Mage extends Human
{
  private $staff = 5;

  public function magicMissile()
  {
    if ($this->pm > 0) {
      $enemy->receiveDamage(25);
      // Lance un sort
      $this->pm = $this->pm -1;
    } else {
      // Ne lance pas de sort
    }
  }

  public function protectiveShield()
  {
    if ($this->staff > 0) {
      // Il se protège avce un bouclier
      $this->staff = $this->staff -1;
    } else {
      // Il ne se protège pas
    }
  }
}
