<?php
//DB CONNECTION PDO
class dbh {

  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $charset;

  public function connect() {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "ecf_restaurant";
    $this->charset = "utf8mb4";

    try {
    //DSN
    $dsn = 'mysql:host=' .$this->servername.';dbname=' . $this->dbname.";charset=".$this->charset;
    //PDO CONN
    $pdo = new PDO($dsn, $this->username, $this->password);
    //PDO ERROR ATTRIBUTES
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    } catch (PDOException $e) {
      echo "Connection failed: " .$e->getMessage();
    }
  }
}