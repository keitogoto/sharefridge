<?php

// ログインの確認
session_start();
if (!isset($_SESSION["fridge_id"])) {
    // リダイレクト処理
    header('Location: ../html_files/login.html');
}

$fridge_id = $_SESSION["fridge_id"];

// POSTを受け取れているか確認
if (isset($_POST["name"]) && isset($_POST["count"]) && isset($_POST["shomikigen"]) && isset($_POST["shohikigen"])) {

    $name = $_POST["name"];
    $count = $_POST["count"];
    $shomikigen = str_replace('/', '-', $_POST["shomikigen"]);
    $shohikigen = str_replace('/', '-', $_POST["shohikigen"]);

    try {
        // 食材の登録
        $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", 'keito', '0531');
        $stmt = $dbh->prepare("INSERT INTO contents VALUES(0, :fridge_id, :name, :count, :shomikigen, :shohikigen)");
        $stmt->execute(array(':fridge_id' => $fridge_id, ':name' => $name, ':count' => $count, ':shomikigen' => $shomikigen, ':shohikigen' => $shohikigen));

        // リダイレクト処理
        header('Location: ./fridge.php');
        exit;
    } catch (Exception $e) {
        echo $e;
    }
}
