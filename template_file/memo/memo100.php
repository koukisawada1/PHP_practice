<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<?php
// 127.0.0.1 自分自身のサーバ
// PDO PHPでデータを扱うためのオブジェクト
// PDOで接続するときのパラメータ　データベースに接続文字列　ユーザ名　パスワード
// try 例外処理
try {
    $db = new PDO('mysql:dbname=mydb;127.0.0.1;charset=utf8', 'root', 'root');   
} catch(PDOException $e) {
    echo 'DB接続エラー' . $e->getMessage();
}

//exec データベースにSQLを発行する

// $count = $db -> exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰,ピンク,甘い"');
// echo $count . '件のデータを挿入しました';

//$recodesのなかにデータベースの内容を入れる
// queryメゾット　SELECT構文で得られた結果を取得する my_itemsから全てのカラムの値を取得してください

// $recodes = $db->query('SELECT * FROM my_items');
// // fetch 一行ずつ取り出す
// while ($recode = $recodes->fetch()) {
//     print($recode['item_name'] . "\n");
// }

$memos = $db->query('SELECT * FROM memos ORDER BY id DESC');

?>

<article>
    <?php while ($memo = $memos->fetch()): ?>
        <!-- mb_substr 表示する文字を制限する -->
        <p><a href="memo.php?id=<?php print($memo['id']) ?>"><?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
        <time><?php print($memo['created_at']); ?></time>
        <hr>
    <?php endwhile; ?>
</article>
</main>
</body>    
</html>