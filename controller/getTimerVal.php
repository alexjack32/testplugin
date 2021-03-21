<?php
  $dir= plugin_dir_path(__DIR__);
  include $dir . '/model/ReplyJson.php';

  $sendTime = new ReplyJson();


  try
  {
    $current_time = current_time('mysql');
    $username = $_POST['cur_name'];
    $timeHour = $_POST['cur_hour'];
    $timeMin = $_POST['cur_min'];
    $timeSec = $_POST['cur_sec'];
    //$timeGdate = $_POST['gdate'];

    $sendTime->msgType = "1";
    $sendTime->msgStr = 'username: '. $username .' hour: '. $timeHour .' min: '. $timeMin.' sec: ' . $timeSec .' time: '. $current_time;
  }
  catch(Exception $ex)
  {
    $sendTime->msgType = "-1";
    $sendTime->msgStr = "Error:" . $ex->getMessage();
  }
  echo json_encode($sendTime);
?>