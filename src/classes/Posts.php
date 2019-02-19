<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/19/2019
 * Time: 5:20 AM
 */

class Posts extends Collection implements TrackableInterface, ShareableInterface
{
    public function __construct(RepositoryInterface $repo, $id = null, $field = 'id')
    {
        $this->entity = 'posts';
        parent::__construct($repo, $id, $field);
    }
    public function getAuthor()
    {
        $user = $this->repo->find('users', $this->current()->author)[0];
        if(empty($user->name)) {
            return 'Unknown';
        }
        return $user->name;
    }
    public function getDateTime($format = 'D, d M Y H:i:s')
    {
        $date = new DateTime($this->current()->dateTime);
        return $date->format($format);
    }
    public function shareTwitter()
    {
        return urlencode($this->current()->title . ' ')
            . 'http://'
            . $_SERVER['HTTP_POST']
            . $_SERVER['REQUEST_URI'];

    }
    public function shareEmail()
    {
        return 'subject=' . urlencode($this->current()->title)
            . '&body=' . urlencode($this->shortDescription() . "\n\nRead more at ")
            . 'http://'
            . $_SERVER['HTTP_POST']
            . $_SERVER['REQUEST_URI'];
    }
    public function shareFacebook()
    {
        return 'http://' . $_SERVER['HTTP_POST'] . $_SERVER['REQUEST_URI'];
    }
}