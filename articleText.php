<?php
    $filename = $_POST['title'] . ".txt";
    $myfile = fopen($filename, "w");
    $mytxt = $_POST['texts'];
    fwrite($myfile, $mytxt);
    fclose($myfile);
?>