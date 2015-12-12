<?php
include "inc/functions.php";
define("IMG_PER_PAGE", 12);
$page = isset($_GET['page']) ? abs(intval($_GET['page'])-1) : 0;
$start = $page * IMG_PER_PAGE;
try{
  $dbh = getDatabaseConnection();
  $stmt = $dbh->prepare("SELECT id, code, ctime FROM records WHERE code NOT LIKE '#%' ORDER BY id DESC LIMIT :start,".IMG_PER_PAGE);
  $stmt->bindValue(":start", $start, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
  http_response_code(500);
  echo json_encode(array("message" => $e->getMessage(), "line" => $e->getLine()));
  die();
}
$og_path = 'list.php';
include 'inc/header.php';
?>
						<div>
              <?php
                for($i = 0; $i < count($result); $i++){
                  if($i % 4 == 0){
                    echo '<div class="row">';
                  }
                  echo '<div class="col-md-3 col-sm-3 col-xs-6"><a href="show.php?code='.$result[$i]['code'].'"><img style="width:100%;border-radius:10%" src="//i.imgur.com/'.$result[$i]['code'].'m.jpg"></a></div>';
                  if($i % 4 == 3){
                    echo '</div>';
                  }
                }
              ?>
              </div>
						<div>
							<ul class="actions">
							</br></br></br></br>
                <?php
                $start_page = 5 * intval(($page)/5);
                if($page + 1 != 1){
                  echo '<li><a href="list.php?page='.$page.'" class="button">上一頁</a></li>';
                }
                ?>
                <?php
                for($i = $start_page + 1; $i < $start_page + 6; $i++){
                  echo '<li>';
                  if($i == $page + 1){
                    echo '<span style="margin: auto 10px;">'.$i.'</span>';
                  }else if($i <= $page || count($result) == IMG_PER_PAGE){
                    echo '<a href="list.php?page='.$i.'" class="button hidden-xs">'.$i.'</a>';
                  }
                  echo '</li>';
                }
                if(count($result) == IMG_PER_PAGE){
                  echo '<li><a href="list.php?page='.($page + 2).'" class="button">下一頁</a></li>';
                }
                ?>
							</ul>
						</div>
					</section>

<?php include 'inc/footer.php' ?>
