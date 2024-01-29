<?php

class Employe
{
  public $name;
  public $age;
  public $salary;
  function __construct($name, $age, $salary)
  {
    $this->name = $name;
    $this->age = $age;
    $this->salary = $salary;
  }

  function emp()
  {
    echo '<h1>Employe Sheet</h1>';
    echo "Employe Name :"  . $this->name . "<br>";
    echo "Employe Age :"  . $this->age . "<br>";
    echo "Employe Salary :"  . $this->salary . "<br>";
  }
}

class Manager extends Employe
{
  public $ta = 100;
  public $phone = 200;

  function emp()
  {
    $total_salary = $this->salary + $this->ta + $this->phone;
    echo '<h1>Manager Sheet</h1>';
    echo "Employe Name :"  . $this->name . "<br>";
    echo "Employe Age :"  . $this->age . "<br>";
    echo "Employe Salary :"  . $total_salary . "<br>";
  }
}

$manger = new Manager('Rahim', 35, 1000);
$manger->emp();
$employe = new Employe('Kader', 30, 1000);
$employe->emp();
