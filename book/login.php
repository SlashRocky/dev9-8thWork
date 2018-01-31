<?php
  //セッション開始
  session_start();

  $loginId = isset($_POST['loginId']) ? $_POST['loginId'] : '' ;
  $loginPw = isset($_POST['loginPw']) ? $_POST['loginPw'] : '' ;
  $login = isset($_POST['login']) ? $_POST['login'] : '' ;
  $errMsg = "";

  if($login){
    //ログインボタンを押した場合
    

    //エラーチェック
    //IDが未入力の場合
    if(!$loginId) $errMsg .="ID未入力<br />";

    //PASSWORDが未入力の場合
    if(!$loginPw) $errMsg .="PW未入力<br />";

    if(!errMsg){
      //DB検索
      try{
        $pdo = new PDO('mysql:host=localhost; dbname=gs_db; charset=utf8','root','');
      }
      catch(PDOException $e){
        exit( 'DbConnectError:'.$e->getMessage() );
      }

      $sql = 'SELECT * FROM gs_user_table WHERE loginId=:loginId and loginPw=:loginPw';
      $stmt -> $pdo -> prepare($sql);
      $stmt -> bindValue(':loginId', $loginId, PDO::PARA_STR);
      $stmt -> bindValue(':loginPw', $loginPw, PDO::PARA_STR);
      $flag = $stmt -> execute();

      //DBに無い場合エラーメッセージ
      if($flag==false){
  //      $error = $stmt -> errorInfo();
  //      exit('ErrorQuery:'.$error[2]);
        $errMsg .="アカウント無し";
        echo 'ないよ！';
      }
      //DBにあった場合ログイン処理
      else{
        //セッションにloginIDを登録
        $_SESSION['userId'] = $userId;
        $_SESSION['loginId'] = $loginId;


        //リダイレクト 
        header('Location: input_data.php');
        exit();
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
    <title>Book Memo</title>
    <link rel="stylesheet" href="css/icomoon/icomoon_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/book.js"></script>
  </head>
  <body>
    <main class="wrap indexMain">
      <div class="searchBody on">
        <form method="post" action="login.php">
           <p style="color:red;"><?php echo $errMsg;?></p>
          <label for="loginId">ログインID:</label>
          <input type="text" name="loginId" id="loginId"><br>
          <label for="loginPw">ログインパスワード:</label>
          <input type="password" name="loginPw" id="loginPw"><br>
          <input type="submit" value="ログイン" name="login">
          <!--本来ならデータベースと照合してなかったらログインされる-->
        </form>
      </div>
    </main>
  </body>
</html>
