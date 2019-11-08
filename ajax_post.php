<?php
var_dump($_POST);
var_dump($_FILES);


//関数ファイルの読み込み
include('functions.php');

//コメント必須
if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['comment']) || $_POST['comment'] == ''
) {
    exit('ParamError');
} else {
    $name = $_POST['name'];
    $product = $_POST['product'];
    $comment = $_POST['comment'];
}

// Fileアップロードチェック
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    // ファイルをアップロードした時の処理
    $file_name = $_FILES['upfile']['name'];
    $tmp_path = $_FILES['upfile']['tmp_name'];
    $file_dir_path = 'upload/';

    // File名の変更
    // 拡張子
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    // 日付＋適当な文字列＋拡張子
    $uniq_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $file_name = $file_dir_path . $uniq_name;
    // ファイルをアップロード,仮保存から作った名前に移動,権限を付与
    if (is_uploaded_file($tmp_path)) {
        if (move_uploaded_file($tmp_path, $file_name)) {
            chmod($file_name, 0644);
            // アップロードしたファイルをdbに登録(画像付き)
            $sql = 'INSERT INTO episode_table(id,name,product,image,comment,indate)VALUES(NULL,:a1,:a2, :image, :a3, sysdate())';
        } else {
            exit('Error:アップロードできませんでした');
        }
    }
} else {
    // ファイルなしのアップロードはimageカラムにnullを入れる
    $sql = 'INSERT INTO episode_table(id,name,product,image,comment,indate) VALUES(NULL,:a1,:a2, null, :a3, sysdate())';
}

// dbに接続する
$pdo = connectToDb();

// dbへの登録SQL
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $product, PDO::PARAM_STR);
// ファイルをアップロードする時だけ :imageにファイルパスを設定する
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    $stmt->bindValue(':image', $file_name, PDO::PARAM_STR);
}
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

// 登録後にデータを取得
$sql = 'SELECT * FROM episode_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データをjsonにして渡す
$view = '';
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    echo json_encode($stmt->fetchAll());
}
