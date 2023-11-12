<?php
$html = <<< HTML
    <title>CreateATX
    </title>
    <head>
        <link rel="stylesheet" href="createatxstyles.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">CreateATX</div>
        <ul class="nav-links">

            <div class="menu">
            <li><a href="165.22.183.12">Home</a></li>
            <li class="services"><a href="LINK">Articles</a>
            <ul class="dropdown">
                <li><a href="/createArticle.html">Create an Article</a></li>
                <li><a href="LINK">Art Mediums</a></li>
                <li><a href="LINK">Art Styles</a></li>
                <li><a href="LINK">Art Techniques</a></li>
            </ul></li>
            <li><a href="LINK">Art in Austin</a></li>
        </div>
        </ul>
    </nav>

    <div id='oldtitle'></div>
    <div id='olduser'></div>
    <div id='oldDate'></div>
    <div id='oldText'></div>
    <br>
    <div id='oldCats'></div>

    </body>
HTML;

$title = $_POST['title'];
$username = $_POST['username'];
$veri = $_POST['veri'];
$date = $_POST['date'];
$texts = $_POST['texts'];
$atype = $_POST['atype'];

$fileName = $_POST['title'] . ".html";

$dom = new DOMDocument;
$dom->loadXml($html);

//title
$newNode = $dom->createElement('h1', $title);
$newNode->setAttribute('id', 'title');

$oldNode = $dom->getElementById('oldtitle');
$oldNode->parentNode->replaceChild($newNode, $oldNode);

//author
$newNode = $dom->createElement('h2', 'Created by: ' . $username);
$newNode->setAttribute('id', 'username');

$oldNode = $dom->getElementById('olduser');
$oldNode->parentNode->replaceChild($newNode, $oldNode);

//date
$newNode = $dom->createElement('h3', 'Published on:' . $date);
$newNode->setAttribute('id', 'username');

$oldNode = $dom->getElementById('oldDate');
$oldNode->parentNode->replaceChild($newNode, $oldNode);

//text
$newNode = $dom->createElement('p', $texts);
$newNode->setAttribute('id', 'texts');

$oldNode = $dom->getElementById('oldText');
$oldNode->parentNode->replaceChild($newNode, $oldNode);

//categories
$newNode = $dom->createElement('p', 'Article Type:' . $atype);
$newNode->setAttribute('id', 'cats');

$oldNode = $dom->getElementById('oldCats');
$oldNode->parentNode->replaceChild($newNode, $oldNode);

$newHTML = $dom->saveXml($dom->documentElement);
echo $newHTML;

$myfile = fopen($fileName, "w");
fwrite($myfile, $newHTML);
fclose($myfile);

?>