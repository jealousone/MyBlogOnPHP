<?php
require_once '../controllers/dbConnect.php';

class Post {
    protected $title;
    protected $image_url;
    protected $text;
    protected $tags;
    protected $datetime;
    protected $author;
    
    public function __construct($title, $image_url, $text, $tags) {
        $this->title = $title;
        $this->image_url = $image_url;
        $this->text = $text;
        $this->tags = $tags;
        $this->datetime = date("Y-m-d H:i:s");
        $this->author = $_SESSION['username'];
    }

    public function publish() {
        $GLOBALS['db']->prepare('INSERT INTO posts (title, image_url, text, tags, datetime, author) VALUES (?, ?, ?, ?, ?, ?)')->execute([$this->title, $this->image_url, $this->text, $this->tags, $this->datetime, $this->author]);
    }
}
?>