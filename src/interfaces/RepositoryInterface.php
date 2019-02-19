<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/19/2019
 * Time: 1:02 AM
 */
interface RepositoryInterface
{
    public function all($entity);
    public function find($entity, $id, $field = 'id');
}