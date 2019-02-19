<?php

class Collection implements Iterator, Countable
{
    protected $repo;
    public $collection;

    public function __construct(RepositoryInterface $repo, $id = null, $field = 'id')
    {
       $this->repo = $repo;
       if(!empty($id)) {
           $this->collection = $this->repo->find('posts', $id, $field);
       } else {
           $this->collection = $this->repo->all('posts');
       }
    }
    public function current()
    {
        return current($this->collection);
    }
    public function key()
    {
        return key($this->collection);
    }
    public function next()
    {
        return next($this->collection);
    }
    public function rewind()
    {
        return rewind($this->collection);
    }
    public function valid()
    {
        return key($this->collection) !== null;
    }
    public function count()
    {
        return count($this->collection);
    }
}