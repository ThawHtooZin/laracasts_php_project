<?php

$config = require 'config.php';
$db = new Database($config['database']);

$Heading = 'Note';
$currentUserId = 2;

$note = $db->query('select * from notes where id=:id', [
  ':id' => $_GET['id']
  ])->Find();

  authorize($note['user_id'] == $currentUserId  );
  require 'view/note.view.php';

  ?>
