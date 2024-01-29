<?php

class Calculation
{
  public $a, $b, $c;
  function sum()
  {
    $this->c = $this->a + $this->b;
    return $this->c;
  }
  function sub()
  {
    $this->c = $this->a - $this->b;
    return $this->c;
  }
}

$object1 = new Calculation();
$object1->a = 10;
$object1->b = 20;
echo 'Sum of value ' . $object1->sub();

$obejct2 = new Calculation();
$obejct2->a = 10;
$obejct2->b = 240;
echo 'Sum of value ' . $obejct2->sum();
