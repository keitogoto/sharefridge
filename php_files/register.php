<?php

$user = $_POST["fridge_id"];
$password = $_POST["pass"];

try{

// $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "$user", "$password");
$dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "keito", "0531");

// $stmt = $dbh->prepare("INSERT INTO users (fridge_id, password) VALUES (:fridge_id, :password)");
$stmt = $dbh->prepare("INSERT INTO fridges (fridge_id, password) VALUES (:fridge_id, :password)");

$stmt->execute(array(':fridge_id' => $_POST['fridge_id'],':password' => password_hash($_POST['pass'], PASSWORD_DEFAULT)));

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

//リダイレクト処理
header('Location: ../html_files/login.html');
exit;

?>