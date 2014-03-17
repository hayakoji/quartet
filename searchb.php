<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>SPOT - Free Bootstrap 3 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

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
            <li><a href="user1b.php">登録</a></li>
            <li><a href="searchb.html">検索</a></li>
            <li class="active"><a href="example.php">ログイン</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>




	<div class="container desc">
		<div class="row">
			<br><br>
			<div class="col-lg-6">
				<img src="rinngo.png" alt="">
			</div><!-- col-lg-6 -->
			<div class="col-lg-6">
<h2>検索フォーム</h2>
<form action="search.php" method="get">

<li>ジャンル：
<input type="radio" name="type" value="1"/>飲食
<input type="radio" name="type" value="2"/>散策
<input type="radio" name="type" value="3"/>デート
<p></li>
</ul>
<li>コマ：
<!--<input type="checkbox" name="slotcon" onClick="AllCheckes();" > 全選択-->
<table>
  <tr>
    <th></th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
  </tr>
  <tr>
    <th>1</th>
    <td><input type="checkbox" name="slot[]" value="Mon-1" ></td>
    <td><input type="checkbox" name="slot[]" value="Tue-1" ></td>
    <td><input type="checkbox" name="slot[]" value="Wen-1" ></td>
    <td><input type="checkbox" name="slot[]" value="Thr-1" ></td>
    <td><input type="checkbox" name="slot[]" value="Fri-1" ></td>
  </tr>
  <tr>
    <th>2</th>
    <td><input type="checkbox" name="slot[]" value="Mon-2" ></td>
    <td><input type="checkbox" name="slot[]" value="Tue-2" ></td>
    <td><input type="checkbox" name="slot[]" value="Wen-2" ></td>
    <td><input type="checkbox" name="slot[]" value="Thr-2" ></td>
    <td><input type="checkbox" name="slot[]" value="Fri-2" ></td>
  </tr>
    <tr>
    <th>3</th>
    <td><input type="checkbox" name="slot[]" value="Mon-3" ></td>
    <td><input type="checkbox" name="slot[]" value="Tue-3" ></td>
    <td><input type="checkbox" name="slot[]" value="Wen-3" ></td>
    <td><input type="checkbox" name="slot[]" value="Thr-3" ></td>
    <td><input type="checkbox" name="slot[]" value="Fri-3" ></td>
  </tr>
  <tr>
    <th>4</th>
    <td><input type="checkbox" name="slot[]" value="Mon-4" ></td>
    <td><input type="checkbox" name="slot[]" value="Tue-4" ></td>
    <td><input type="checkbox" name="slot[]" value="Wen-4" ></td>
    <td><input type="checkbox" name="slot[]" value="Thr-4" ></td>
    <td><input type="checkbox" name="slot[]" value="Fri-4" ></td>
  </tr>
  <tr>
    <th>5</th>
    <td><input type="checkbox" name="slot[]" value="Mon-5" ></td>
    <td><input type="checkbox" name="slot[]" value="Tue-5" ></td>
    <td><input type="checkbox" name="slot[]" value="Wen-5" ></td>
    <td><input type="checkbox" name="slot[]" value="Thr-5" ></td>
    <td><input type="checkbox" name="slot[]" value="Fri-5" ></td>
  </tr>
    <tr>
    <th>6</th>
    <td><input type="checkbox" name="slot[]" value="Mon-6" ></td>
    <td><input type="checkbox" name="slot[]" value="Tue-6" ></td>
    <td><input type="checkbox" name="slot[]" value="Wen-6" ></td>
    <td><input type="checkbox" name="slot[]" value="Thr-6" ></td>
    <td><input type="checkbox" name="slot[]" value="Fri-6" ></td>
  </tr>
</table>

<ul>
<li>人数：
  <select name = "number">
<option value="1">1〜2人</option>
<option value="2">3〜4人</option>
<option value="3">5〜6人</option>
<option value="4">7〜9人</option>
</select>
<p></li>
<li>大学：

  <?php
$connect = mysql_connect("localhost", "******", "******");
mysql_query("SET NAMES utf8", $connect);
$univecon = mysql_db_query("******", "select distinct university from post_tbl"); 
echo "<select name='university'>";
while(true){
  $unive = mysql_fetch_assoc($univecon);
  if($unive == null){
    echo "</select>";
    break;
  }
  else{
    echo "<option value='{$unive['university']}'>" . $unive['university'] . "</option>";
  }
}
?>

<p></li>
<li>値段：
  <select name = "price">
<option value="1">タダ！</option>
<option value="2">〜999円</option>
<option value="3">1000円〜1999円</option>
<option value="4">2000円〜2999円</option>
</select>
<input type='hidden' name='name' value='{$_GET['name']}'>"
<p></li>
<input type="submit" value="検索">
</form>

				</p>
			</div>
		</div><!-- row -->
		
		
	</div><!-- container -->

</script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript">
<!--
    function AllChecked(){
     var check =  document.form.slotcon.checked;

     for (var i=0; i<document.form.elements['slot[]'].length; i++){
        document.form.elements['slot[]'][i].checked = check;
     }
    }
//-->
    </script>

    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
