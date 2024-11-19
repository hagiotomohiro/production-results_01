<?php
session_start();

//クリックジャッキングへの対策
header('X-Frame-Options: DENY');

//フォームを経ずにこのページに直接アクセスした場合は拒否する
if(!isset($_POST['token'])) {
  echo '不正なアクセスの可能性があります';
  exit;
}

//フォームに入力された値のエスケープ処理
function e($str) {
  return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, 'UTF-8');
}

//入力内容を$_SESSIONに格納する
$_SESSION['name'] = e($_POST['name']);
$_SESSION['rudy'] = e($_POST['rudy']);
$_SESSION['tel'] = e($_POST['tel']);
$_SESSION['email'] = e($_POST['email']);
$_SESSION['message'] = e($_POST['message']);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="お問い合わせ内容確認">
  <meta name="robots" content="noindex">
  <title>お問い合わせ内容確認 | 小さなパスタ屋Tino</title>
  <link rel="icon" href="img/head/favicon.ico">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/animation.css">
<!-- Google font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contact__section">
      <div class="contact__ttl">
        <h2>Contact</h2>
      </div>
      <h3>確認画面</h3>
      <div class="contact__nav">
        <div class="nav__content confirm__input">
          <p>入力</p>
        </div>
        <div class="triangle"></div>
        <div class="nav__content confirm__confirm">
          <p>内容確認</p>
        </div>
        <div class="triangle"></div>
        <div class="nav__content confirm__complete">
          <p>送信完了</p>
        </div>
      </div>
        <table>
        <tr>
          <th>お名前</th>
          <td>
          <?php echo $_SESSION['name']; ?>
          </td>
        </tr>
        <tr>
          <th>フリガナ</th>
          <td>
            <?php echo $_SESSION['rudy']; ?>
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>
            <?php echo $_SESSION['tel']; ?>
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <?php echo $_SESSION['email']; ?>
          </td>
        </tr>
        <tr>
          <th class="border-none">問い合わせ内容</th>
          <td class="border-none">
            <?php echo $_SESSION['message']; ?>
          </td>
        </tr>
        </table>
      <form class="form" action="mail.php" method="POST">
      <input type="hidden" name="token" value="<?= $_POST['token'] ?>">
        <div class="form-button">
          <button type="button" class="contact__button" onclick="history.back()">戻　 る</button>
          <button type="submit" class="contact__button">送信する</button>
        </div>
      </form>
    </div>
  </body>
  </html>