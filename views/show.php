<?php
define('DB_NAME', 'bbs_board');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'hogehoge');
define('PDO_DSN', 'mysql:host=127.0.0.1;dbname=' . DB_NAME);

try {
  // DBCONNECT
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // SELECT_POST
  // $db->exec("insert into engineers(name, age) values ('木村侑',23)");
  $stmt = $db->query("select * from posts");
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // disconect
  $db = null;
} catch(PDOException $e) {
  echo $e->getMessage();
  exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../assets/stylesheets/main.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <title>Finc最終研修 - PHPで掲示板 記事ページ</title>
</head>
<body>
<header class="top-nav">
  <div class="header-wrapper clearfix">
    <div class="ribbon ribbon-top-left">
      <span>研修1修了テスト</span>
    </div>
    <div class="header-content">
      <h1 class="headler-main-title">【サッカー】＜日本代表＞W杯出場でも…　ハリルホジッチ監督に更迭話が浮上！</h1>
      <p><a href="#">file:///Library/WebServer/Documents/php-bbs/views/show.html</a></p>
    </div>
  </div>
</header>
<div class="main-wrapper clearfix">
  <div class="main-content-area">
    <div class="main-show-page-wrapper">
      <div class="show-top-comment-num">
        コメント14件
      </div>
      <div class="show-top-nav-area">
        <ul class="show-top-nav-list">
          <li><a href="#" class="show-to-nav-link">全部見る</a></li>
          <li><a href="#" class="show-to-nav-link">1-100</a></li>
          <li><a href="#" class="show-to-nav-link">最新50</a></li>
          <li><a href="#" class="show-to-nav-link">経緯版へ戻る</a></li>
        </ul>
      </div>
      <article>
        <div class="show-page-title-area">
          <h2>【サッカー】＜日本代表＞W杯出場でも…　ハリルホジッチ監督に更迭話が浮上！</h2>
        </div>
        <div class="show-page-main-area">
          <div class="show-toic-area">
            <div class="show-meta-data">
              <span class="meta-number meta-number-first">1</span>
              <span class="meta-name">風吹けば名無し＠無断転載禁止</span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                冷や汗ものの試合が続いたすえに、ようやく6大会連続のW杯出場を決めたサッカー日本代表。その矢先、指揮官であるヴァヒド・ハリルホジッチ監督（65）に更迭話が浮上した。 <br />
                しかも、後任の最有力候補に挙がったのは、八百長疑惑でその職を追われたハビエル・アギーレ前監督（58）だという。 <br />
                <br />
                　*** <br />
                <br />
                　勝てばW杯出場決定、負ければ出場圏外への転落もあり得た、8月31日のオーストラリア戦。日本にとって天下分け目の戦いだったわけだが、首尾よく制したのはご存じの通りだ。 <br />
                <br />
                　それでも、ハリルホジッチ監督の評価がうなぎ上りになったというわけではない。 <br />
                <br />
                　スポーツ紙のサッカー担当記者によれば、 <br />
                <br /><br />
                「日本の選手は、ヨーロッパやアフリカなどの選手に比べればフィジカル面で劣る。だから、オシムもザッケローニも短いパスを繋ぐ、集団で戦うサッカーを目指した。でも、ハリルが強調するのはフランス語で決闘を意味する“デュエル”。つまり、1対1の勝負です。それを重視する戦術は、個人個人のフィジカルが強いチームならいいが、日本には馴染まない。だから、格下のUAE相手に最終予選初戦で敗北を喫したり、チームが空回りすることが少なくないのです」 <br />
                <br /><br />
                　たまたま、オーストラリア戦は采配が当たっただけだという。 <br />
                <br />
                「しかも、ハリルは見下すような態度を取るから、選手たちからも煙たがられている。例えば、就任直後、小学生でもできるインサイドキックのやり方を指導し、“日本人はこんな練習もしたことないだろう”と言い放った。一事が万事、その調子。個人面談でも“お前はあれがダメ、これがダメ”と1時間以上も高圧的に説教すると聞きました」（同） <br />
                <br />
                正反対 <br />
                　戦術だけでなく、人間性でも不評を買っているハリルホジッチ監督。この際、W杯の本大会前に更迭し、その代わりにアギーレ前監督を再招聘すべきだという話が持ち上がっている。 <br />
                <br />
              </p>
            </div>
          </div>
          <div class="show-comment-area">
            <div class="show-meta-data">
              <span class="meta-number">2</span>
              <span class="meta-name">風吹けば名無し＠無断転載禁止</span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                また実話 じゃなかった
              </p>
            </div>
          </div>
          <div class="show-comment-area">
            <div class="show-meta-data">
              <span class="meta-number">3</span>
              <span class="meta-name">風吹けば名無し＠無断転載禁止</span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                トルシエの時と似てるな
              </p>
            </div>
          </div>
        </div>
      </article>
      <div class="show-bottom-comment-num">
        コメント14件
      </div>
      <div class="show-page-comment-area">
      <h4>この記事にコメントを残す</h4>
      </div>
      <div class="page-comment-area">
        <form action="" method="POST">
          <p>
          <textarea class="page_comment_textarea" placeholder="コメント内容" rows="5", cols="70", name="COMMENT"></textarea></p>
          <p><input type="submit" value="コメントする" class="page_comment_submit"></p>
        </form>
      </div>

    </div>
  </div>

  <aside class="right-sidebar">
    <img src="../assets/img/ad_sample.png">
  </aside>
</div>
</body>
</html>

