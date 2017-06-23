<?php
  require_once('Models/OrmClass.php');
  class View
  {
    private $title;
    private $content;
    private $style;
    private $directory = "Elements/";
    private $templateExtention = ".html";
    private $styleExtention = ".css";
    private $templateBase = "templates/template.php";
    private $orm;

  public function __construct()
  {
    $this->orm = Orm::getInstance();
  }

  public function loadHtml($fileName)
  {
    $html = "";
    $html .= "<div id='" . str_replace($this->templateExtention, "", $fileName) ."'>";
    $html .= file_get_contents($this->directory . $fileName);
    $html .= "</div>";
    return $html;
  }
  public function loadCss($fileName)
  {
    $css = "<link rel='stylesheet' href='" . $this->directory . $fileName ."'>";
    return $css;
  }
  public function renderPage($title) // On déclare méthode render page
  {
    //$this->orm->deleteData('users', 3);
    //var_dump($this->orm->getAllData('users'));die;
    $template = file_get_contents($this->directory . $this->templateBase);
    $html = ""; // On déclare $html = vide
    $css = ""; // On déclare $css = vide
    $directoryList = scandir($this->directory); // "scandir" est une fonctionPHP qui va lister les dossiers et les fichiers présents dans un dossier
    foreach ($directoryList as $key => $value) {
      if(strpos($value, $this->templateExtention) !== False) { // "strpos" vérifie si une chaîne de caractères est présente dans una autre chaîne de caractères
        $html .= $this->loadHtml($value); // On prend notre variable et on concatène notre loadHtml
      }
      if(strpos($value, $this->styleExtention) !== False) {
        $css .= $this->loadCss($value);
      }
    }
    $template = str_replace('%%TITLE%%', $title, $template);
    $template = str_replace('%%CONTENT%%', $html, $template);
    $template = str_replace('%%STYLE%%', $css, $template);
    $template = str_replace('%%MENU%%', file_get_contents($this->directory . "templates/menu.php"), $template);
    echo $template;
  }
}
