<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Array</title>
  </head>
  <body>
    <h1>Array</h1>
    <?php
    $friends = array('pomme', 'null', 'someone');
    echo $friends[1].'<br>';
    echo $friends[2].'<br>';
    var_dump(count($friends));
    array_push($friends, 'anyone');
    var_dump($friends);
     ?>
  </body>
</html>
