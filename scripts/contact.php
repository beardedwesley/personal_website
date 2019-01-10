<html lang="en">
<head>
	<title>Wesley Stevens</title>
	<link rel="stylesheet" type="text/css" href="/styles/main.css" />
	<meta charset="utf-8">
	<meta name="author" content="Wesley Stevens">
	<script type="text/javascript">function formReset(){window.location.replace("/pages/contact.html");}</script>
</head>
<body style="background-image: url(/images/phone1080.jpeg)">
	<?php 

	//Variable definitions
	$firstName = $lastName = $email =$cCode = $phone = $errors = $oMessage = "";
	$myEmail = "wesley@wesleystevens.tech";
	$mailSubject = "New Contact Me Form Submission";

	//Function definitions
	function inputTester($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//Main process
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$firstName = inputTester($_POST["firstName"]);
		$lastName = inputTester($_POST["lastName"]);
		$email = inputTester($_POST["eMail"]);
		if (!preg_match("/ ^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email)) //Authenticate email format
		{
	    	$errors .= "\n Error: Invalid email address.";
		}
		$cCode = inputTester($_POST["countryCodes"]);
		$phone = inputTester($_POST["telePhone"]);
		$oMessage = inputTester($_POST["message"]);

		if (!empty($phone)){
			$message .= "Message from $firstName $lastName Phone: $cCode $phone\n\n";
		}
		else{
			$message .= "Message from $firstName $lastName\n\n";
		}
		$message .= wordwrap($oMessage, 70);
	}
	
	$headers = "From: bot@wesleystevens.tech\r\n";
	$headers .= "Reply-To: $email\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	if ($errors == "") {
		mail($myEmail, $mailSubject, $message, $headers);
	}
	else {
		print($errors);
	}

	?>

	<header>
		<h1>Wesley Stevens</h1>
	</header>

	<nav>
		<h3 class="nav">Navigation</h3>
		<ul class="nav">
			<li><a class="nav" href="/index.html">Home</a></li>
			<li><a class="nav" href="/pages/resume.html">R&eacute;sum&eacute;</a></li>
			<li><a class="nav" href="/pages/contact.html">Contact Me</a></li>
		</ul>
	</nav>

	<article>
		<h2>Contact Me</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Name:
			<input type="text" name="firstName" placeholder="First" required="required" value="<?php echo $firstName ?>">*
			<input type="text" name="lastName" placeholder="Last" required="required" value="<?php echo $lastName ?>">*<br>

			Email:
			<input type="email" name="eMail" placeholder="username@domain" required="required" value="<?php echo $email ?>">*<br>

			Telephone:
			<select name="countryCodes" style="width: 75px" value="<?php echo $cCode ?>">
				<option value="+1" selected="selected">+1</option>
				<option value="+44">+44</option>
				<option value="+52">+52</option>
			</select>
			<input type="tel" name="telePhone" placeholder="(xxx) xxx-xxxx" value="<?php echo $phone ?>"><br>

			Message:*<br>
			<textarea name="message" placeholder="Type your message here..." required="required"><?php echo $message ?></textarea><br>

			<button type="button" onclick="formReset()" style="padding: 10px; margin: 10px;">Reset</button>
			<input type="submit" name="submit" disabled="disabled">
		</form>
		<h2>Message Sent!</h2>
		<p>
			*required
		</p>
	</article>

	<footer>
	</footer>
</body>


</html>