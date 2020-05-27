<?php

require 'codebird.php';
session_start();

$file_data = '../data.json';

if(!file_exists($file_data)){
    header('Location: '. $_SERVER["REQUEST_URI"] .'install.php');
    exit;
}
$data = json_decode(file_get_contents($file_data));

\Codebird\Codebird::setConsumerKey($data->apiKey, $data->secretKey);
$cb = \Codebird\Codebird::getInstance();

?>