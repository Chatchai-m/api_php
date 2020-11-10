<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('localhost', 'food', '990110?', "food");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8"))
{
  printf("Error loading character set utf8: %s\n", $link->error);
  exit();
}

if($_POST)
{
  if($_POST['email'] && $_POST['password'])
  {
    $data = [
      'status' => false,
      'token' => ''
    ];
    switch ($_POST['email']) {
      case 'mos@gmail.com':
        $data = [
          'email' => 'mos@gmail.com',
          'token' => 'mos1234',
          'status' => true,
        ];
        break;
      case 'max@gmail.com':
        $data = [
          'email' => 'max@gmail.com',
          'token' => 'max1234',
          'status' => true,
        ];
        break;
      case 'milk@gmail.com':
        $data = [
          'email' => 'milk@gmail.com',
          'token' => 'milk1234',
          'status' => true,
        ];
        break;
    }
    
    echo json_encode($data);
    exit;
  }
}
echo "Hello world";

mysqli_close($link);
?>