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
<h2>桁数が一桁の場合０を表示する</h2>
<pre>
<?php
// %02d月　先頭に０を表示し、２桁で合わせる　d数字　s文字
$date = sprintf('%04d年 %02d月 %02d日', 2018, 1, 23);
print($date);
?>
</pre>
</main>
</body>    
</html>