<?php
require '../logic/verifySession.php';
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $token = '../tokens/'.$_SERVER['HTTP_TOKEN'].'.json';
    if(!file_exists($token)){
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode("{'Error': 'Não autorizado!'}");
        exit;
    }
    
    $data_api = json_decode(file_get_contents('php://input'), true);
    if(isset($data_api['type'])){
        $user_data = json_decode(file_get_contents($token));
        
        $cb->setToken(
            $user_data->crendencials->oauth_token,
            $user_data->crendencials->oauth_token_secret
        );

        if($data_api['type'] == 'text') require_once('../logic/update_status/text.php');
        if($data_api['type'] == 'image') require_once('../logic/update_status/image.php');
    }else{
        header("HTTP/1.1 406 Not Acceptable");
        echo json_encode("{'Error': 'Falta algum parametro!'}");
    }
}else{
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode("{'Error': 'Metodo Incompativel!'}");
}
?>