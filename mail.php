<?php

  if (isset($_POST['submit'])) {
  	
  	$first_name = $_POST['first_name'];
  	$last_name = $_POST['last_name'];
  	$email = $_POST['email'];
  	$phone = $_POST['phone'];
  	$number = $_POST['number'];
  	$destination = $_POST['destination'];
  	$start_date = $_POST['start_date'];
  	$end_date = $_POST['end_date'];
  	$message = $_POST['message'];

  	$raanvara_email = 'enquiry@raanvara.com';
  	$raanvara_email1 = 'abhartu@gmail.com';

  	$errorEmpty = false;
  	$errorEmail = false;
  	$errorStartDate = false;
  	$errorEndDate = false;
  	$errorNumber = false;
  	$errorMessage = false;
  	$errorPhone = false;

  	if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($number) || empty($destination) || empty($start_date) || empty($end_date) || empty($message)) {
  		
  		echo "<span class='error'>Please fill all fields!</span>";
  		$errorEmpty = true;	  	
  	
  	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		
  		echo "<span class='error'>Please enter proper email address!</span>";
  		$errorEmail = true;

  	} elseif ($start_date > $end_date || $start_date <= date("Y-m-d")) {

  		echo "<span class='error'>Please enter proper start date!</span>";
  		$errorStartDate = true;

  	} elseif ($number < 10 || $number > 60) {

  		echo "<span class='error'>Please enter number of people from 10 to 60!</span>";
  		$errorNumber = true;

  	} elseif (strlen($message) < 50) {
  		
  		echo "<span class='error'>Please enter a proper message!</span>";
  		$errorMessage = true;

  	} elseif (strlen($phone) < 10) {
  		
  		echo "<span class='error'>Please enter a proper phone!</span>".strlen($phone);
  		$errorPhone = true;

  	} else {

  		$subject = "Trip Enquiry (Raanvara Tours)";
  		$email_message = '<html>
			<head>
				<title>Trip Enquiry | Raanvara Tours</title>
				<link rel="stylesheet" type="text/css" href="email_admin.css">
				<link href="https://fonts.googleapis.com/css?family=Mada:400,700" rel="stylesheet">
			</head>
			<body style="width: 100%;margin: 0;padding: 0;font-family: \'Mada\', sans-serif;">
				<img src="https://s8.postimg.org/51o8ihd45/email_header1.png" class="header" style="width: 100%;">
				<h1 style="font-size: 22px;font-weight: 400;text-align: center;padding: 20px 20px;">Hi! A user just submitted their information on raanvara.com</h1>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">First Name: &nbsp; <span style="font-weight: 400;">'.$first_name.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Last Name: &nbsp; <span style="font-weight: 400;">'.$last_name.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Email: &nbsp; <span style="font-weight: 400;">'.$email.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Phone Number: &nbsp; <span style="font-weight: 400;">'.$phone.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Number of people: &nbsp; <span style="font-weight: 400;">'.$number.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Destination: &nbsp; <span style="font-weight: 400;">'.$destination.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Start Date: &nbsp; <span style="font-weight: 400;">'.$start_date.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">End Date: &nbsp; <span style="font-weight: 400;">'.$end_date.'</span></h2>
				<h2 style="font-size: 18px;font-weight: 700;padding: 4px 30px;text-align: justify;">Message: &nbsp; <span style="font-weight: 400;">'.$message.'</span></h2>
			</body>
			</html>';

  		$email_message1 = '<html>
				<head>
					<title>Trip Enquiry | Raanvara Tours</title>
					<link rel="stylesheet" type="text/css" href="email_user.css">
					<link href="https://fonts.googleapis.com/css?family=Mada:400,700" rel="stylesheet">
				</head>
				<body style="width: 100%;margin: 0;padding: 0;font-family: \'Mada\', sans-serif;text-align: center;">
					<img src="https://s8.postimg.org/7mp7sjv79/email_thumbs.png" class="header" style="width: 100%;max-width: 300px;padding-top: 60px;">
					<h1 style="font-size: 22px;font-weight: 400;padding: 20px 20px;margin-top: -50px;">Hi, '.$first_name.'! Thanks for submitting your message to <span style="font-weight: 700;">Raanvara Tours</span>. Our representatives will get in touch with you within 24 hours.</h1>
					<p style="font-size: 14px;font-weight: 400;color: #909090;letter-spacing: 0.4px;margin-bottom: 20px;">Don\'t want to wait?</p>
					<a href="tel:+917506644977" style="background: linear-gradient(to right,#067fcc,#04d2bd); color: #ffffff;text-transform: uppercase;letter-spacing: 1px;font-weight: 700;font-size: 18px;text-decoration: none;padding: 10px 20px;border-radius: 2px;margin-bottom: 60px;">Give us a call!</a>
				</body>
				</html>';

  		$headers = "From: $email\n";
  		$headers .= "MIME-Version: 1.0\n";
  		$headers .= "Content-type: text/html; charset=iso-8859-1\n";

 		$header1 = "From: raanvara@gmail.com\n";
 		$header1 = "MIME-Version: 1.0\n";
 		$header1 = "Content-type: text/html; charset=iso-8859-1\n";

  		mail($raanvara_email, $subject, $email_message, $headers);

  		mail($email, $subject, $email_message1, $header1);

  		echo "<span class='error'>Mail send!</span>";
  	}
  } else {
  	  	echo "<span class='error'>Some error occured!</span>";
  }
?>

<script>

	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";
	var errorStartDate = "<?php echo $errorStartDate; ?>";
	var errorEndDate = "<?php echo $errorEndDate; ?>";
	var errorPhone = "<?php echo $errorPhone; ?>";
	var errorNumber = "<?php echo $errorNumber; ?>";
	var errorMessage = "<?php echo $errorMessage; ?>";

	if (errorEmpty == false && errorEmail == false && errorStartDate == false && errorEndDate == false && errorPhone == false && errorNumber == false && errorMessage == false) {

		$("#first_name, #last_name, #email, #phone, #number, #destination, #start_date, #end_date, #message").val("");
	}

	$("#submit").prop("disabled", false);

</script>