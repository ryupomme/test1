<?php
file_put_contents('data/'.$_POST['title'], $_POST['description']);

//redirection 기능
header('Location: /index.php?id='.$_POST['title']);
?>
