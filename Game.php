<?php
require_once('Beast.php');
require_once('Orderus.php');

class Game {
    public $player1;
    public $player2;


    // initalize characters
    public function init(){
        $this->player1 = new Orderus();
        $this->player2 = new Beast();

        $this->player1->init();
        $this->player2->init();
    }

    // main game function
    public function start(){
        $firstPlayer = $this->player1;
        $secondPlayer = $this->player2;

        // player 1 starts by default, if player 2 speed is higher player 2 starts
        // if both speeds are equal determine who starts based on luck
        if($this->player2->speed > $this->player1->speed){
            $firstPlayer = $this->player2;
            $secondPlayer = $this->player1;
        } elseif($this->player1->speed == $this->player2->speed){
            if($this->player2->luck > $this->player1->luck){
                $firstPlayer = $this->player2;
                $secondPlayer = $this->player1;
            }
        }

        $turn = 1;
        while($firstPlayer->health > 0 && $secondPlayer->health > 0 && $turn <= 20) {
            // player 1 attacks, player 2 defends
            $this->turn($firstPlayer, $secondPlayer, $turn);
            $turn ++;
            if($firstPlayer->health > 0 && $secondPlayer->health > 0 && $turn <= 20){
                // player 2 attacks, player 1 defends
                $this->turn($secondPlayer, $firstPlayer, $turn);
                $turn ++;
            }
        }

        // determine winner: player 1 is the winner by default (because he is the main character, unless his health is bellow 0)
        $winner = $firstPlayer;

        if($firstPlayer->health <=0 ){
            $winner = $secondPlayer;
        }

        return $winner;
    }

    // one turn function: one character attacks and the other one defends
    public function turn(Character $attacker, Character $defender, $turn){
        echo '<div class="col-xs-12">';
        echo '<div class="turn"> Turn: ' . $turn . '</div>';
        echo '</div>';

        echo '<div>';
        echo $attacker->name . ' attacks ' . $defender->name;
        echo '</div>';

        // get attacker activated skills
        $attackSkills = $attacker->getSkills('attack');

        $this->attack($attacker, $defender);

        // check if attacker has activated skills if rapid strike is found, attack again
        foreach($attackSkills as $skill){
            if($skill['code'] == 'RapidStrike'){
                echo '<div>';
                echo $attacker->name . ' used skill:  ' . $skill['name'];
                echo '</div>';
                echo '<div>';
                echo $attacker->name . ' attacks ' . $defender->name;
                echo '</div>';
                $this->attack($attacker, $defender);
            }
        }
    }

    // function to calculate damage and remaining health
    public function attack(Character $attacker, Character $defender){

        // get defender skills
        $defendSkills = $defender->getSkills('defence');

        // get atacker skills - currently they are not used here, but for future we can add another skill that increases attacker traits (ex: double damage, double strength)
        $attackSkills = $attacker->getSkills('attack');

        $attack = $attacker->strenght;
        $defence = $defender->defense;
        $luck = false;

        if($defender->isLucky()){
            $luck = true;
        }

        // check if defender is lucky and does not take damage
        if($luck){
            echo '<div>';
            echo $defender->name . ' is lucky: no damage taken';
            echo '</div>';
            echo '<div>';
            echo $defender->name . ' health is:  ' .  $defender -> health;
            echo '</div>';
        } else {

            // calculate damage
            $damage = $attack - $defence;
            foreach($defendSkills as $skill){
                if($skill['code'] == 'MagicShield'){
                    echo '<div>';
                    echo $defender->name . ' used skill:  ' . $skill['name'];
                    echo '</div>';
                    $damage = $damage / 2;
                }
            }
            echo '<div>';
            echo $defender->name . ' took damage:  ' . $damage;
            echo '</div>';

            // apply damage
            $defender -> health = $defender -> health - $damage;
            echo '<div>';
            echo $defender->name . ' health is:  ' .  (($defender -> health > 0)?$defender -> health:0);
            echo '</div>';
        }
    }
}