<?php

// PDO DB class - connects to DB and creates prepared statements
//Binds values, then returns results and rows

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // Database handler
    private $dbh;
    private $stmt; // Statement
    private $error;


    public function __construct() {

        //Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // CREATE PDO INSTANCE

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    
    // Prepare statements with query

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }


}