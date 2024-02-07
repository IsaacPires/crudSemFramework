<?php
require_once 'connection.php';


class User
{
  private $connection;

  public function __construct(){
    $this->connection = new Connection();
  }

  public function getAll():object{
    return $this->connection->query("SELECT * FROM users");
  }

  public function update(int $userId, array $data){
    return $this->connection
    ->query("
    UPDATE users
    SET Name = '{$data['name']}', Email = '{$data['email']}'
    WHERE id = {$userId}
    ");
  }
  
  public function delete(int $userId){
    return $this->connection
    ->query("
    DELETE FROM users WHERE id= {$userId};
    ");
  }

  public function deleteRelation(int $userId){
    return $this->connection
    ->query("
    DELETE FROM user_colors WHERE user_id= {$userId};
    ");
  }

  public function insert(string $name, string $email){
    return $this->connection
    ->query("
    INSERT INTO Users (name, email) VALUES ('{$name}', '{$email}')
    ");
  }
}
