<?php
require_once 'Savant3.php';

class Frisbeebutik_Frontend extends Savant3
{
    public function __construct()
    {
        $this->setEscape('htmlspecialchars');
        $this->addPath('template', dirname(__FILE__) . '/templates/Savant3/');
    }
}
?>