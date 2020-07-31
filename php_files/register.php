<?php

$fridge = $_POST["fridge_id"];
$password = $_POST["pass"];

try {
    // Fridgeの登録
    $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", 'keito', '0531');
    $stmt = $dbh->prepare("INSERT INTO fridges (fridge_id, password) VALUES (:fridge_id, :password)");
    $stmt->execute(array(':fridge_id' => $fridge, ':password' => password_hash($password, PASSWORD_DEFAULT)));

    // リダイレクト処理
    header('Location: ../html_files/login.html');
    exit;
} catch (Exception $e) {
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}