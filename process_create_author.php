<?php
//var_dump($_POST);

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");

$filtered = array(
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
  INSERT INTO author
    (name, profile)
    VALUES(
      '{$filtered['name']}',
      '{$filtered['profile']}'
    )
";

$result = mysqli_query($conn, $sql);
if($result === false){
  // sql 에러 확인
  echo "저장하는 과정에 문제가 생겼습니다. 관리자에게 문의해주세요.";
  error_log(mysqli_error($conn));
}
else{
  header('Location: author.php');
  //echo '성공했습니다. <a href="author.php"><돌아가기</a>';
}
?>
