<?php
require_once('Character.php');

class Beast extends Character {
    public $name = 'Wild Beast';

    public $minHealth = 60;
    public $minStrenght = 60;
    public $minDefense = 40;
    public $minSpeed = 40;
    public $minLuck = 25;

    public $maxHealth = 90;
    public $maxStrenght = 90;
    public $maxDefense = 60;
    public $maxSpeed = 60;
    public $maxLuck = 40;


}