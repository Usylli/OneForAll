<?php
interface EntryInterface {
    public function getLatestEntries();
    public function getPopularEntries();
    public function searchEntries($post_title);
    public function getEntries();
    public function getEntriesByCat($cat);
    public function detailEntry($id);
    public function getId();
    public function setId($id);
    public function getDate();
    public function setDate($date);
    public function getAuthor();
    public function setAuthor($author);
    public function getTitle();
    public function setTitle($title);
    public function getExcerpt();
    public function setExcerpt($excerpt);
    public function getContent();
    public function setContent($content);
}
?>