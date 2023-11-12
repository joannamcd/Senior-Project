<?php
    //header('Refresh: 2; URL=http://165.22.183.12/' . $_POST['title'] . ".html");
    echo "You have submitted the form";
    
    $con = mysqlconnect('localhost', 'joanna', 'J0annaSeniorProject!', 'joannaDB' );

    // getting POST records
    $title = $_POST['title'];
    $username = $_POST['username'];
    $veri = $_POST['veri'];
    $date = $_POST['date'];
    $texts = $_POST['title'] . ".txt";
    $atype = $_POST['atype'];

    // insert into SQL
    $sql = "INSERT INTO `joannaDB` (`article_title`, `author_username`, `author_verification`, `article_datepublished`, `article_text_path`, `article_type`) VALUES ('$title', '$username', '$veri', '$date', '$texts', '$atype')";

    $rs = mysqlconnect($con, $sql);

    if($rs){
        echo "Article Records Inserted";
    }
    //include('articleText.php');
    //include('articleDB.php');
    //include('template.php');
    //$fileName = $_POST['title'] . ".html";
    //$redirect = 'http://165.22.183.12/' . $fileName;
    
?>
