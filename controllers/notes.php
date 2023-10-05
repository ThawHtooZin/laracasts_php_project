<?php

$config = require 'config.php';
$db = new Database($config['database']);

$Heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = 2')->get();

require 'view/notes.view.php';

?>
