<?php
class Bitly{
	private $token;
	
	public function __construct($token){
		$this->token = $token;
	}
	public function shorten($url){
		
		       $parameters = array(
				  'long_url' => $url
			   );
		
		       //header('Content-Type: application/json'); // Specify the type of data
			   $ch = curl_init("https://api-ssl.bitly.com/v4/shorten"); // Initialise cURL
			   $post = json_encode($parameters); // Encode the data array into a JSON string
			   $authorization = "Authorization: Bearer ".$this->token; // Prepare the authorisation token
               curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
               curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
               curl_setopt($ch,CURLOPT_CAINFO,__DIR__ . '/cacert.pem');
               curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
			   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
			   curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
			   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
			   $result = curl_exec($ch); // Execute the cURL statement
			   curl_close($ch); // Close the cURL connection
			   $result = json_decode($result); // Return the received data
			   
               return $result;
	}
}