<?php
include 'database.php';
$obj = new Database();

$obj->insert('student', ['name' => 'Rahim', 'age' => '20', 'country' => 'Bd']);

echo "insert result is ";
print_r($obj->getResult());
