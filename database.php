<?php

class Database
{
  public $connection;
  public $statement;

  public function __construct($config, $username = 'root', $password = '')
  {

    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $parms = [])
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($parms);

    return $this;
  }

  public function get()
  {
    return $this->statement->fetchAll();
  }

  public function find()
  {
    return $this->statement->fetch();
  }

  public function FindOrFail(){
    $result = $this->find();

    if(! $result){
      abort();
    }

    return $result;
  }
}


?>
