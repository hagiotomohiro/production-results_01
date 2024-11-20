<?php
session_start();

//クリックジャッキングへの対策
header('X-Frame-Options: DENY');

//フォームを経ずにこのページに直接アクセスした場合は拒否する
if(!isset($_POST['token'])) {
    echo '不正なアクセスの可能性があります';
    exit;
}

//キーとトークンが一致したら管理者に入力内容がメールで送られる
if($_SESSION['key'] === $_POST['token']) {
    $name = $_SESSION['name'];
    $rudy = $_SESSION['rudy'];
    $tel = $_SESSION['tel'];
    $email = $_SESSION['email'];
    $message = $_SESSION['message'];

//メールの送り先
$to = '';

//メールの件名
$subject = 'お問い合わせがありました';

//メール本文
$comment = "お問い合わせがありました。\n\n\n\n";
$comment .= "お問い合わせの内容は以下の通りです。\n---\n\n\n";
$comment .= "お名前:" . $name . "\n\n";
$comment .= "フリガナ:" . $rudy . "\n\n";
$comment .= "電話番号:" . $tel . "\n\n";
$comment .= "メールアドレス:" . $email . "\n\n";
$comment .= "お問い合わせ本文:" . $message . "\n\n";

//メールヘッダー
$headers = "From: 小さなパスタ屋Tino  <>\n";
$headers .= "Reply-To: 小さなパスタ屋Tino  <>\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

//文字化け対策
mb_language("uni");
mb_internal_encoding("UTF-8");

// 自動返信メール送信
date_default_timezone_set('Asia/Tokyo');
// 件名を設定
$auto_reply_subject = "【自動返信】お問い合わせありがとうございます。";
// 本文を設定
$auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。\n";
$auto_reply_text = "下記の内容でお問い合わせを受け付けました。\n\n\n";
$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n\n";
$auto_reply_text .= "お名前：" . $name . "\n";
$auto_reply_text .= "フリガナ：" . $rudy . "\n";
$auto_reply_text .= "お名前：" . $tel . "\n";
$auto_reply_text .= "メールアドレス：" . $email . "\n";
$auto_reply_text .= "お問い合わせ内容：" . $message . "\n\n\n\n";
$auto_reply_text .= "小さなパスタ屋Tino";
// 自動返信メール送信（問い合わせ元へ）
mb_send_mail( $email, $auto_reply_subject, $auto_reply_text, $headers);


if(mb_send_mail($to, $subject, $comment, $headers)) {

    //メールが送信出来たら$_SESSIONの値をクリア
    $_SESSION = array();

    //メールが送信出来たらセッションを破棄
    session_destroy();

    header("Location: complete.html");
} else {
    $message = '送信に失敗しました';
}
} else {
    $message = 'キーとトークンが一致しません';
}
?>
