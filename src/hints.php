<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=10.5.18.66;dbname=12CS10023', '12CS10023', 'btech12', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$type = $_POST['type'];
if(strcmp($type,"Title")==0) {
	$sql = "SELECT * FROM BS_BOOKS WHERE Title LIKE (:keyword) ORDER BY ISBN ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);	
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
	// put in bold the written text
		$Title = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['Title']);
	// add new option
		echo '<a href = "book.php?q='.$rs['ISBN'] .'"> <li>'.$Title.'</li></a>';
	}
}
else if(strcmp($type,"Author")==0) {
	$sql = "SELECT distinct(NAME) FROM BS_AUTHOR WHERE NAME LIKE (:keyword) ORDER BY ISBN ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
	// put in bold the written text
		$Title = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['NAME']);
	// add new option
		echo '<a href = "query.php?q='.$rs['NAME'] .'&qtype='.$type.'"> <li>'.$Title.'</li></a>';
	}
}
else if(strcmp($type,"Publisher")==0) {
	$sql = "SELECT distinct(NAME) FROM BS_PUBLISH WHERE NAME LIKE (:keyword) ORDER BY ISBN ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
	// put in bold the written text
		$Title = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['NAME']);
	// add new option
		echo '<a href = "query.php?q='.$rs['NAME'] .'&qtype='.$type.'"> <li>'.$Title.'</li></a>';
	}
}
else if(strcmp($type,"Category")==0) {
	$sql = "SELECT distinct(GENRE) FROM BS_M_GENRE WHERE GENRE LIKE (:keyword) ORDER BY ISBN ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
	// put in bold the written text
		$Title = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['GENRE']);
	// add new option
		echo '<a href = "query.php?q='.$rs['GENRE'] .'&qtype='.$type.'"> <li>'.$Title.'</li></a>';
	}
}
else {
	echo "nothing found.";
}
?>
