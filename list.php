<?php
include "functions.inc.php";
try{
  $dbh = getDatabaseConnection();
  $start = isset($_GET['page']) ? abs(intval($_GET['page'])) : 0;
  $stmt = $dbh->prepare("SELECT code, ctime FROM records ORDER BY ctime DESC LIMIT :start,20");
  $stmt->bindValue(":start", $start, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
  http_response_code(500);
  echo json_encode(array("message" => $e->getMessage(), "line" => $e->getLine()));
  die();
}
?><!DOCTYPE HTML>
<!--
	2015 北一制服日・頭貼產生器 by christinesfkao, 2015, under CC-BY 3.0
	Template by HTML5 UP  html5up.net | n33.co @n33co dribbble.com/n33
	Core functions inspired by 7 號頭像產生器(http://goooooooogle.github.io/profile-picture-generator/)
-->
<html>
	<head>
		<title>2015 北一制服日・頭貼產生器</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="javascript/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="stylesheets/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="stylesheets/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="stylesheets/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="stylesheets/noscript.css" /></noscript>
	</head>
	<body class="is-loading" id="drop">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="images/avatar.png" alt="" /></span>
							<h1>2015/12/12</br>北一制服日・頭貼產生器</h1>
						</header>
						<div>
							<ul class="actions">
								</br><li><a href="#" class="button uploadBtn">上傳相片</a></li>
								<span class="mobile-hide">或直接將圖片拖曳到頁面中</span></br>
								自由拖曳、調整大小後，即可
								<li><a href="#" id="normalSubmit" class="button">下載成品</a></li>
							</ul>
						</div>
						<!-- Preview -->
						<div id="content" class="container">
						  <div class="row">
						    <?php
                foreach($result as $row){
                  echo '<img src="//i.imgur.com/'.$row['code'].'.jpg">';
                }
                ?>
						</div>
						<div>
							<ul class="actions">
							</br></br></br></br>
								<li><a href="#" class="button">看看其他人的頭貼</a></li>
							</ul>
						</div>
					</section>



					<!-- Footer -->
				    <footer id="footer">
							<ul class="icons">
								<li><a href="https://www.facebook.com/2015北一女中制服日-1055328207832585/" class="icon fa-facebook" target="_blank"><span class="label">2015北一女中制服日</span></a></li>
				        <li><a href="mailto:christinesfkao@gmail.com" class="icon fa-envelope-o" target="_blank"><span class="label">錯誤回報</span></a></li>
							</ul>
				      <ul class="copyright">
				        <li>&copy; <a href="http://christinesfkao.tw">Christine Kao</a> 2015</li>
				        <li><a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a></li>
				        <li><a href="https://opensource.org/licenses/BSD-3-Clause">BSD New</a></li>
				        <li><a href="https://github.com/christinesfkao/tfg-profile-pic">Source Code</a></li>
				      </ul>
				    </footer>

			</div>
		<!-- Scripts -->
			<!--[if lte IE 8]><script src="javascript/respond.min.js"></script><![endif]-->
			<script src="//code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
			<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	</body>
</html>
