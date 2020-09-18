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
<pre>
<?php

$zip = 'aaaaa';

$zip = mb_convert_kana($zip, 'a', 'UTF-8'); //英数字を半角に直す
//preg_match 正規表現でマッチするかどうか
//\d{3} d-数字　数字が三回続くこと
// \A 文章の先頭である
if (preg_match("/\A\d{3}[-]\d{4}\z/", $zip)) {
    print('郵便番号：〒' . $zip);
} else {
    print('※　郵便番号を 123−4567の形式で入力してください');
}
?>
</pre>
</main>
</body>    
</html>