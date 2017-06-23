<?php
require_once('../Library/RenderClass.php');
class Index
{
  private $title;
  private $content;
  private $render;

  public function __construct($title)
  {
    $this->render = Render::getInstance();
    $this->title = $title;
  }
  public function display()
  {
    $template = file_get_contents('../Views/template.php');
    $temp = $this->render->renderTitle($this->title, $template);
    echo $temp;
  }
}
