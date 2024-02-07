<?php

require_once 'models/UserColor.php';

$data = filter_var_array($_POST);

if(!empty($data['action']) && $data['action'] == 'save'){
  $return = (new UserColor())->insert($data['userId'], $data['colorId']);

  header("location: colors.php?id={$data['userId']}&name={$data['userName']} ");
}
if(!empty($data['action']) && $data['action'] == 'delete'){
  $return = (new UserColor())->delete((int)$data['id']);

  header("location: colors.php?id={$data['userId']}&name={$data['name']} ");
}
