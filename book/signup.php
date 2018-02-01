<?php
	//セッション開始
	session_start();

	/* DB定義
	------------------------------ */
	//DBサーバのURL
	$db['host'] = 'localhost';
	//データベース名
	$db['dbname'] = 'gs_db';
	//ユーザー名
	$db['user'] = 'hogeUser';
	//ユーザー名のパスワード
	$db['pass'] = "hogehoge";

	//エラーメッセージの初期化
	$errMsg = '';
	//登録完了メッセージの初期化
	$signUpMsg = '';

	//ログインボタンが押された場合
	if( isset($_POST['signUp']) ){
		
		/* ログインIDのp入力チェック
		------------------------------ */
		//値が空の時
		if( empty($_POST['loginId']) ){
			$errMsg = 'ログインIDが未入力です。';
		}
		else if( empty($_POST['loginPw']) ){
			$errMsg = 'ログインパスワードが未入力です。';
		}
		else if( empty($_POST['loginPw2']) ){
			$errMsg = 'パスワードが未入力です。';
		}
		
		if (!empty($_POST["loginId"]) && !empty($_POST["loginPw"]) && !empty($_POST["loginPw2"]) && $_POST["loginPw"] === $_POST["loginPw2"]){
			//入力されたログインIdを格納
			$loginId = $_POST['loginId'];
			$password = $_POST['loginPw'];
			
			//ログインIDとログインパスワードが入力されていたら認証する
			$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
			
			//エラー処理
			try {
				
				$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

				$stmt = $pdo -> prepare("INSERT INTO gs_user_table (loginId, loginPw) VALUES (?, ?)");
				
				//パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
				$stmt -> execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
				
				//登録した(DB側でauto_incrementした)IDを$userIdに入れる
				$loginId = $pdo -> lastinsertid();
				
				// ログイン時に使用するIDとパスワード
				$signUpMsg = '登録が完了しました。あなたの登録IDは '. $loginId. ' です。パスワードは '. $loginPw. ' です。';
				
			}
			catch(PDOException $e){
				$errorMessage = 'データベースエラー';
				// $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
				// echo $e->getMessage(); 
			}
		}
		else if( $_POST["loginPw"] != $_POST["loginPw2"] ){
			$errMsg = 'パスワードに誤りがあります。';
		}
	}
?>




<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>新規登録 | BookMark</title>
		<style>
			/* Fonts */
			@import url(https://fonts.googleapis.com/css?family=Open+Sans:400);

			/* fontawesome */
			@import url(http://weloveiconfonts.com/api/?family=fontawesome);
			[class*="fontawesome-"]:before {
				font-family: 'FontAwesome', sans-serif;
			}

			/* Simple Reset */
			* { margin: 0; padding: 0; box-sizing: border-box; }

			/* body */
			body {
				background: #e9e9e9;
				color: #5e5e5e;
				font: 400 87.5%/1.5em 'Open Sans', sans-serif;
			}

			/* Form Layout */
			.form-wrapper {
				background: #fafafa;
				margin: 3em auto;
				padding: 0 1em;
				max-width: 370px;
			}

			h1 {
				text-align: center;
				padding: 1em 0;
			}

			form {
				padding: 0 1.5em;
			}

			.form-item {
				margin-bottom: 0.75em;
				width: 100%;
			}

			.form-item input {
				background: #fafafa;
				border: none;
				border-bottom: 2px solid #e9e9e9;
				color: #666;
				font-family: 'Open Sans', sans-serif;
				font-size: 1em;
				height: 50px;
				transition: border-color 0.3s;
				width: 100%;
			}

			.form-item input:focus {
				border-bottom: 2px solid #c0c0c0;
				outline: none;
			}

			.button-panel {
				margin: 2em 0 0;
				width: 100%;
			}

			.button-panel .button {
				background: #f16272;
				border: none;
				color: #fff;
				cursor: pointer;
				height: 50px;
				font-family: 'Open Sans', sans-serif;
				font-size: 1.2em;
				letter-spacing: 0.05em;
				text-align: center;
				text-transform: uppercase;
				transition: background 0.3s ease-in-out;
				width: 100%;
			}

			.button:hover {
				background: #ee3e52;
			}

			.form-footer {
				font-size: 1em;
				padding: 2em 0;
				text-align: center;
			}

			.form-footer a {
				color: #8c8c8c;
				text-decoration: none;
				transition: border-color 0.3s;
			}

			.form-footer a:hover {
				border-bottom: 1px dotted #8c8c8c;
			}
		</style>
		<script src="js/jquery-3.2.0.min.js"></script>
		<script src="js/book.js"></script>
	</head>
	<body>
		<div class="form-wrapper">
			<h1>新規フォーム</h1>
			
			<form id="loginForm" name="loginForm" action="" method="POST">
				<fieldset>
					<div><font color="#ff0000"><?php echo htmlspecialchars($errMsg, ENT_QUOTES); ?></font></div>
					<div><font color="#0000ff"><?php echo htmlspecialchars($signUpMsg, ENT_QUOTES); ?></font></div>
					<label for="loginId">ログインID</label><input type="text" id="loginId" name="username" placeholder="ログインIDを入力" value="<?php if (!empty($_POST["loginId"])) {echo htmlspecialchars($_POST["loginId"], ENT_QUOTES);} ?>">
					<br>
					<label for="loginPw">ログインパスワード</label><input type="password" id="loginPw" name="loginPw" value="" placeholder="ログインパスワードを入力">
					<br>
					<label for="loginPw2">ログインパスワード(確認用)</label><input type="password" id="loginPw2" name="loginPw2" value="" placeholder="再度ログインパスワードを入力">
					<br>
					<input type="submit" id="signUp" name="signUp" value="新規登録">
				</fieldset>
			</form>
			
			<br>
			
			<form action="login.php">
				<div class="button-panel">
					<input type="submit" class="button" value="戻る">
				</div>
			</form>
			
			<div class="form-footer">
				<!--
					<p><a href="#">Create an account</a></p>
					<p><a href="#">Forgot password?</a></p>
				-->
			</div>
		</div>
	</body>
</html>