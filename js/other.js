// TOPへ戻る
$(document).ready(function () {
  function PageTopAnime() {
    let scroll = $(window).scrollTop();
    if (scroll >= 150) {//上から100pxスクロールしたら
      $('#page-top').removeClass('DownMove');//#page-topについているDownMoveというクラス名を除く
      $('#page-top').addClass('UpMove');//#page-topについているUpMoveというクラス名を付与
    } else {
      if ($('#page-top').hasClass('UpMove')) {//すでに#page-topにUpMoveというクラス名がついていたら
        $('#page-top').removeClass('UpMove');//UpMoveというクラス名を除き
        $('#page-top').addClass('DownMove');//DownMoveというクラス名を#page-topに付与
      }
    }
  }
  // 画面をスクロールをしたら動かす
  $(window).scroll(function () {
    PageTopAnime();
    scrollHeight = $(document).height();
    scrollPosition = $(window).height() + $(window).scrollTop();
    footHeight = $("footer").innerHeight();
    if (scrollHeight - scrollPosition <= footHeight) {
      $("#page-top").css({ position: "absolute", bottom: footHeight + 20 });
    } else {
      $("#page-top").css({ position: "fixed", bottom: "30px" });
    }
  });
  // ページが読み込まれたらすぐに動かす
  $(window).on('load', function () {
    PageTopAnime();
  });
  // #page-topをクリックした際の設定
  $('#page-top').click(function () {
    let scroll = $(window).scrollTop(); //スクロール位置を取得
    if (scroll > 0) {
      $(this).addClass('floatAnime');//クリックしたらfloatAnimeというクラス名が付与
      $('body,html').animate({
        scrollTop: 0
      }, 2500, function () {//スクロールの速さ。数字が大きくなるほど遅くなる
        $('#page-top').removeClass('floatAnime');//上までスクロールしたらfloatAnimeというクラス名を除く
      });
    }
    return false;//リンク自体の無効化
  });
});

// ハンバーガーメニュー
$(function () {
  $('.openbtn').click(function () {
    $('.openbtn, .slide-menu').toggleClass('active');
  });
});
$('.drawer__nav__link').click(function () {
  $('.openbtn, .slide-menu').removeClass("active");
});