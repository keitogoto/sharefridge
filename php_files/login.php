<?php
session_start();

$fridge = $_POST["fridge_id"];
$password = $_POST["pass"];

try {
    // ハッシュ化パスワードの抽出
    $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", 'keito', '0531');
    $stmt = $dbh->prepare('SELECT * FROM fridges WHERE fridge_id = :fridge_id');
    $stmt->execute(array(':fridge_id' => $fridge));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // ログイン認証
    if (password_verify($password, $result['password'])) {

        // fridge_idをセッションに格納
        $_SESSION["fridge_id"] = $fridge;

        // リダイレクト処理
        header('Location: ../php_files/fridge.php');
    } else {
        echo "ログイン認証に失敗しました";
    }
} catch (Exception $e) {
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}
