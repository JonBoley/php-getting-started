<?php
function VerifyNoCaptcha($secret, $response) // to validate the no recaptcha
{
    $parameters = array(
  'secret' => $secret,
  'response' => $response
    );

    $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($parameters));
    $response = curl_exec($curl);
    curl_close($curl);

    if (($result = json_decode($response)) == null)
    {
  return false;
    }

    return $result->success;
}

$secret = '6LcmYd0SAAAAAE1uUefJXZc0OKIc5Va7-t6Vmy4l';
$response = $_POST['g-recaptcha-response'];
if (!VerifyNoCaptcha($secret, $response))
{
    // What happens when the CAPTCHA was entered incorrectly
	   die ("The reCAPTCHA wasn't entered correctly. Go back and try it again.");
} else {

   /* check for email injection */
   function IsInjected($str)
   {
       $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );

       $inject = join('|', $injections);
       $inject = "/$inject/i";

       if(preg_match($inject,$str))
       {
         return true;
       }
       else
       {
         return false;
       }
   }

   if( isset($_POST) ){

   	//form validation vars
   	$formok = true;
   	$errors = array();

   	//sumbission data
   	$ipaddress = $_SERVER['REMOTE_ADDR'];
   	date_default_timezone_set('America/Chicago');
   	$date = date('m/d/Y');
   	$time = date('H:i:s');

   	//form data
   	$name = $_POST['name'];
   	$email = $_POST['email'];
   	$telephone = $_POST['telephone'];
   	$enquiry = $_POST['enquiry'];
   	$message = $_POST['message'];

   	//validate form data

   	//validate name is not empty
   	if(empty($name)){
   		$formok = false;
   		$errors[] = "You have not entered a name";
   	}

   	//validate email address is not empty
   	if(empty($email)){
   		$formok = false;
   		$errors[] = "You have not entered an email address";
   	//validate email address is valid
   	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   		$formok = false;
   		$errors[] = "You have not entered a valid email address";
   	}
   	elseif(IsInjected($email)){
   		$formok = false;
   		$errors[] = "You have not entered a valid email address [hacking suspected]";
   	}

   	//validate message is not empty
   	if(empty($message)){
   		$formok = false;
   		$errors[] = "You have not entered a message";
   	}
   	//validate message is greater than 20 charcters
   	elseif(strlen($message) < 20){
   		$formok = false;
   		$errors[] = "Your message must be greater than 20 characters";
   	}

   	//send email if all is ok
   	if($formok){
   		$headers = "From: $name <$email>" . "\r\n";
   		$headers .= "Reply-To: $name <$email>" . "\r\n";
   		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

   		$emailbody = "<p>You have recieved a new message from the contact form on your website.</p>
   					  <p><strong>Name: </strong> {$name} </p>
   					  <p><strong>Email Address: </strong> {$email} </p>
   					  <p><strong>Message: </strong> {$message} </p>
   					  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

   		mail("jdb@jboley.com","Website Contact",$emailbody,$headers);

   	}

   	//what we need to return back to our form
   	$returndata = array(
   		'posted_form_data' => array(
   			'name' => $name,
   			'email' => $email,
   			'telephone' => $telephone,
   			'enquiry' => $enquiry,
   			'message' => $message
   		),
   		'form_ok' => $formok,
   		'errors' => $errors
   	);


   	//if this is not an ajax request
   	if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){
   		//set session variables
   		session_start();
   		$_SESSION['cf_returndata'] = $returndata;

   		//redirect back to form
   		header('location: ' . $_SERVER['HTTP_REFERER']);
   	}
}

 }



?>

