<?php
  $reply = $cb->statuses_update('status='.$data_api['message']);
  echo json_encode($reply)
?>