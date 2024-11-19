<?php
namespace MVC\controller;
use MVC\model\cocaCola;
use MVC\model\db;

class controller{
    private $cocacola;
    public function __construct($cocacola) {
        $this->cocacola = new cocaCola($db);
    }
}