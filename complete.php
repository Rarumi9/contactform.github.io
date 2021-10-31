<?php
if ( !$_POST ) {
	header( 'Location: index.html' );
}

mb_language("Ja");
mb_internal_encoding("UTF-8");
$mailto = $_POST[ "email"];
$subject = "お問い合わせありがとうございました";
$header = "MIME-Version: 1.0\n"
. "Content-Transfer-Encoding: BASE64\n"
. "Content-Type: text/plain; charset=UTF-8\n"
. "Message-Id: <" . md5(uniqid(microtime())) . "@gmail.com>\n"//送信元ドメインを記載
. "From:" .mb_encode_mimeheader("×××株式会社（送信者の名前を入れてください）") ."<sofiane.lalmi@gmail.com>\n"//送信元アドレスを記載
. "Bcc: sofiane.lalmi@gmail.com";//実際に転送する管理者アドレスを記載

$message = $_POST[ "name" ] . "様" . "\n" . "\n" .
"お問い合わせいただき誠にありがとうございます。" . "\n" .
"お客様からのお問い合わせを下記内容にて受け付けました" . "\n" . "\n" .
"お名前：" . $_POST["name"] . "\n" .
"ふりがな：" . $_POST["kana"] . "\n" .
"郵便番号：" . $_POST["zip1"] . "-" . $_POST["zip2"] . "\n" .
"都道府県：" . $_POST["pref"] . "\n" .
"住所：" . $_POST["address"] . "\n" .
"電話番号：" . $_POST["tel"] . "\n" .
"E-Mail：" . $_POST["email"] . "\n" .
"パスワード：" . $_POST["pass"] . "\n" .
"問い合わせ店舗：" . $_POST["shop"] . "\n" . 
"問い合わせ店舗名：" . $_POST["shopname"] . "\n" . 
"資料：" . $_POST["catalog"] . "\n" .
"お問い合わせ内容：" . "\n" .  $_POST["comment"] . "\n" . "\n" .
"※なお、本メールは自動応答にてお送りしておりますので、本メールへ返信いただいた場合は連絡はできません。" . "\n" .
"ご連絡いただいた内容について回答させていただく際は、xxx@xxxxxx.jpからご連絡させていただきます。" . "\n" . "\n" .
"※自動的にPCメールや迷惑メールとして処理される場合がございますので、返信が無い場合は、迷惑メールフォルダ等をご確認いただきますよう、お願いいたします。" . "\n" . "\n" .
"ホームページ　http://www.xxxxxxxx.jp";

$return = "-f"."sofiane.lalmi@gmail.com";//エラーメールの返信先

//メール送信
mb_send_mail( $mailto, $subject, $message, $header, $return );
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>第33回お問い合わせフォーム</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrap">
	<header>
		<div class="inner">
			<h1>Site title</h1>
		</div>
	</header>
	<nav >
		グローバルナビゲーションが入ります。
	</nav>
	<main class="inner">
		<h2>送信完了</h2>
		<p>お問い合わせありがとうございました。</p>
	</main>
	<footer>
		<small>&copy;Copyright 2021 TDP All rights reserved.</small>
	</footer>
</div>
</body>
</html>
