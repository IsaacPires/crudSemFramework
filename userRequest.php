<?php

require_once 'models/User.php';

$data = filter_var_array($_POST);

if(!empty($data['action']) && $data['action'] == 'edit'){
  $user = (new User())->update($data['id'], $data);
}

if(!empty($data['action'] )  && $data['action'] == 'delete'){
  $user = (new User())->delete($data['id']);
  $user = (new User())->deleteRelation($data['id']);

}

if(!empty($data['action'] )  && $data['action'] == 'save'){
  $user = (new User())->insert($data['name'], $data['email']);
}



header('location: index.php');