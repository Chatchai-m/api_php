<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('localhost', 'food', '990110?', "food");
// $link = mysqli_connect('localhost', 'root', '', "rv");
if (!$link) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  
  exit;
}

// $result = mysqli_query($link, "SELECT * FROM job WHERE id = 140");
// $row=mysqli_fetch_assoc($result);

// print_r($row);
// exit;

if($_POST)
{
  if($_POST['token'])
  {
    $rs = [
      'status' => true
    ];

    $token = $_POST['token'];
		$result = mysqli_query($link, "SELECT * FROM labhoon_user WHERE token = '$token'");

    $row=mysqli_fetch_assoc($result);
    if($row)
    {
      if( 
        $row['token'] < date('Y-m-d H:i:s')
      )
      {
        $rs = [
          'status' => false
        ];
      }
    }


    echo json_encode($rs);
    
    exit;
  }
}
echo "Hello world";

?>