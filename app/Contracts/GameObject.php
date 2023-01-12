<?php
namespace App\Contracts;
include('Movement.php');
use App\Constants\Movement;

abstract class GameObject
{
    private $_x;
    private $_y;


    public function __construct(int $x, int $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    /**
     * Retorna a posição 'X' no tabuleiro
     *
     * @return int
     */
    public function x()
    {
        return $this->_x;
    }

    /**
     * Retorna a posição 'Y' no tabuleiro
     * @return int
     */
    public function y()
    {
        return $this->_y;
    }

    /**
     * Detecta se o objeto está na mesma casa que o objeto passado
     *
     * @param GameObject $object Objeto para detectar a colisão
     * @return bool
     */
    public function isCollidingWith(GameObject $object)
    {
        return $this->_x === $object->_x && $this->_y === $object->_y;

    }

    /**
     * Move o objeto na direção especificada
     *
     * @param string $direction 'ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight'
     * @return void
     */
    public function move($direction)
    {

       
        switch ($direction) {
            case  Movement::ARROWUP:
                if($this->_y === 0){
                    $this->_y = 33;
                }
                $this->_y--;
                break;
            case Movement::ARROWDOWN:
                if($this->_y === 32){
                    $this->_y = -1;
                }
                $this->_y++;
                break;

            case Movement::ARROWLEFT:
                if($this->_x === 0){
                    $this->_x = 33;
                }
                $this->_x--;
                break;

            case Movement::ARROWRIGHT:
                if($this->_x === 32){
                    $this->_x = -1;
                }
                $this->_x++;
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Move o objeto para a posição especificada
     *
     * @param int $x
     * @param int $y
     * @return void
     */
    public function moveTo($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    /**
     * Imprime um CSS para adicionar estilo à casa do tabuleiro em que o objeto está.
     *
     * @return void
     */
    abstract function render();
}
