<?php
namespace Engine\Core\database;

use \PDO;

class Connection
{
    private $link;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this -> connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = [
            'db_host'       => 'localhost',
            'db_name'       => 'cms',
            'db_charset'    => 'utf8',
            'db_username'   => 'root',
            'db_password'   => '',
        ];

        $dsn = 'mysql:host='. $config['db_host'] .';dbname='.$config['db_name'].';charset='.$config['db_charset'];

        $this->link = new PDO($dsn, $config['db_username'], $config['db_password']);

        return $this;
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        $sth = $this->link->prepare($sql);

        $sth->execuite();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result == false){
            return [];
        }

        return $result;
    }
}