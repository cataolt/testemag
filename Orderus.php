<?php
require_once('Character.php');

class Orderus extends Character {
    public $name = 'Orderus';

    public $minHealth = 70;
    public $minStrenght = 70;
    public $minDefense = 45;
    public $minSpeed = 40;
    public $minLuck = 10;

    public $maxHealth = 100;
    public $maxStrenght = 80;
    public $maxDefense = 55;
    public $maxSpeed = 50;
    public $maxLuck = 30;

    public $skills = array(
        'attack'  => array(
            array(
                'code' => 'RapidStrike',
                'name' => 'Rapid Strike',
                'chance' => 10
            )),
        'defence' =>  array(
            array(
                'code' => 'MagicShield',
                'name' => 'Magic Shield',
                'chance' => 20
            ))
    );

}