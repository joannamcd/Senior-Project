<?php
$con = mysqlconnect('localhost', 'joanna', 'J0annaSeniorProject!', 'joannaDB' );

// getting POST records
$title = $_POST['title'];
$username = $_POST['username'];
$veri = $_POST['veri'];
$date = $_POST['date'];
$texts = $_POST['texts'] . ".txt";
$atype = $_POST['atype'];

// insert into SQL
$sql = "INSERT INTO `joannaDB` (`article_title`, `author_username`, `author_verification`, `article_datepublished`, `article_text_path`, `article_type`) VALUES ('$title', '$username', '$veri', '$date', '$texts', '$atype')";

$rs = mysqlconnect($con, $sql);

if($rs){
    echo "Article Records Inserted";
}



?>