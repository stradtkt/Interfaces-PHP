<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/19/2019
 * Time: 3:04 AM
 */
echo '<div>';
if($content instanceof TrackableInterface) {
    include __DIR__ . "/track.php";
}
if($content instanceof ShareableInterface) {
    include __DIR__ . "/share.php";
}
echo '</div>';
echo '<article>';
echo $content->current()->details;
echo '</article>';
