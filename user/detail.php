<?php
	//GET送信されたidを取得(URLの後ろについてるデータ)
	$id = $_GET["id"];
	echo $id;

	//1.  DB接続します
	try {
		$pdo = new PDO('mysql:dbname=gs_db; charset=utf8; host=localhost', 'root', '');
	}
	catch (PDOException $e) {
		exit('データベースに接続できませんでした。'.$e -> getMessage());
	}

	//２．データ登録SQL作成
	$sql = 'SELECT * FROM gs_an_table WHERE id=:id';
	$stmt = $pdo -> prepare($sql);
	//ハッキングされないための関数 bindValueを通して無効化したものを入れる
	$stmt -> bindValue(":id", $id, PDO::PARAM_INT);

	//実行
	$flag = $stmt -> execute();

	//３．データ表示
	if($flag==false){

		//execute（SQL実行時にエラーがある場合）
		$error = $stmt -> errorInfo();
		exit("ErrorQuery:".$error[2]);

	}
	else{  
		$result = $stmt -> fetch();
	}
?>


<!doctype html>
<!--[if lt IE 7]><html lang="ja" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="ja" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="ja" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ja" prefix="og: http://ogp.me/ns#" class="no-js">
	<!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Book Mark LAB</title>

		<!-- mobile meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="apple-touch-icon" href="lib/img/apple-touch-icon.png">
		<link rel="icon" href="lib/img/favicon.png">
		<!--[if IE]>
		<link rel="shortcut icon" href="/lib/img/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="lib/img/win8-tile-icon.png">

		<!-- favicon -->
		<link rel="icon" type="image/vnd.microsoft.icon" href="lib/img/favicon.ico" />

		<!-- css -->
		<link rel="stylesheet" href="lib/css/style.css">
		<link rel="stylesheet" href="lib/css/memo.css">
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
		<!-- font-awesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- accordion CSS -->
		<noscript>
			<style>
				.st-accordion ul li{
					height:auto;
				}
				.st-accordion ul li > a span{
					visibility:hidden;
				}
			</style>
		</noscript>

		<!-- modal CSS -->
		<!--
<link type="text/css" rel="stylesheet" href="lib/css/remodal.css">
<link type="text/css" rel="stylesheet" href="lib/css/remodal-default-theme.css">
<style>
.remodal-bg.with-red-theme.remodal-is-opening,
.remodal-bg.with-red-theme.remodal-is-opened {
filter: none;
}

.remodal-overlay.with-red-theme {
background-color: #f44336;
}

.remodal.with-red-theme {
background: #fff;
}
</style>
-->

		<!-- Google CDN jQuery with fallback to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="lib/js/minified/jquery-1.11.0.min.js"><\/script>')
					</script>

					<!-- ColumnScroller -->
					<script src="lib/js/jquery-smartColumnScroller.js"></script>
					<script>
			$(window).load(function() {
				$('#header').smartColumnScroller();
			});
		</script>

		<!-- modal JS -->
		<script src="lib/js/remodal.js"></script>
		<script>
			$(document).on('opening', '.remodal', function () {
				console.log('opening');
			});
			$(document).on('opened', '.remodal', function () {
				console.log('opened');
			});
			$(document).on('closing', '.remodal', function (e) {
				console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
			});
			$(document).on('closed', '.remodal', function (e) {
				console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
			});
			$(document).on('confirmation', '.remodal', function () {
				console.log('confirmation');
			});
			$(document).on('cancellation', '.remodal', function () {
				console.log('cancellation');
			});
			//  Usage:
			//  $(function() {
			//
			//    // In this case the initialization function returns the already created instance
			//    var inst = $('[data-remodal-id=modal]').remodal();
			//
			//    inst.open();
			//    inst.close();
			//    inst.getState();
			//    inst.destroy();
			//  });
			//  The second way to initialize:
			$('[data-remodal-id=modal2]').remodal({
				modifier: 'with-red-theme'
			});
		</script>

	</head>

	<body itemscope itemtype="http://schema.org/WebPage">
		<div id="container" class="remodal-bg p-relative">

			<!-- header -->
			<header id="header" class="bs-bbox w200 h100 bg-manageSide p-fixed top0 left0 o-scroll">
				<div id="header-inner"  class="">
					<h1 class="ta-center">
						<button class="all-btn color-f ff-roboto fs-caps fs-20 lh-03 c-pointer op-05 " value="all">
							BM USER
						</button>
					</h1>
					<a href="index.php" class="new-btn color-f fs-14 d-block ta-center w90 m-auto b-all-f pr20 pl20 pt10 pb10 br-4 bg-3 op-05 c-pointer">
						<i class="fa fa-plus color-f"></i>&emsp;ユーザー新規登録
					</a>
					<div class="ta-center mt20 mb20">
						<input name="" value="" placeholder="ユーザーを検索" class="search w64 m-auto pt10 pb10 pr10 pl40 color-22 fs-14 b-all-bf br-4" type="text">
					</div>
					<!--
<div class="list-box">
<ul class="list-box-inner ta-center">
<li class="list h60p btn btn1" value="HTML"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">HTML</a></li>
<li class="list h60p btn btn2" value="CSS"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">CSS</a></li>
<li class="list h60p btn btn3" value="JavaScript"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">JavaScript</a></li>
<li class="list h60p btn btn4" value="jQuery"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">jQuery</a></li>
<li class="list h60p btn btn5" value="React"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">React</a></li>
<li class="list h60p btn btn6" value="Node.js"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">Node.js</a></li>
<li class="list h60p btn btn7" value="PHP"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">PHP</a></li>
<li class="list h60p btn btn8" value="Laravel"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">Laravel</a></li>
<li class="list h60p btn btn9" value="MySQL"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">My SQL</a></li>
<li class="list h60p btn btn10" value="Ruby"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">Ruby</a></li>
<li class="list h60p btn btn11" value="RubyOnRails"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">Ruby on Rails</a></li>
<li class="list h60p btn btn12" value="Other"><a href="javascript:void(0);" class="ff-robotoCds color-f fs-20 fw-bold lh-03 d-block">Other</a></li>
</ul>
</div>
-->
				</div>
			</header>

			<!-- contents -->
			<main id="main" class="w100 h100 bg-manage p-fixed top0 left200 o-scroll">
				<section id="main-inner" class="mr200 pt30 pb10">
					<div class="container">
						<div class="wrapper">

							<fieldset>
								<legend>USER情報</legend>
								<label>名前：<input type="text" name="name" value="<?=$result["name"]?>"></label><br>
								<label>Email：<input type="text" name="email" value="<?=$result["email"]?>"></label><br>
								<label><textArea name="naiyou" row="4" cols="40"><?=$result["naiyou"]?></textArea></label><br>
								<input type="submit" value="送信">
								<!-- 裏でidを渡す -->
								<input type="hidden" name="id" value="<?=$id?>">
							</fieldset>

						</div>
					</div>
				</section>
			</main>

			<!--
<div class="remodal" data-remodal-id="modal" role="dialog">
<button data-remodal-action="close" class="remodal-close close-btn" aria-label="Close"></button>
<dl class="entryBox">
<dt class="p15 bg-lg bs-bbox clearfix">
<div class="selectWrap mr20">
<select name="input-category" class="input-category s-bbox w240 h36 mt8 mb8 fs-16 color-22 lh-016">
<option value="btn1">HTML</option>
<option value="btn2">CSS</option>
<option value="btn3">JavaScript</option>
<option value="btn4">jQuery</option>
<option value="btn5">React</option>
<option value="btn6">Node.js</option>
<option value="btn7">PHP</option>
<option value="btn8">Laravel</option>
<option value="btn9">My SQL</option>
<option value="btn10">Ruby</option>
<option value="btn11">Ruby on Rails</option>
<option value="btn12">Other</option>
</select>
</div>
<input type="text" placeholder="タイトルを入力してください。" class="input-title d-block w100 pl15 h30p bg-tp b-bot-c bs-bbox color-22 fs-16 ff-gothic mt10 w75">
</dt>
<dd class="bg-f b-top-bf pt15 pl15 pr15 pb10 bs-bbox">
<textarea cols="30" rows="10" placeholder="本文を入力してください。" class="input-comment r-none b-all-c w100 pl15 pr15 pt7 pb15 bs-bbox color-22 fs-16 ff-gothic lh-015"></textarea>
</dd>
</dl>

<div class="modalBtn pb15 pl15 pr15 w100 bs-bbox bg-f">
新規作成時 
<div class="m-auto w140">
<button data-remodal-action="confirm" class="remodal-confirm save-btn ta-center pl20 pr20 pt8 pb8 color-f fs-14 bg-3 br-4 c-pointer bs-bbox op-09">保存して閉じる</button>
</div>
更新時 
<div class="m-auto w140">
<button data-remodal-action="confirm" class="remodal-confirm update-btn ta-center pl20 pr20 pt8 pb8 color-f fs-14 bg-3 br-4 c-pointer bs-bbox op-09">更新して閉じる</button>
</div>
</div>
</div>
-->

		</div>

		<!-- memo JS -->
		<script src="lib/js/memo.js"></script>

		<!-- Accordion JS -->
		<script src="lib/js/jquery.accordion.js"></script>
		<script src="lib/js/jquery.easing.1.3.js"></script>
		<script>
			$(function() {　
				$('#st-accordion').accordion();
				$('#st-accordion').$items.find('div.st-content').hide();
			});
		</script>

	</body>
</html>