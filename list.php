<?php
include "inc/functions.php";
try{
  $dbh = getDatabaseConnection();
  $start = isset($_GET['page']) ? abs(intval($_GET['page'])) : 0;
  $stmt = $dbh->prepare("SELECT code, ctime FROM records WHERE code NOT LIKE '#%' ORDER BY ctime DESC LIMIT :start,20");
  $stmt->bindValue(":start", $start, PDO::PARAM_INT);
  $stmt->execute();
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
              <?php
                foreach($result as $row){
                  echo '<img src="//i.imgur.com/'.$row['code'].'.jpg"><br>';
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

<?php include 'inc/footer.php' ?>
