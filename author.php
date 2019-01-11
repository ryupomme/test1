<?php
$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");
//$sql = "SELECT id, name, profile from author";
//$sql = "SELECT * from author";
//$result = mysqli_fetch_array($conn, $sql);


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
    <p><a href="index.php">topic</a></p>
    <table border="1">
      <tr>
        <td>id</td><td>name</td><td>profile</td><td></td><td></td>
        <?php
        $sql = "SELECT * from author";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result)){
          $filtered = array(
            'id'=>htmlspecialchars($row['id']),
            'name'=>htmlspecialchars($row['name']),
            'profile'=>htmlspecialchars($row['profile']),
          );
          ?>
          <tr>
            <td><?=$filtered['id']?></td>
            <td><?=$filtered['name']?></td>
            <td><?=$filtered['profile']?></td>
            <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
            <td>
              <form action = "process_delete_author.php" method="post" onsubmit="if(!confirm('sure?')){return false;}">
                <input type="hidden" name="id" value="<?=$filtered['id']?>">
                <input type="submit" value="delete">
              </form>
            </td>
          </tr>
          <?php
        }
         ?>
      </tr>
    </table>
    <?php
    $escaped = array(
      'name'=>'',
      'profile'=>''
    );
    $label_submit = 'Create author';
    $form_action = 'process_create_author.php';
    $form_id = '';
    if(isset($_GET['id'])){
      $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
      settype($filtered_id, 'integer');
      $sql= "SELECT * FROM author WHERE id = {$filtered_id}";
      $result = mysqli_query($conn, $sql);

      $row=mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['profile'] = htmlspecialchars($row['profile']);

      $label_submit = 'Update author';
      $form_action = 'process_update_author.php';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'"';
    }
    ?>
    <form class="" action="<?=$form_action?>" method="post">
      <?=$form_id?>
      <p><input type="text" name="name" value="<?=$escaped['name']?>" placeholder="name"></p>
      <p><textarea name="profile" placeholder="profile"><?=$escaped['profile']?></textarea></p>
      <p><input type="submit" value="<?=$label_submit?>"></p>
    </form>
  </body>
</html>
