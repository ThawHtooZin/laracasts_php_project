<?php

require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$Heading = 'Create Note';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $errors = [];

  if(!Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body of no more than 1,000 characters is required!';
  }

  if(empty($errors)){
    $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
        ':body' => $_POST['body'],
        ':user_id' => 2,
      ]);
  }
}

require 'view/note-create.view.php';

?>
