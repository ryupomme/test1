<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "
    DELETE
      FROM topic
      WHERE author_id = {$filtered['id']}
";
mysqli_query($conn, $sql);

$sql = "
    DELETE
      FROM author
      WHERE id = {$filtered['id']}
";

$result = mysqli_query($conn, $sql);
if($result === false){
  // sql 에러 확인
  echo "삭제하는 과정에 문제가 생겼습니다. 관리자에게 문의해주세요.";
  error_log(mysqli_error($conn));
}
else{
  header('Location: author.php');
}
//header('Location: /index.php?');
?>