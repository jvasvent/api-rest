<?php
namespace Config;
use Config\Database;

class Model
{
    protected $db;

    public function __construct(){
        try {

            $this->db = new Database(DATABASE['TYPE'], DATABASE['HOST'], DATABASE['NAME'], DATABASE['USER'], DATABASE['PASS'], DATABASE['CHAR']);

        } catch (PDOException $e) {
            echo "Error al conectarse a la base de datos: ".$e->getMessage();
        }
    }
}
?>