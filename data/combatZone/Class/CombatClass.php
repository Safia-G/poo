<?php
  require_once('RenderClass.php');

 class Combat
 {
   private $turn = 0;
   private $render;

   public function __construct() {
     $this->render = Render::getInstance();
   }
   public function initiative()
   {
     $rand1 = rand(1, 1000);
     $rand2 = rand(1, 1000);
     if ($rand1 > $rand2) {
       // Joueur 1 joue en premier
       return 1;
     } elseif ($rand2 > $rand1) {
       //Joueur 2 joue en premier
       return 2;
     } else {
       return False;
     }
   }
   //simule un tour de combat
   public function combatTurn($spaceMarine, $chaosMarine)
   {
    $chaosMarineName = $chaosMarine->getName();
    $spaceMarineName = $spaceMarine->getName();

     $initiative = $this->initiative();
     switch ($initiative) {
       //Le joueur 1 attaque
       case 1:
         $this->render->message($spaceMarineName . " attaque " . $chaosMarineName);
         $rand = rand(1, 2);
         if ($rand == 1) {
           $this->render->message($spaceMarineName . " utilise son Lance-flamme");
           $spaceMarine->attack($chaosMarine);
         } elseif ($rand == 2) {
           $this->render->message($spaceMarineName . " utilise son Bolter a energie");
           $spaceMarine->slash($chaosMarine);
         }
         break;

       //La joueur 2 attaque
       case 2:
         $this->render->message($chaosMarineName . " attaque " . $spaceMarineName);
         $rand = rand(1, 2);
         if ($rand == 1) {
           $this->render->message($chaosMarineName . " utilise son Bolter a energie");
           $chaosMarine->attack($spaceMarine);
         } elseif ($rand == 2) {
           $this->render->message($chaosMarineName . " utilise son Lance-flamme");
           $spaceMarine->slash($chaosMarine);
         }
         break;

       case False:
        break;

       default:
         throw new Exception("Error lors de l'initiative : " . $initiative);
         break;
     }
   }
   public function fullCombat($spaceMarine, $chaosMarine)
   {
     while (True) {
       $this->combatTurn($spaceMarine, $chaosMarine);
       if ($spaceMarine->state() == False && $chaosMarine->state() == True) {
         //Le marine du chaos a gagné
         $this->render->success('Le chaos a vaincu');
         return True;
       } elseif ($chaosMarine->state() == False && $spaceMarine->state() == True) {
         //Le space marine a gagné
         $this->render->success('La loi a vaincu');
         return True;
       } elseif ($chaosMarine->state() == False && $spaceMarine->state() == False) {
         $this->render->info('Match nul');
         return True;
       } elseif ($chaosMarine->state() == True && $spaceMarine->state() == True) {
         $this->turn = $this->turn + 1;
         //Les 2 sont vivant on continue
       }
     }
   }
 }
