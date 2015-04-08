<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=10.5.18.66;dbname=12CS10023', '12CS10023', 'btech12', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM BS_BOOKS WHERE Title LIKE (:keyword) ORDER BY ISBN ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);	
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$Title = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['Title']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['Title']).'\')">'.$Title.'</li>';
}
?>
