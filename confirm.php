<?php

if ( !$_POST ) {
	header( 'Location: index.html' );
}

function convert_char( $target ) {
	$target = stripslashes( $target );
	$target = htmlspecialchars( $target, ENT_QUOTES );
	return $target;
}

$name = convert_char( $_POST[ "name" ] );
$kana = convert_char( $_POST[ "kana" ] );
$zip1 = convert_char( $_POST[ "zip1" ] );
$zip1 = mb_convert_kana( $zip1, "n", "utf-8" );
$zip2 = convert_char( $_POST[ "zip2" ] );
$zip2 = mb_convert_kana( $zip2, "n", "utf-8" );
$pref = convert_char( $_POST[ "pref" ] );
$address = convert_char( $_POST[ "address" ] );
$address = mb_convert_kana( $address, "n", "utf-8" );
$tel = convert_char( $_POST[ "tel" ] );
$tel = mb_convert_kana( $tel, "n", "utf-8" );
$email = convert_char( $_POST[ "email" ] );
$email = mb_convert_kana( $email, "a", "utf-8" );
$pass = convert_char( $_POST[ "pass" ] );
$shop = convert_char( $_POST[ "shop" ] );
$shopname = convert_char( $_POST[ "shopname" ] );
$comment = convert_char( $_POST[ "comment" ] );

if ( is_array( $_POST[ 'catalog' ] ) ) {
	$catalog = implode( ",", $_POST[ 'catalog' ] );
}
//改行を\nに統一して<br>に置き換え
$comment = str_replace( "\r\n", "\n", $comment );
$comment = str_replace( "\r", "\n", $comment );
$comment_conv = str_replace( "\n", "<br>", $comment );
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
		<h2>入力内容確認</h2>
		<p>内容に問題がなければ送信ボタンを押してください。</p>
		<form id="contact_form" action="complete.php" method="POST">
			<dl id="form">
				<dt>お名前</dt>
				<dd><?php print $name; ?></dd>
				<dt>ふりがな</dt>
				<dd><?php print $kana; ?></dd>
				<dt>郵便番号</dt>
				<dd><?php print $zip1; ?>-<?php print $zip2; ?></dd>
				<dt>住所</dt>
				<dd><?php print $pref; ?><?php print $address; ?></dd>
				<dt>電話番号</dt>
				<dd><?php print $tel; ?></dd>
				<dt>メールアドレス</dt>
				<dd><?php print $email; ?></dd>
				<dt>パスワード</dt>
				<dd><?php print $pass; ?></dd>
				<dt>問い合わせ店舗</dt>
				<dd><?php print $shop; ?></dd>
				<dt>店舗名（その他を選んだ場合）</dt>
				<dd><?php print $shopname; ?></dd>
				<dt>ご希望の資料</dt>
				<dd><?php print $catalog; ?></dd>
				<dt>お問い合わせ内容</dt>
				<dd><?php print $comment_conv; ?></dd>
			</dl>
			<div class="btn_block">
				<input type="button" value="戻る" id="return" onClick="history.back()">
				<input type="submit" value="送信する" id="submit">
			</div>
			<input type="hidden" name="name" value="<?php echo $name; ?>">
			<input type="hidden" name="kana" value="<?php echo $kana; ?>">
			<input type="hidden" name="zip1" value="<?php echo $zip1; ?>">
			<input type="hidden" name="zip2" value="<?php echo $zip2; ?>">
			<input type="hidden" name="pref" value="<?php echo $pref; ?>">
			<input type="hidden" name="address" value="<?php echo $address; ?>">
			<input type="hidden" name="tel" value="<?php echo $tel; ?>">
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="pass" value="<?php echo $pass; ?>">
			<input type="hidden" name="shop" value="<?php echo $shop; ?>">
			<input type="hidden" name="shopname" value="<?php echo $shopname; ?>">
			<input type="hidden" name="catalog" value="<?php echo $catalog; ?>">
			<input type="hidden" name="comment" value="<?php echo $comment; ?>">
		</form>
	</main>
	<footer>
		<small>&copy;Copyright 2021 TDP All rights reserved.</small>
	</footer>
</div>
</body>
</html>
