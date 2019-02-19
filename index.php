<?php
require_once "src/config.php";
$content = new Collection($repo);
$title = "My Website";

require 'views/header.php';

//var_dump($repo->all('posts'));
foreach ($content as $item) {
    echo $item->title;
}
require 'views/footer.php';