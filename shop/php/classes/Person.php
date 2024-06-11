<?php
class Person {

private $name;
private $lastname;
private $age;
private $hp;
private $mother;
private $father;

function __construct($name, $lastname, $age, $mother=null, $father=null) {
  $this->name = $name;
  $this->lastname = $lastname;
  $this->age = $age;
  $this->mother = $mother;
  $this->father = $father;
  $this->hp = 100;
}

function setHp($hp) {
  if ($this->hp + $hp > 100) $this->hp = 100;
  else $this->hp = $this->hp + $hp;
}
function getHp() {
  return $this->hp;
}
function getName() {
  return $this->name;
}
function getMother() {
  return $this->mother;
}
function getFather() {
  return $this->father;
}

function sayHi($name) {
  return "Hi, $name! I`m " . $this->name;
}
function getInfo() {
  return "<h3>Пару слов о моей семье:</h3><br>" . "Меня зовут " . $this->getName() . "<br> ";
}
}

$igor = new Person("Igor", "Petrov", 68);

$alexey = new Person("Alexey", "Ivanov", 42);
$olga = new Person("Olga", "Ivanova", 42, null, $igor);
$valera = new Person("Valeriy", "Ivanov", 12);


$valera->getInfo();

//Здоровье не может быть более 100 единиц

// $medKit = 50; //Аптечка
// $alex->setHp(-30); //Упал
// echo $alex->getHp() . "<br>";
// $alex->setHp($medKit); //Нашел аптечку
// echo $alex->getHp();

//echo $alex->sayHi($igor->name);
// $alex->name = "Alex";
// echo $alex->name;
// echo $igor->name;
