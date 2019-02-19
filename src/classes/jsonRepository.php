<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/19/2019
 * Time: 1:08 AM
 */

class jsonRepository implements RepositoryInterface
{
    protected $file;
    public function __construct($file)
    {
        $this->file = $file;
    }
    public function all($entity)
    {
        $data = json_decode(file_get_contents($this->file));
        return $data->$entity;
    }
    public function find($entity, $value, $field = 'id')
    {
        foreach($this->all($entity) as $key=>$data) {
            if($data->$field == $value) {
                return array($data);
            }
        }
    }
}