<html lang="en">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
<meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<link rel="shortcut icon" href="assets/ico/favicon.png">

<title>
  
    検索結果
  
</title>


    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- Documentation extras -->
<link href="docs.min.css" rel="stylesheet">
<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
                               <link rel="shortcut icon" href="../assets/ico/favicon.ico">

<script async="" id="gauges-tracker" data-site-id="4f0dc9fef5a1f55508000013" src="//secure.gaug.es/track.js"></script><script id="twitter-wjs" async="" src="https://platform.twitter.com/widgets.js"></script><script async="" src="http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"></script><script async="" src="http://www.google-analytics.com/ga.js"></script><script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-146052-10']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

  <style id="holderjs-style" type="text/css"></style><style>#adzerk_by {display:none}

/* horiz */
.carbonad {display:block; background: #fdfdfd; background-image: -moz-linear-gradient(top, #f8f8f8, #fdfdfd); background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f8f8f8),color-stop(1, #fdfdfd)); border: 1px solid #d5d5d5; font-family: Lucida Grande, Arial, Helvetica, sans-serif; font-size: 11px; height: 118px; line-height: 15px; overflow: hidden; width: 300px;}
.carbonad-img {border: none; display: inline; float: left; height: 100px; margin: 9px; width: 130px;}
.carbonad-text {display:inline; float:left; width:142px; padding-top:13px;}
.carbonad-text a {color: #000000; font-weight: bold; text-decoration: none;}
.carbonad-tag {float: left; margin-top: 9px; text-align: center; width: 142px; color: #999999;}
.carbonad-tag a {color: #999999; text-decoration: none;}
</style></head>
<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src = "titlemini.gif">
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">トップ</a></li>
            <li><a href="user1b.html">登録</a></li>
            <li><a href="searchb.php">検索</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">
<?php
echo "<br><br><br><br><br>検索条件<br>";
if($_GET["type"] == 1){
    echo "ジャンル：飲食<br>";
}
else if($_GET["type"] == 2){
    echo "ジャンル：散策<br>";
}
else{
    echo "ジャンル：デート<br>";
}
if($_GET["number"] == 1){
    echo "人数：1〜2人<br>";
}
else if($_GET["number"] == 2){
    echo "人数：3〜4人<br>";
}
else if($_GET["number"] == 3){
    echo "人数：5〜6人<br>";
}
else{
    echo "人数：7〜9人<br>";
}
echo "大学：" . $_GET["university"] . "<br>";
if($_GET["price"] == 1){
    echo "値段：タダ！";
}
else if($_GET["price"] == 2){
    echo "値段：〜999円";
}
else if($_GET["price"] == 3){
    echo "値段：1000円〜1999円";
}
else{
    echo "値段：2000円〜2999円";
}

echo "<br><br>";
echo "検索結果<br><br>";




$connect = mysql_connect("localhost", "******", "******");

mysql_query("SET NAMES utf8", $connect);

// Posts
$sql = "select * from post_tbl where
                type='{$_GET['type']}'
            and number='{$_GET['number']}'
            and university='{$_GET['university']}'
            and price='{$_GET['price']}'";

$posts = mysql_db_query("******", $sql);

// Times
$times = array();

foreach($_GET['slot'] as $slot) {
    $exploded = explode('-', $slot);

    $day = $exploded[0];
    $time = $exploded[1];

    // Times
    $sql = "select post_id from time_tbl where
                    day='{$day}'
                and time={$time}";

    $tmp_times = mysql_db_query("******", $sql);

    while($tmp_time = mysql_fetch_assoc($tmp_times)) {
        $times[] = $tmp_time['post_id'];
    }
}

//var_dump($times);

while (true) {
    $post = mysql_fetch_assoc($posts);

    // Gender
    $genderconnect = mysql_db_query("******","select gender from user_tbl where name='{$post['name']}'");
    $gender = mysql_fetch_assoc($genderconnect);




    if ($post == null){
        break;

    } else if (in_array($post['id'], $times)) {
        echo "<table border='1' class='table table-striped'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td width='150' class='active'>";
        echo "場所";
        echo "</td>";
        echo "<td width='800'>";
        echo $post['place'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td width='150' class='active'>";
        echo "投稿者";
        echo "</td>";
        echo "<td width='800'>";
        if($gender['gender'] == "n"){
            echo "女の子"; 
        }
        else{
            echo "男の子";
        }
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td width='150' class='active'>";
        echo "現在の総合評価";
        echo "</td>";
        echo "<td width='800'>";
        print round($post['score'] / $post['scorenumber'],1);
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td width='150' class='active'>";
        echo "投稿者口コミ";
        echo "</td>";
        echo "<td width='800'>";
        echo $post['kuchikomi'];
        echo "</td>";
        echo "</tr>";
        $count = 1;
            // Kuchikomi
        $kuchikomiconnect = mysql_db_query("******","select kuchikomi from riview1_tbl where place='{$post['place']}' order by date DESC");

        while($count <=3){
                $kuchikomi = mysql_fetch_assoc($kuchikomiconnect);
            if ($kuchikomi == null){
            break;
            }
            else{
        echo "<tr>";
        echo "<td width='150' class='active'>";
        echo "他の口コミ";
        echo "</td>";
        echo "<td width='800'>";
        echo $kuchikomi['kuchikomi'];
        echo "</td>";
        echo "</tr>";
        $count++;
            }
        }
        echo "<tr>";
        echo "<td width='150' class='active'>";
        echo "写真";
        echo "</td>";
        echo "<td width='800'>";
        $result = mysql_db_query("******","select picture from post_tbl where place='{$post['place']}'");
        $image = mysql_fetch_assoc($result);//$resultから1行文切り取る
        if($image == null ){//もし、$personが空=nullだったらループを脱出
        echo "<center>No Image</center>";
        }else{
        echo "<img src='../../../b31_c135/img/{$image['picture']}'>"; //切り取ったデータのうちの、nameカラムを表示

        } 
        echo "</td>";
        echo "</tr>";
       // for($tanin = 1;$tanin <= 3;$tanin++){
         //   echo "他の口コミ：";
          //  $kuchikomi = mysql_fetch_assoc($kuchikomiconnect);
           // echo $kuchikomi['kuchikomi'] . "<br>";
        echo "</tbody>";

        echo "</table>";        
    }
}
mysql_close($connect);

?>
</div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
