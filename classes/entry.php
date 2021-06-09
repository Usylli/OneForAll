<?php 
require_once('abstract_entry.php');
class Entry extends EntryAbstract{
    public function __construct() {
        $this->dbh = mysqli_connect('localhost', 'root', '','blog');
    }
    
    public function getLatestEntries(){
        $get_entries = "select * from posts ORDER BY date DESC";
        
        $run_entries = mysqli_query($this->dbh, $get_entries);
        $counter = 0;
        
        while($row_entries=mysqli_fetch_array($run_entries)){
            $this->id = $row_entries['post_id'];
            $this->title = $row_entries['title'];
            $this->author = $row_entries['author_id'];
            $this->date = $row_entries['date'];
            $this->picture = $row_entries['picture'];
            $this->content = $row_entries['content'];
            $this->category = $row_entries['category_id'];
            $this->excerpt = $row_entries['excerpt'];
            
            echo "
            <div class='col-lg-4'>
            <div class='blog-grid'>
            <div class='blog-img'>
                <div class='date'>
                    <span>$this->date</span>
                </div>
                <a href='post.php?inc=$this->id'>
                    <img src='$this->picture' title=''alt=''>
                </a>
            </div>
            <div class='blog-info'>
                <h5><a href='post.php?inc=$this->id'>$this->title</a></h5>
                <p>$this->excerpt</p>
                <div class='btn-bar'>
                    <a href='post.php?inc=$this->id' class='px-btn-arrow'>
                        <span>Read More</span>
                        <i class='arrow'></i>
                    </a>
                </div>
            </div>
            </div>
            </div>
            ";
            $counter++;
            if($counter == 3){
                break;
            }
        }
    }

    public function getPopularEntries(){
        $get_entries = "select * from posts ORDER BY views DESC";
        
        $run_entries = mysqli_query($this->dbh, $get_entries);
        $counter = 0;
        
        while($row_entries=mysqli_fetch_array($run_entries)){
            $this->id = $row_entries['post_id'];
            $this->title = $row_entries['title'];
            $this->author = $row_entries['author_id'];
            $run_author = mysqli_query($this->dbh, "select * from authors where author_id = $this->author");
            $row_entry = mysqli_fetch_array($run_author);
            $author_name = $row_entry['author_name'];
            $this->date = $row_entries['date'];
            $this->picture = $row_entries['picture'];
            $this->content = $row_entries['content'];
            $this->category = $row_entries['category_id'];
            $this->excerpt = $row_entries['excerpt'];
            
            echo "
            <div class='latest-post-aside media'>
                <div class='lpa-left media-body'>
                    <div class='lpa-title'>
                        <h5><a href='post.php?inc=$this->id'>$this->title</a></h5>
                    </div>
                    <div class='lpa-meta'>
                        <a class='name' href='post.php?inc=$this->id'>
                            $author_name
                        </a>
                        <a class='date' href='post.php?inc=$this->id'>
                            $this->date
                        </a>
                    </div>
                </div>
                <div class='lpa-right'>
                    <a href='post.php?inc=$this->id'>
                        <img src='$this->picture' title='' alt=''>
                    </a>
                </div>
            </div>
            ";
            $counter++;
            if($counter == 3){
                break;
            }
        }
    }

    public function searchEntries($post_title){
        $get_entries = "select * from posts where title LIKE '%$post_title%'";
        $run_entries = mysqli_query($this->dbh, $get_entries);
        while($row_entries=mysqli_fetch_array($run_entries)){
            $this->id = $row_entries['post_id'];
            $this->title = $row_entries['title'];
            $this->author = $row_entries['author_id'];
            $this->date = $row_entries['date'];
            $this->picture = $row_entries['picture'];
            $this->content = $row_entries['content'];
            $this->category = $row_entries['category_id'];
            $this->excerpt = $row_entries['excerpt'];
            
            echo "
            <div class='col-sm-6'>
            <div class='blog-grid'>
            <div class='blog-img'>
                <div class='date'>
                    <span>$this->date</span>
                </div>
                <a href='post.php?inc=$this->id'>
                    <img src='$this->picture' title=''alt=''>
                </a>
            </div>
            <div class='blog-info'>
                <h5><a href='post.php?inc=$this->id'>$this->title</a></h5>
                <p>$this->excerpt</p>
                <div class='btn-bar'>
                    <a href='post.php?inc=$this->id' class='px-btn-arrow'>
                        <span>Read More</span>
                        <i class='arrow'></i>
                    </a>
                </div>
            </div>
            </div>
            </div>
            ";
        }
    }

    public function getEntries(){
        $get_entries = "select * from posts";
        
        $run_entries = mysqli_query($this->dbh, $get_entries);
        $counter = 1;
        
        while($row_entries=mysqli_fetch_array($run_entries)){
            $this->id = $row_entries['post_id'];
            $this->title = $row_entries['title'];
            $this->author = $row_entries['author_id'];
            $this->date = $row_entries['date'];
            $this->picture = $row_entries['picture'];
            $this->content = $row_entries['content'];
            $this->category = $row_entries['category_id'];
            $this->excerpt = $row_entries['excerpt'];
            
            echo "
            <div class='col-sm-6'>
            <div class='blog-grid'>
            <div class='blog-img'>
                <div class='date'>
                    <span>$this->date</span>
                </div>
                <a href='post.php?inc=$this->id'>
                    <img src='$this->picture' title=''alt=''>
                </a>
            </div>
            <div class='blog-info'>
                <h5><a href='post.php?inc=$this->id'>$this->title</a></h5>
                <p>$this->excerpt</p>
                <div class='btn-bar'>
                    <a href='post.php?inc=$this->id' class='px-btn-arrow'>
                        <span>Read More</span>
                        <i class='arrow'></i>
                    </a>
                </div>
            </div>
            </div>
            </div>
            ";
            $counter++;
        }
    }

    public function getEntriesByCat($cat){
        $get_entries = "select * from posts where category_id = $cat";
        $run_entries = mysqli_query($this->dbh, $get_entries);
        while($row_entries=mysqli_fetch_array($run_entries)){
            $this->id = $row_entries['post_id'];
            $this->title = $row_entries['title'];
            $this->author = $row_entries['author_id'];
            $this->date = $row_entries['date'];
            $this->picture = $row_entries['picture'];
            $this->content = $row_entries['content'];
            $this->category = $row_entries['category_id'];
            $this->excerpt = $row_entries['excerpt'];
            
            echo "
            <div class='col-sm-6'>
            <div class='blog-grid'>
            <div class='blog-img'>
                <div class='date'>
                    <span>$this->date</span>
                </div>
                <a href='post.php?inc=$this->id'>
                    <img src='$this->picture' title=''alt=''>
                </a>
            </div>
            <div class='blog-info'>
                <h5><a href='post.php?inc=$this->id'>$this->title</a></h5>
                <p>$this->excerpt</p>
                <div class='btn-bar'>
                    <a href='post.php?inc=$this->id' class='px-btn-arrow'>
                        <span>Read More</span>
                        <i class='arrow'></i>
                    </a>
                </div>
            </div>
            </div>
            </div>
            ";
        }
    }

    public function detailEntry($id){
        $get_entry = "select * from posts where post_id = $id";
        
        $run_entry = mysqli_query($this->dbh, $get_entry);
        $counter = 1;
        $row_entry = mysqli_fetch_array($run_entry);
        
        $this->id = $row_entry['post_id'];
        $this->title = $row_entry['title'];
        $this->author = $row_entry['author_id'];
        $this->date = $row_entry['date'];
        $this->picture = $row_entry['picture'];
        $this->content = $row_entry['content'];
        $this->category = $row_entry['category_id'];
        $this->excerpt = $row_entry['excerpt'];
        $this->views = $row_entry['views'];

        $run_author = mysqli_query($this->dbh, "select * from authors where author_id = $this->author");
        $row_entry = mysqli_fetch_array($run_author);
        $author_name = $row_entry['author_name'];
        $run_cat = mysqli_query($this->dbh, "select * from categories where category_id = $this->category");
        $row_entry = mysqli_fetch_array($run_cat);
        $cat_name = $row_entry['category_name'];
        echo "
        <div class='article-img'>
            <img src='$this->picture' title='' alt=''>
        </div>
        <div class='article-title'>
            <h6><a href='#'>$cat_name</a></h6>
            <h2>$this->title</h2>
            <div class='media'>
                <div class='media-body'>
                    <label>$author_name</label>
                    <span>$this->date</span>
                    <span><i class='far fa-eye'></i> $this->views</span>
                </div>
            </div>
        </div>
        <div class='article-content'>
            <p>$this->content</p>
        </div>
        ";
    }

   
}
/**INSERT INTO `posts`(`title`, `author_id`, `excerpt`, `content`, `date`, `category_id`, `picture`) VALUES ('Prevent 75% of visitors from google analytics',1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.','hui','2020-10-10',1,'https://via.placeholder.com/400x200/FFB6C1/000000'); */
?>