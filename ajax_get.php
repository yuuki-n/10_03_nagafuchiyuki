<?php

// 関数の読み込み
include('functions.php');

$pdo = connectToDb();

// SQL文
$sql = 'SELECT*FROM episode_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    errorMsg($stmt);
} else {
    echo json_encode($stmt->fetchAll());
}
