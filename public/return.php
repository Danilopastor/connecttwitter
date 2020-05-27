<?php
require '../logic/verifySession.php';
require '../logic/createToken.php';

if (isset($_GET['oauth_verifier'])) {
    // verify the token
    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    unset($_SESSION['oauth_verify']);

  
    // get the access token
    $reply = $cb->oauth_accessToken([
      'oauth_verifier' => $_GET['oauth_verifier']
    ]);
  
    // store the token (which is different from the request token!)
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
    $_SESSION['authorization'] = true;
    $tokenFile = '{
      "screen_name" : "'.$reply->screen_name .'",
      "crendencials" : '.json_encode($reply).'
    }';
    $token = new createToken();
    $yourtoken = $token->get_token();
    $token_dir = '../tokens/';
    if(!is_dir(token_dir)) mkdir($token_dir,0777,TRUE);
    file_put_contents('../tokens/'. $yourtoken .'.json',$tokenFile);

    header('Location: '.$data->application_uri.'?token='.$yourtoken);
  }

?>