<?php
class Orm
{
  private static $_instance = null;

  private $user = "root";
  private $password = "0000";
  private $db = "portfolio";

  private function __construct() {

  }
  public static function getInstance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new Orm();
    }
    return self::$_instance;
  }
  public function renderTitle($title, $template)
  {
    return str_replace('%%TITLE%%', $title, $template);
  }
}
