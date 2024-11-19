<?php
session_start();

//クリックジャッキングへの対策
header('X-Frame-Options: DENY');

//トークンの生成
$token = sha1(uniqid(rand(), true));

//トークンを$_SESSIONに格納し、それをキーとする
$_SESSION['key'] = $token;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="お問い合わせフォーム画面">
  <meta name="robots" content="noindex">
  <title>お問い合わせ | 小さなパスタ屋Tino</title>
  <link rel="icon" href="img/head/favicon.ico">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/other-animation.css">
  <!-- Google font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
</head>

<body>
  <!-- header -->
  <header class="header header__contact">
    <nav class="header__nav nav__other nav__pc">
      <a class="header__img" href="index.html">
        <img src="img/top/main-logo.png" alt="小さなパスタ屋Tino">
      </a>
      <ul class="header__nav-inner">
        <li class="header__nav-list">
          <a href="index.html#topNews">お知らせ・SNS</a>
        </li>
        <li class="header__nav-list">
          <a href="index.html#topAbout">Tinoについて</a>
        </li>
        <li class="header__nav-list">
          <a href="menu.html">メニュー</a>
        </li>
        <li class="header__nav-list">
          <a href="index.html#topSchedule">営業カレンダー</a>
        </li>
        <li class="header__nav-list">
          <a href="index.html#topContact">ご予約・お問い合わせ</a>
        </li>
      </ul>
    </nav>
    <!-- SP用ナビゲーション -->
    <a class="sp__img" href="index.html">
      <img src="img/top/main-logo.png" alt="小さなパスタ屋Tino">
    </a>
    <div class="nav__sp">
      <div class="openbtn">
        <div class="openbtn-area">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <nav class="slide-menu">
      <ul>
        <li>
          <a class="drawer__nav__link" href="index.html#topNews">お知らせ・SNS</a>
        </li>
        <li>
          <a class="drawer__nav__link" href="index.html#topAbout">Tinoについて</a>
        </li>
        <li>
          <a href="menu.html">メニュー</a>
        </li>
        <li>
          <a class="drawer__nav__link" href="index.html#topSchedule">営業カレンダー</a>
        </li>
        <li>
          <a class="drawer__nav__link" href="contact.php">ご予約・お問い合わせ</a>
        </li>
      </ul>
    </nav>
    <!-- SP用ナビゲーションend -->
    <div class="header__other-ttl">
      <h1>Contact</h1>
      <nav class="breadcrumb-trail">
        <ul>
          <li>
            <a href="index.html">Top</a>
          </li>
          <li>&#60;</li>
          <li>
            <a href="#">お問い合わせ</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- header end -->
  <main>
    <div class="reservation__section">
      <div class="reservation__section-net">
        <h3>ネット予約</h3>
        <p>※ 11月より食べログからご予約いただけます ※</p>
        <a class="contact__link" href="https://yoyaku.tabelog.com/yoyaku/net_booking_form/index?rcd=40068132">
          <img class="contact__icon" src="img/contact/tabelog-logo.svg" alt="食べログ">
        </a>
      </div>
      <div class="reservation__section-tel">
        <h3>電話予約</h3>
        <a class="contact-tell" href="tel:092-406-7378">092-406-7378</a>
      </div>
    </div>

    <div class="contact__section">
      <div class="contact__ttl">
        <h2>Contact</h2>
        <span>お問い合わせフォーム</span>
      </div>
      <div class="contact__nav">
        <div class="nav__content contact__input">
          <p>入力</p>
        </div>
        <div class="triangle"></div>
        <div class="nav__content contact__confirm">
          <p>内容確認</p>
        </div>
        <div class="triangle"></div>
        <div class="nav__content contact__complete">
          <p>送信完了</p>
        </div>
      </div>
      <form class="form" action="confirm.php" method="POST">
        <dl class="contact-form">
          <dt>
            <label for="name">お名前</label>
          </dt>
          <dd>
            <input type="text" id="name" class="input-area" name="name" placeholder="名前を入力してください。" required>
          </dd>
          <dt>
            <label for="name">フリガナ</label>
          </dt>
          <dd>
            <input type="text" id="rudy" class="input-area" name="rudy" placeholder="フリガナを入力してください。" required>
          </dd>
          <dt>
            <label for="tel">電話番号</label>
          </dt>
          <dd>
            <input type="tel" id="tel" class="input-area" name="tel" placeholder="電話番号を入力してください。" required>
          </dd>
          <dt>
            <label for="email">メールアドレス</label>
          </dt>
          <dd>
            <input type="email" id="email" class="input-area" name="email" placeholder="メールアドレスを入力してください。" required>
          </dd>
          <dt>
            <label for="message">お問い合わせ内容</label>
          </dt>
          <dd>
            <textarea id="message" class="input-area message-area" name="message" placeholder="お問い合わせ内容を入力してください。"
              required></textarea>
          </dd>
        </dl>
        <input type="hidden" name="token" value="<?= $token ?>">
        <div class="form__button">
          <input id="submit" type="submit" value="確認する">
        </div>
      </form>
    </div>
  </main>
  <!-- footer -->
  <footer id="footer" class="footer">
    <div class="footer__content">
      <div class="footer__item-left">
        <div>
          <img src="img/top/footer-logo.png" alt="小さなパスタ屋Tino">
        </div>
        <dl class="footer__address">
          <dt>住所</dt>
          <dd>福岡市早良区西新5丁目6-5楢木コーポ206号室</dd>
          <dt>電話番号</dt>
          <dd>
            <a href="tel:092-406-7378">092-406-7378</a>
          </dd>
          <dt>営業時間</dt>
          <dd>
            11:30~15:00　(LO. 14:00)<br>
            18:00~22:00　(LO. 21:00)
          </dd>
          <dt>店休日</dt>
          <dd>不定休</dd>
        </dl>
      </div>
      <div class="footer__item-right">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.9050834330455!2d130.3567363!3d33.581813600000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354193c491c25555%3A0x2b76e56dcaabc1c2!2z5bCP44GV44Gq44OR44K544K_5bGLIFRpbm_vvIjjg4bjgqPjg47vvIk!5e0!3m2!1sja!2sjp!4v1721658575322!5m2!1sja!2sjp"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <p>&copy; 2024 小さなパスタ屋Tino</p>
    <!-- TOPへ戻る -->
    <p id="page-top"><a href=""><span>Page Top</span></a></p>
  </footer>
  <!-- footer end -->

  <!-- jQuery読み込み -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- slick読み込み -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <!-- JavaScript -->
  <script src="js/other.js"></script>
</body>

</html>