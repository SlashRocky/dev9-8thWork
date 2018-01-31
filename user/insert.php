<?php

  include('functions.php');

  //入力チェック(受信確認処理追加)
  if(
    !isset($_POST["loginId"]) || $_POST["loginId"]=="" ||
    !isset($_POST["loginPw"]) || $_POST["loginPw"]=="" ||
    !isset($_POST["name"]) || $_POST["name"]=="" ||
    !isset($_POST["email"]) || $_POST["email"]=="" ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
  ){
    exit('ParamError');
  }

  //1. POSTデータ取得
  $loginId  = $_POST["loginId"];
  $loginPw  = $_POST["loginPw"];
  $name   = $_POST["name"];
  $email  = $_POST["email"];
  $naiyou = $_POST["naiyou"];

  //2. DB接続します(エラー処理追加)
  $pdo = db_con();


  //３．データ登録SQL作成 この関数作れたいいね
  $stmt = $pdo -> prepare("INSERT INTO gs_an_table(id, loginId, loginPw, name, email, naiyou, indate)VALUES(NULL, :loginId ,:loginPw, :a1, :a2, :a3, sysdate())");
  $stmt -> bindValue(':loginId', $loginId, PDO::PARAM_STR);
  $stmt -> bindValue(':loginPw', $loginPw, PDO::PARAM_STR);
  $stmt -> bindValue(':a1', $name, PDO::PARAM_STR);
  $stmt -> bindValue(':a2', $email, PDO::PARAM_STR);
  $stmt -> bindValue(':a3', $naiyou, PDO::PARAM_STR);
  $status = $stmt -> execute();

  //４．データ登録処理後
  if($status == false){
    
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    error_db_Info($stmt);
    
  }
  else{
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
  }
?>
