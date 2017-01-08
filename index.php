<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <link href="public/plugins/bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/styles/style.css" rel="stylesheet" />
    <script src="public/scripts/jquery-2.2.4.min.js"></script>
</head>

<?php
            require_once('Game.php');
            $game = new Game();
            $game->init();
            $player1 = $game->player1;
            $player2 = $game->player2;
?>

<body class="blue-background">
    <div class="site-content">
        <div class="container">
            <div class="row">
                <h1>
                    Emagia
                </h1>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class = 'character-image'>
                                <img src="public/images/orderus.png" width="300" />
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="name">
                                <?php echo $player1->name; ?>
                            </div>
                            <div class="stats">
                                Health: <?php echo $player1->health; ?>
                            </div>
                            <div class="stats">
                                Strength: <?php echo $player1->strenght; ?>
                            </div>
                            <div class="stats">
                                Defense: <?php echo $player1->defense; ?>
                            </div>
                            <div class="stats">
                                Speed: <?php echo $player1->speed; ?>
                            </div>
                            <div class="stats">
                                Luck: <?php echo $player1->luck; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class = 'character-image'>
                                <img src="public/images/beast.png"  width="300"/>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="name">
                                <?php echo $player2->name; ?>
                            </div>
                            <div class="stats">
                                Health: <?php echo $player2->health; ?>
                            </div>
                            <div class="stats">
                                Strength: <?php echo $player2->strenght; ?>
                            </div>
                            <div class="stats">
                                Defense: <?php echo $player2->defense; ?>
                            </div>
                            <div class="stats">
                                Speed: <?php echo $player2->speed; ?>
                            </div>
                            <div class="stats">
                                Luck: <?php echo $player2->luck; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                        $winner = $game->start();
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="winner">
                        Winner is <?php echo $winner->name; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="winner-image">
                        <?php if($winner == $player1) : ?>
                            <img src="public/images/winner.png" />
                        <?php else : ?>
                            <img src="public/images/looser.png" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

