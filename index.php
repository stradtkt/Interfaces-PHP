<?php
require_once "src/config.php";
$content = new Collection();
$title = "My Website";

require 'views/header.php';

var_dump($repo->all('posts'));

require 'views/footer.php';