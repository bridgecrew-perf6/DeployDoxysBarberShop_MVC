<?php

namespace Model;

class Horas extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'horas';
    protected static $columnasDB = ['id', 'valueHora'];

    public $id;
    public $valueHora;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->valueHora = $args['valueHora'] ?? null;
    }
}