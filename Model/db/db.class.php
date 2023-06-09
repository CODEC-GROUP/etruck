<?php
class DB
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'etruck';


    public  $db;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database - $database;
        }
        try {
            $this->db = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->database,
                $this->username,
                $this->password,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        } catch (PDOException $e) {
            die('could not connect to DB');
        }
    }
    
    public function query($sql, $data = array(), $opt = null)
    {
        $req  = $this->db->prepare($sql);
        if ($opt == 'insert' ||  $opt == 'update' || $opt == 'delete') {
            // this return a value (true or false | 1 or 0)
            return  $req->execute($data);
        } else {
            $req->execute($data);
            // this returns an array containing an abject of the fetch
            return $req->fetchALL(PDO::FETCH_OBJ);
        }
    }
}
