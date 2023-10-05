<?php
function dd($value)
{
  echo "<pre>";
  var_dump($value);
  die();
}

function urlIs($value){
  return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBITTEN)
{
  if(!$condition){
    abort($status);
  }
}
?>
