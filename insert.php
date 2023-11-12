<?php

$data = $_POST;

//FIELD VALIDATION 
$errors = [];
foreach (['title', 'username', 'veri','texts', 'atype'] as $field) {
    if (empty($data[$field])) {
        $errors[] = sprintf('The %s is a required field.', $field);
    }
}
if (!empty($errors)) {
    echo implode('<br />', $errors);
    exit;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["filename"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//check if image file is actual image
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["filename"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
    else{
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



//DATABASE CONNECT
$host = 'localhost';
$database = 'joannaDB';
$user = 'joanna';
$pass = 'J0annaSeniorProject!';
$dsn = sprintf("mysql:host=%s;dbname=%s;", $host, $database);

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}



//INSERT INTO ARTICLE
$statement = $pdo->prepare(
    'INSERT INTO articles (article_title, author_username, author_verification, article_text_path, article_type) VALUES (:title, :username, :veri, :texts, :atype)'
);
$statement->execute([
    'title' => $data['title'],
    'username' => $data['username'],
    'veri' => $data['veri'],
    'texts' => $data['title'] . '.html',
    'atype' => $data['atype']
]);


echo 'The article has been successfully saved.';

$fileName = $data['title'] . '.html';

$textFile = $_POST['texts'];
$myfile = fopen($textFile, "w");
fwrite($myfile, $textFile);
fclose($myfile);

$command = escapeshellcmd('python 3 /home/joannadir/repos/seniorproject/createPage.py');
$output = shell_exect($command);
echo $output;

$linkAddress = "." . $fileName;
echo "<a href'".$linkAddress."'>Link</a>";


?>