<?php
namespace Engine\Services\Database;

use Engine\Services\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $servicesName = 'db';

    /**
     * @return mixed
     */
    public function init()
    {
        $db = new Connection();

        $this -> di -> set($this -> servicesName, $db);
    }
}