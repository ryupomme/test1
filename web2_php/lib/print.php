<?php
function print_title(){
    if(isset($_GET['id'])){
      //echo $_GET['id'];
      echo htmlspecialchars($_GET['id']);
    }
    else {
      // code...
      echo "Welcome CODE";
    }
}

function print_description(){

  if(isset($_GET['id'])){
    ////basename -> php에서 파일의 경로에서 파일 명만 추출
    //echo $_GET['id'];
    //echo "<br>";
    //echo basename("data/".$_GET['id']);
    //echo "<br>";
    ////끝

    $basename = basename($_GET['id']);
    //echo  file_get_contents("data/".$_GET['id']);//보안 이슈 있음
    echo htmlspecialchars(file_get_contents("data/".$basename));//보안 이슈 있음
  }
  else {
    // code...
    echo "Hello PHP";
  }
}

function print_list(){
//1.data 디렉토리에 있는 파일의 목록 가져옴
//2. 파일 목록 하나 하나를 li와 a태그로 만들어라
$list = scandir('data');//data 또는 ./data
//<var_dump($list);
$list_count = 0;
while($list_count < count($list))
{
  /*
  if($list[$list_count] != '.')
  {
    if($list[$list_count] !='..'){
      ?>
      <li><a href="index.php?id=<?=$list[$list_count]?>">
        <?=$list[$list_count]?>
      </a></li>
      <?php
    }
  }*/
  $title = htmlspecialchars($list[$list_count]);
  if($list[$list_count] != '.' && $list[$list_count] != '..')
  {
    ?>
    <li><a href="index.php?id=<?=$title?>">
      <?=$title?>
    </a></li>
    <?php
  }
  $list_count = $list_count + 1;
}
}
 ?>
