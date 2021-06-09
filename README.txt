About project:
    “OneForAll” is a IT/Social news platform that allows users to write content themselves and read content submitted by other users. 

Build with:
    -Bootstrap
    -Jquery
    -tinymce
    -Font-awesome
This frameworks, libraries are connected by links and some of they(like tinymce) stored together with the project.

Folders:
Main pages of project are in folder with this README.txt  file. 
"Actions" folder contains some actions in php when request was sended.
"Admin_area" folder contains all pages and assets for admin panel.
"Classes" folder contains all classes, interfaces and abstract classes of project.
"CSS" folder contains css files of project.
"img" folder contains images from project.
"includes" folder contains php includes like header, footer, sidebar
"js" folder contains tinymce to use HTML editor in write_post.php

Pages:
Category.php - Page where all posts by category are shown
Index.php - Main page of web-site
Personal.php - Personal page of authorized user
Post.php - detailed page of one post
search.php - Page where shown results of search
write_post.php - Page where author can write article by using tinymce HTML editor


----->Admin Area
Folders:
"css" folder contains css files of project.
"font-awesome" contains icons from font-awesome library.
"includes" folder contains php includes like db, header, sidebar
"js" folder contains bootstrap.js, jquery.js libraries and tinymce to use HTML editor in insert/edit_post.php.


Pages:
insert_<template>.php - pages used to insert <template> in DB
edit_<template>.php - pages used to edit <template>
view_<temlplate>.php - pages used to show all <template> from DB
delete_<template>.php - pages used to delete <template> from DB
login.php - page used to login for admin
logout.php - page used to destroy current sessions

Setup:
1.Download XAMPP
2.Start Apache and MySQL server
3.Create DB 'blog'
4.Create tables:
SQL CODE:
---------------------------------------------------------------------------------------------------------------
--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `excerpt` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
----------------------------------------------------------------------------------------------------------
5. Open http://localhost/ and verify
6. Deploy project to hosting service