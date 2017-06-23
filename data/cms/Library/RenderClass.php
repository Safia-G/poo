<?php
  class Render
  {
    private static $_instance = null;

    private function __construct() {

    }
    public static function getInstance()
    {
      if (is_null(self::$_instance)) {
        self::$_instance = new Render();
      }
      return self::$_instance;
    }
    public function getAllData($table)
    {
      new PDO('mysql:host=localhost;dbname=' . $this->db .'', $this->$user, $this->$password);
      var_dump(getAllData);
    }
  }
