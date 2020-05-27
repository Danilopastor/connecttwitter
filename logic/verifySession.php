<?php

require 'codebird.php';
session_start();

$data = json_decode(file_get_contents('../data.json'));

\Codebird\Codebird::setConsumerKey($data->apiKey, $data->secretKey);
$cb = \Codebird\Codebird::getInstance();

?>