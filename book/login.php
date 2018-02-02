<?php

  //セッション開始
  session_start();

	/* DB定義
	------------------------------ */
	//DBサーバのURL
	$db['host'] = 'localhost';
	//データベース名
	$db['dbname'] = 'gs_db';

	//「ログインされている」という状態を変数$loginに格納
  $login = isset($_POST['login']) ? $_POST['login'] : '' ;

	//エラーメッセージの初期化
  $errMsg = "";

	/* ログインボタンが押された場合
	------------------------------ */
	if($login){

    /* エラーチェック
		------------------------------ */
    //IDが未入力の場合 emptyは値が空の時
		if( empty($_POST['loginId']) ){
			$errMsg .= 'ログインIDが未入力です<br />';
		}
    //PASSWORDが未入力の場合
		else if( empty($_POST['loginPw']) ){
			$errMsg .= 'ログインパスワードが未入力です<br />';
		}

		//エラーがない場合
		if( !empty($_POST['loginId']) && !empty($_POST['loginPw']) ) {
			
			//入力されたログインIDを格納
			$loginId = $_POST['loginId'];
			
			//ユーザIDとパスワードが入力されていたら認証する
			$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
			
      //DB接続 →　DB内検索（IDが一致するものを探す）
      try{
				//PDOオブジェクトの生成
        $pdo = new PDO('mysql:host=localhost; dbname=gs_db; charset=utf8','root','');
      
				//prepareメソッドでSQLをセット
				$stmt = $pdo -> prepare('SELECT * FROM gs_user_table WHERE loginId = ?');
				
				//executeでクエリを実行　executeは更新？？
				$stmt -> execute( array($loginId) );
				
				//入力されたログインパスワードを$loginPwに格納
				$loginPw = $_POST['loginPw'];

				//$stmt -> fetch(PDO::FETCH_ASSOC)で実行　→　取得したデータを$rowに格納
				if( $row = $stmt -> fetch(PDO::FETCH_ASSOC) ){
					
					$errMsg .= $row['loginPw'].",";
					
					//入力したログインパスワードとデータベースのパスワードが一致したら
					if ( $loginPw == $row['loginPw'] ) {
						
						//認証成功なら、セッションIDを新規に発行する
						session_regenerate_id(true);
						
						//データベースから取得したuserIdを変数$useIdに格納
						$userId = $row['userId'];
						
						//入力したIDからユーザー名を取得したい
						$sql = "SELECT * FROM gs_user_table WHERE userId = $userId";
						
						//※1回だけ使用するようなSQL文をデータベースへ送信するにはPDOクラスで用意されている"query"メソッドを使う
						$stmt = $pdo -> query($sql);
						
						//リネームって感じ
						foreach ($stmt as $row) {
							//ユーザーの名前
							$row['name'];
							//ユーザーID
							$row['userId'];
						}
						
						//データベースから取得してきたデータをセッション変数に渡す
						$_SESSION['name'] = $row['name'];
						$_SESSION['userId'] = $row['id'];
						
						//書籍検索画面へ遷移
						header('Location: input_data.php');
						//処理終了
						exit();
					}
					//認証失敗
					else{
						$errMsg .= 'ログインIDあるいはログインパスワードに誤りがあります。';
					}
				}
				//該当データなし
				else{
					$errMsg = 'LoginIDあるいはLoginパスワードに誤りがあります。';
				}
			}
			//DB接続失敗
      catch(PDOException $e){
        exit( 'DbConnectError:'.$e->getMessage() );
      }
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
    <title>logIn | BookMark</title>
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
      <h1>Log In</h1>
      <form method="post" action="login.php">
        <p style="color:red;"><?php echo $errMsg;?></p>
        <div class="form-item">
          <label for="loginId"></label>
          <input type="text" name="loginId" id="loginId"　required="required" placeholder="Login ID">
        </div>
        <div class="form-item">
          <label for="loginPw"></label>
          <input type="password" name="loginPw" id="loginPw" required="required" placeholder="Login Password">
        </div>
        <div class="button-panel">
          <input type="submit" class="button" title="Sign In" value="Log In" name="login">
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




