<?php 
  //セッションスタート開始
  session_start();

  /* ----------------------------------------
  book.jsのファイルでPOST送信されたデータの受け取り
  ---------------------------------------- */
  $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
  $bookId = isset($_POST['bookId']) ? $$_POST['bookId'] : '';
  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $url = isset($_POST['url']) ? $_POST['url'] '';
  $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

  /* ----------------------------------------
  受け取ったデータをデータベースに書き込む
  ---------------------------------------- */
  //DB定義
  const DB = "";
  const DB_ID = "root";
  const DB_PW = "";
  const DB_NAME = "";

  //PDOでデータベースに接続
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=gs_db;charset=utf8',DB_ID,'');
  }
  //デーベースに接続できなかった時
  catch (PDOException $e) {
    exit( 'DbConnectError:' . $e->getMessage());
  }

  //実行したいSQL文を変数$sqlに格納
  $sql = "INSERT INTO gs_book_table (no, userId, bookId, title, url, comment, regiDate) VALUES ( NULL, :userId, :bookId, :title, :url, :comment, sysdate() )";

  //実行したいSQL文をセット
  $stmt = $pdo -> prepare($sql);

  //各パラメーターに保存したい値をセット
  $stmt -> bindValue(':userId',$userId,PDO::PARAM_STR);
  $stmt -> bindValue(':bookId',$bookId,PDO::PARAM_STR);
  $stmt -> bindValue(':title',$title,PDO::PARAM_STR);
  $stmt -> bindValue(':url',$url,PDO::PARAM_STR);
  $stmt -> bindValue(':comment',$comment,PDO::PARAM_STR);

  //実際に実行　→　それを変数$flagに格納
  $flag = $stmt -> execute();

  //失敗　→　エラーメッセージ表示
  if($flag == false){
    $error = $stmt -> errorInfo();
    exit("ErrorQuery:".$error[2]);
  }

  //成功　→　input_data.phpにリダイレクト
  else{
    header('Location: input_data.php');
    exit();
  }
?>
