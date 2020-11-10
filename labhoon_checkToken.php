<?php
header("content-type:text/javascript;charset=utf-8");

date_default_timezone_set("Asia/Bangkok");
if(date('Y-m-d H:i:s') > '2020-11-10 21:41:00')
{
  echo 1;
}

exit;
if($_POST)
{
  if($_POST['token'])
  {
    $rs = [
      'status' => true
    ];
    if( 
      ( date('Y-m-d H:i:s') > '2020-11-10 21:48:00') 
      &&
      $_POST['token'] == 'mos@gmail.com'
    )
    {
      $rs = [
        'status' => false
      ];
    }

    echo json_encode($rs);
    
    exit;
  }
}
echo "Hello world";

?>