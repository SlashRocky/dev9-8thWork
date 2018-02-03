<?php
  session_start();

  //ログイン状態チェック
  if( !isset($_SESSION['name']) ){
    header('Location: logout.php');
    exit();
  }
?>



<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search | BookMark</title>
    <link rel="stylesheet" href="css/icomoon/icomoon_style.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .login-btn {
        float: right;
        color: #000;
        margin-right: 40px;
        text-decoration: none;
      }
      .logout {
        float: right;
        margin: 0 40px 0 0;
         
      }
      a:-webkit-any-link {
        text-decoration: none !important;
        color: #8f0010 !important;
      }
      a:-webkit-any-link:hover {
        opacity: 0.7;
      }
      u {
        text-decoration: none !important;
      }
      .welcome {
        float: right;
        margin: 0 40px 0 0;
        
      }
    </style>
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/book.js"></script>
  </head>
  <body>
    <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
    <main class="wrap indexMain">
      <section class="searchTop on">
       
        <ul class="logout">
          <li><a href="logout.php">LogOut</a></li>
        </ul>
        
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする ユーザー名をechoで表示 -->
        <p class="welcome">ようこそ<u><?php echo htmlspecialchars($_SESSION['name'], ENT_QUOTES); ?></u>さん</p>
				
        <div class="inner">
          <h1>book!</h1>
          <p class="searchTop_icon"><span class="icon-book"></span></p>
          <p class="searchTop_catch">本を検索しよう！</p>
        </div>
      </section>
      <div class="searchBody on">
        <h2 class="searchBox titleBar">
          <div class="searchBox_text">
            <input type="text" class="searchBox_text_input">
          </div>
          <div id="search-btn" class="searchBox_text_btn">
            <span class="btn icon-search"></span>
          </div>
        </h2>
        <section class="searchResult">
          <div class="searchResult_head">
            <p class="searchResult_keyword"></p>
          </div>
          <div class="inner">
            <ul>
            
            </ul>
          </div>
        </section>
      </div>
    </main>
  </body>
</html>
