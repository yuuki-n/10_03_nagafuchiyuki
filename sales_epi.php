<?php
//1. DB接続
$dbn = 'mysql:dbname=gsacfd04_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:' . $e->getMessage());
}

//2. データ表示SQL作成
$sql = 'SELECT * FROM episode_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view = '';
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<td>' . $result['name'] . '</td>';
        $view .= '<td>' . $result['product']  . '</td>';
        $view .= '<td><img src=' . $result['image']  . '>' . '</td>';
        $view .= '<td>' . $result['comment']  . '</td>';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>販売員用閲覧画面</title>
    <link rel="stylesheet" href="" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>

    </header>

    <ul class="table">
        <!-- ここにDBから取得したデータを表示しよう -->
        <?= $view ?>

    </ul>
    </div>

</body>

</html>