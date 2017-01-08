<?php
class Character {
    public $name;

    public $health;
    public $strenght;
    public $defense;
    public $speed;
    public $luck;

    public $minHealth;
    public $minStrenght;
    public $minDefense;
    public $minSpeed;
    public $minLuck;

    public $maxHealth;
    public $maxStrenght;
    public $maxDefense;
    public $maxSpeed;
    public $maxLuck;

    public $skills = array(
        'attack'  => array(),
        'defence' =>  array()
    );


    // initialize character stats from the range given
    public function init(){
        $this->health =  mt_rand($this->minHealth, $this->maxHealth);
        $this->strenght =  mt_rand($this->minStrenght, $this->maxStrenght);
        $this->defense =  mt_rand($this->minDefense, $this->maxDefense);
        $this->speed =  mt_rand($this->minSpeed, $this->maxSpeed);
        $this->luck =  mt_rand($this->minLuck, $this->maxLuck);
    }

    // test if character luck is activated based on chance
    public function isLucky(){
        $x = mt_rand(1,100);
        $result = false;
        if($x < $this->luck){
            $result = true;
        }

        return $result;
    }

    // get character skills
    // I separted the skills in two categoies: attack and defence to identify when they are activated: When the character attacks or when it defends
    public function getSkills($type){
        $skills = $this->skills[$type];
        $applyedSkills = array();
        if(!empty($skills)) {
            foreach ($skills as $skill) {
                if($this->applySkill($skill)) {
                    array_push($applyedSkills, $skill);
                }
            }
        }
        return $applyedSkills;
    }


    // check if skill is applyed based on chance
    public function applySkill($skill){
        $x = mt_rand(1,100);
        $result = false;
        if($x < $skill['chance']){
            $result = true;
        }

        return $result;
    }
}