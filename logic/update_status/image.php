<?php
  require '../logic/bitly.php';
  require '../logic/GetTags.php';
  if($data_api['short_url']){
      $bitly = new Bitly($data->token_bitly);
      $tag = new GetTags();
      $url = $bitly->shorten($data_api['short_url']);
      $image = $tag->get($data_api['short_url'])['og:image'];
      $title = $tag->get($data_api['short_url'])['og:title'];
  
  $reply = $cb->media_upload(array(
    'media' => $image
  ));

  $mediaID = $reply->media_id_string;

  $params = array(
    'status' =>  $title.' '.$url->link,
    'media_ids' => $mediaID
   );

  $reply = $cb->statuses_update($params);

  echo json_encode($reply);
}
?>