<script src="/scripts/mainFunction.js"></script>
<?php 

	//Variable definitions
	$firstName = $lastName = $eMail = $cCode = $phone = $errors = $oMessage = $message = "";
	$myEmail = "wesley@wesleystevens.tech";
	$mailSubject = "New Contact Me Form Submission";
	
	//Function definitions
	function inputTester($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function createHeader($data) {
		$headers = "From: bot@wesleystevens.tech\r\n";
		$headers .= "Reply-To: $data\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8\r\n";

		return $headers;
	}

	function isBlank($data) {
	    if (is_null($data)) {
	        return true;
        } elseif ($data == "") {
	        return true;
        } else {
	        return false;
        }
    }

	//Main process
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$firstName = inputTester($_POST["firstName"]);
		$lastName = inputTester($_POST["lastName"]);
	 	$eMail = inputTester($_POST["eMail"]);
		if (!preg_match("/ [_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $eMail))
		{
	    	$errors .= "\n Error: Invalid email address.";
		}
		$cCode = inputTester($_POST["countryCodes"]);
		$phone = inputTester($_POST["telePhone"]);
		$oMessage = inputTester($_POST["message"]);
		if (isBlank($firstName) || isBlank($lastName) || isBlank($eMail) || isBlank($oMessage)) {
		    return;
        }

		$message = "Message from $firstName $lastName\r\n";
		if (!empty($phone)){
			$message .= "Phone: $cCode $phone\r\n";
		}

		$message .= "\r\n\r\n";
		$message .= wordwrap($oMessage, 80);
	}
	
	mail($myEmail, $mailSubject, $message, createHeader($eMail));
	
	print($errors);
	

?>
<script>window.location.replace("/pages/contactThanks.html")</script>