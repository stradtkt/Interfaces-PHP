<?php
require_once "src/config.php";
if(isset($_GET['id'])) {
    $content = new Posts(
        $repo,
        filter_input(
            INPUT_GET,
            'id',
            FILTER_SANITIZE_NUMBER_INT
        )
    );
}
if(isset($content) && $content->count() == 1 && $content->current()->status == "published") {
    $title = $content->current()->title;
} else {
    $content = new Posts($repo);
    $title = "My Website";
}

require 'views/header.php';

//var_dump($repo->all('posts'));
if($content->count() == 1) {
    include "views/single.php";
} else {
    foreach ($content as $item) {
        echo $item->title;
        require 'views/list.php';
    }
}
require 'views/footer.php';