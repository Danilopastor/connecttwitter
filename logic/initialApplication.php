<?php
class initialApplication{
    private $data_file = '../data.json';
    private $application_uri;
    private $apiKey;
    private $secretKey;
    private $callbackLink;
    private $token_bitly;
    private $content;


    public function run()
    {
        if(!$this->verifyFile()){
            
            if(isset($_POST['application_uri'])){
                $this->application_uri = $_POST['application_uri'];
                $this->apiKey          = $_POST['apiKey'];
                $this->secretKey       = $_POST['secretKey'];
                $this->callbackLink    = $_POST['callbackLink'];
                $this->token_bitly     = $_POST['token_bitly'];

                $this->content = array(
                    "application_uri" => $this->application_uri,
                    "apiKey"          => $this->apiKey,
                    "secretKey"       => $this->secretKey,
                    "callbackLink"    => $this->callbackLink,
                    "token_bitly"     => $this->token_bitly,
                );
                file_put_contents($this->data_file,json_encode($this->content));

                header('Location:'.$this->application_uri );
            }

            return true;
        }
    }
    private function verifyFile()
    {
        if(file_exists($this->data_file)){
            return true;
        }
    }
}
?>