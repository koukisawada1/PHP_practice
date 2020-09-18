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
<h2>画面に現在の時間を表示する</h2>
<pre>
<!-- date 現在時刻を取得するファンクション -->
<?php
date_default_timezone_set('Asia/Tokyo');
print(date('現在は'.'Y年 m月 d日 G時 i分 s秒').'です');
?>
</pre>
</main>
</body>    
</html>