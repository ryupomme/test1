<?php
$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';

while($row = mysqli_fetch_array($result)){
  //<li><a href="index.php?id=19">MySQL</a></li>
  //$list = $list."<li>{$row['title']}</li>";

  //기존 escaping 이전
  //$list = $list."<li><a
  //href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  //escaping 이후
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list."<li><a
  href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);
$update_link = '';
if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $article['title']=htmlspecialchars($row['title']);
  $article['description']=htmlspecialchars($row['description']);

  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>

    <input id="night_day" type="button" value="night" onclick="
    if(document.querySelector('#night_day').value === 'night'){
      document.querySelector('body').style.backgroundColor = 'black';
      document.querySelector('body').style.color = 'white';
      document.querySelector('#night_day').value = 'day';
    } else {
      document.querySelector('body').style.backgroundColor = 'white';
      document.querySelector('body').style.color = 'black';
      document.querySelector('#night_day').value = 'night';
    }
  ">

    <ol>
      <?=$list?>
    </ol>
    <form action="process_update.php" method="POST">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <p>
        <input type="text" name="title" placeholder="title"
        value="<?=$article['title']?>">
      </p>
      <p>
        <textarea name="description" placeholder="description"  rows="8" cols="80"><?=$article['description']?></textarea>
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
  </body>
</html>
