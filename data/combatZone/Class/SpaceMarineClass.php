<?php
  require_once('HumanClass.php');

  class SpaceMarine extends Human
  {
    private $fuel = 10;
    private $ammo = 30;
    private $armor = 10;

    public function attack($enemy)
    {
      $ammoCount = 0;
      if ($this->ammo > 0) {
        if ($this->ammo < 10) {
          $ammoCount = rand(1, $this->ammo);
        } else {
          $ammoCount = rand(1, 10);
        }
        $enemy->receiveDamage($this->getPower() + $ammoCount);
        $this->ammo = $this->ammo - $ammoCount;
      } elseif ($this->ammo == 0) {
        $this->ammo = 30;
      } else {
        throw new Exception("Error, quantité de balle: " . $this->ammo);
      }
    }

    public function slash($enemy)
    {
      if ($this->fuel > 0) {
        $enemy->receiveDamage($this->getPower() + rand(0, 5));
        $this->fuel = $this->fuel -1;
      } elseif ($this->fuel == 0) {
        //On ne peux pas attaquer au corps a corps
      } else {
        throw new Exception("Error, quantité de fuel : " . $this->fuel);
      }
    }

    public function receiveDamage($damage)
    {
      if (($damage - $this->armor) <= 0) {
        //Aucun dégât n'est fait
      } else {
        $this->pv = $this->getPv() - ($damage - $this->armor);
      }
    }
  }
