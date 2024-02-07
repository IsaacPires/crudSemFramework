<?php

require_once 'connection.php';

class UserColor
{
  private $connection;

  public function __construct(){
    $this->connection = new Connection();
  }

  public function getAll():object{
    return $this->connection->query("SELECT * FROM User_Colors");
  }

  public function getOne($user_id){
    return $this->connection->query("SELECT * FROM User_Colors as uc 
    inner join colors as c on  c.id = uc.color_id 
    where user_id = {$user_id}");
  }

  public function insert($user_id, $color_id){
    return $this->connection->query("
    INSERT INTO user_colors (user_id, color_id) VALUES ('{$user_id}', '{$color_id}')
    ");
  }

  public function delete($userId){
    return $this->connection
    ->query("
    DELETE FROM user_colors WHERE id= {$userId};
    ");
  }
  
}