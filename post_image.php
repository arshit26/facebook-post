<?php
require_once 'StringToImage.php';
require_once("config.php");
require_once("fb_sdk/src/facebook.php"); // Including the Facebook Class from the Facebook SDK

$quote= $_REQUEST['quote']; // getting the Quote from the ajax request

// To create an Image from the user entered Text
			//include StringToImage class
				//create img object
				$img = new StringToImage();
				//create image from text
				$text = $_REQUEST['quote'];
				$img->createImage($text);
				//display image
				
				$img->saveImage();
		/***********************************************************************************************/
		
		
		/***********************************************************************************************/
						// To post on Facebook
			
			$con = array();
				$con['appId'] = $config['appId'];
				$con['secret'] = $config['secret'];
				$fb = new Facebook($con); // Creating a new object of class facebook
				$quote = $_REQUEST['quote'];
				$params = array(
				  // this is the main access token of the Testing Page
				  "access_token" => $config['access_token'],
				  "url" =>"http://www.mydakiya.in/facebook-post-master/fb_post/images/text-image.png", // It is source of the image to be uploaded
				  "caption" => $quote // It is the message to be posted along with the image
				);
				header('Content-Type: application/json');
				$resposne = array();
				try {
				  $ret = $fb->api('/me/photos', 'POST', $params); // calling the Fb API
				  $response["code"]=200;
				  $response["message"] = 'Successfully posted to Facebook Personal Profile';
				} catch(Exception $e) {
				$response["code"]=400;
				 $response["message"]= $e->getMessage(); // It will print the error if any on the browser
				}
echo json_encode($response);

?>