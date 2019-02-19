<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/19/2019
 * Time: 1:52 AM
 */

interface CollectionInterface extends Iterator, Countable
{
    public function shortDescription();
}