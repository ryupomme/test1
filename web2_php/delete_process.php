<?php
////unlink('data/'.$_GET['id']);
//unlink('data/'.$_POST['id']);
unlink('data/'.basename($_POST['id']));
header('Location: /index.php?');
?>
