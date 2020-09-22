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
// require 他のファイルを取り込むことができるファンクション
require('dbconnect.php');

// ページネーション
// urパラメータを省略した場合,数字が指定されなかった場合はpage=1が表示される
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
   $page = $_REQUEST['page']; 
} else {
    $page = 1;
}

$start = 5 * ($page - 1);

$memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
$memos->bindParam(1, $start, PDO::PARAM_INT); // 数字でパラメータを渡す
$memos->execute();

?>

<article>
    <?php while ($memo = $memos->fetch()): ?>
        <!-- mb_substr 表示する文字を制限する -->
        <p><a href="memo.php?id=<?php print($memo['id']) ?>"><?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
        <time><?php print($memo['created_at']); ?></time>
        <hr>
    <?php endwhile; ?>
    <!-- 0ページへを非表示にする -->
    <?php if ($page >= 2): ?>
        <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
    <?php endif ?>
    ｜
    <?php
    // データがないページへのリンクを非表示にする
    // データの件数を取得する　as cnt $countをcntで使えるようにする
    $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
    $count = $counts->fetch();
    // ceil 切り上げる　マックスページを求める計算
    $max_page = ceil($count['cnt'] / 5);
    if ($page < $max_page):
    ?>
        <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
    <?php endif; ?>
</article>
</main>
</body>    
</html>