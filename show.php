<?php
include "inc/functions.php";
try{
  $dbh = getDatabaseConnection();
  $stmt = $dbh->prepare("SELECT code, ctime FROM records WHERE code = :code");
  $stmt->execute(array(
    "code" => isset($_GET['code']) ? $_GET['code'] : ""
  ));
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
  http_response_code(500);
  echo json_encode(array("message" => $e->getMessage(), "line" => $e->getLine()));
  die();
}
include 'inc/header.php';
?>
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
						    <div class="text-center" id="generator">
						      <div id="settings">
						        <input type="radio" name="template" value="1" autocomplete="off" checked="checked">
												<div class="preview">
									        <div id="userimage">
									          <div class="inner" style="background-image: url(images/sample.jpg)"></div>
									          <div id="size-slider"><span class="zoomin">＋放大底圖</span><span class="zoomout">縮小底圖－</span></div>
									          <div id="size-slider2"><span class="zoomin">＋放大徽章</span><span class="zoomout">縮小徽章－</span></div>
									        </div>
							        	<div id="coverimage">
							          	<div class="inner" style="background-image: url(images/object/1.png)"></div>
							          	<div id="dragger"></div>
												</div>
	        							<div id="loading"><div class="drop"><img src="images/loading.gif"></div></div>
										</div>
									</div>
								</div>
						</div>
						<div>
							<ul class="actions">
							</br></br></br></br>
								<li><a href="#" class="button">看看其他人的頭貼</a></li>
							</ul>
						</div>
					</section>

<?php include 'inc/footer.php' ?>
