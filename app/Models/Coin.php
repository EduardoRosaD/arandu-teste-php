<?php

namespace App\Models;

use App\Contracts\GameObject;
use App\Constants\Map;
use App\Constants\Movement;

class Coin extends GameObject
{
    public function createRandomPosition()
    {
        return [
            'x' => rand(0, Map::WIDTH - 1),
            'y' => rand(0, Map::HEIGHT - 1)
        ];
    }
    public function __construct()
    {

        [
            'x' => $x,
            'y' => $y
        ] = $this->createRandomPosition();

        while ($this->isCollidingWith(request()->route()->controller->player)) {
            [
                'x' => $x,
                'y' => $y
            ] = $this->createRandomPosition();
        }

        parent::__construct($x, $y);
        }

    public function render()
    {
        $css = "
      .tile-{$this->x()}-{$this->y()}{
        background-color: yellow;
      }
      ";

        echo $css;
    }

    public function moveRandomDirection()
    {
        $directions = collect([ Movement::ARROWUP, Movement::ARROWDOWN, Movement::ARROWLEFT, Movement::ARROWRIGHT]);

        for ( $i = 0; $i < 50; $i++){
            $direction = $directions->random();
            $this->move($direction);
        }

    }
}
