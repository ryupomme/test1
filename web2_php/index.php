<?php
require_once('lib/print.php');
require_once('view/top.php');
?>
   <a href="create.php">create</a>
   <?php
    if(isset($_GET['id']))
    {
    ?>
    <!--
    <a href="update.php?id=<?php echo $_GET['id']; ?>">update</a>
    -->
    <a href="update.php?id=<?=$_GET['id']?>">update</a>

    <!--//get 방식은 좋지 않음. 링크로 구현 시 링크로 삭제가 될 수 있음
    <a href="delete_process.php?id=<?//=$_GET['id']?>">delete</a>-->
    <form action="delete_process.php" method="post">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <input type="submit" value="delete">
    </form>
    <?php
    }
    ?>
   <!-- 구현 완료-->
    <h2>
      <?php
      print_title();
      ?>
    </h2>
    <?php
    print_description();
   ?>
<?php
require('view/bottom.php')
?>
