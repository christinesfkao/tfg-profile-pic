<?php
include "inc/functions.php";
if(!isset($_GET['code'])){
  header("Location: list.php");
  exit();
}
try{
  $dbh = getDatabaseConnection();
  $stmt = $dbh->prepare("SELECT code, ctime FROM records WHERE code = :code OR code = CONCAT('#', :code)");
  $stmt->execute(array(
    "code" => $_GET['code']
  ));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if(empty($result)){
    header("Location: list.php");
    exit();
  }
}catch(PDOException $e){
  http_response_code(500);
  echo json_encode(array("message" => $e->getMessage(), "line" => $e->getLine()));
  die();
}
$og_path = 'show.php?code='.$result['code'];
$og_image = 'https://i.imgur.com/'.$result['code'].'l.jpg';
include 'inc/header.php';
?>

          <div>
            <img class="show-img" src="//i.imgur.com/<?= $result['code'] ?>.jpg">
          </div>
					<div>
            <br><br>
						<ul class="actions">
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://tfg-profile-pic.infoplat.org/show.php?code=<?= $result['code'] ?>" target="_blank" class="button">分享到 Facebook</a></li>
              <br><br>
							<li><a href="list.php" class="button">看看其他人的頭貼</a></li><li><a href="/" class="button">產生我的頭貼</a></li>
						</ul>
					</div>
					</section>

<?php include 'inc/footer.php' ?>
