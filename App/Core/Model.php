<?php

namespace App\Core;

use App\Core\Database\MySQLAdapter;
use App\Core\ORM;

abstract class Model extends ORM
{
    /**
     * Database instance
     *
     * @var mixed
     */
    public $database;

    /**
     * Name of the model's table
     *
     * @var string
     */
    protected $table = '';

    /**
     * Fields of the model
     *
     * @var array
     */
    protected $fields = [];

    public function __construct()
    {
        $this->database = MySQLAdapter::getInstance();
    }

}