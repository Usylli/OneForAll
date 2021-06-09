<?php
require_once('interface_entry.php');
abstract class EntryAbstract implements EntryInterface{
    protected $id;
    protected $date;
    protected $author;
    protected $title;
    protected $excerpt;   
    protected $content;
    protected $category;
    protected $dbh;
    protected $error;
    protected $views;

    abstract public function getLatestEntries();
    abstract public function getPopularEntries();
    abstract public function searchEntries($post_title);
    abstract public function getEntries();
    abstract public function getEntriesByCat($cat);
    abstract public function detailEntry($id);

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
?>