<?php

class GameScore {
    public function __construct(
        private int|float $point
    ) {}

    public function getScore() : int|float {
        // type error
        // return 'hogehoge';

        // ok
        return $this->point;
    }
}

// ok
$game1 = new GameScore(85);
$game2 = new GameScore(85.24);

// type error
// $game3 = new GameScore('abwaf');

echo $game1->getScore();