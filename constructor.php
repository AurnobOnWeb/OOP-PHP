<?php

class Constructor
{
  public $a, $b;
  function __construct($num1, $num2)
  {
    $this->a = $num1;
    $this->b = $num2;
  }
  function add()
  {
    return $this->a + $this->b;
  }
}

$obejct1 = new Constructor(12, 123);
$obejct1->add();
