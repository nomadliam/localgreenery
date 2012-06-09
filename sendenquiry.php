<?php
include ('lib/autoload.php');

// Check the form has been submitted, die otherwise
if ($_POST['enquirysubmit'] != 'Submit Enquiry') {
	die ("Fill in the form you cunt");
} else {
	$to = 'nomadliam@mash-heads.co.cc';
	$subject = "New enquiry from " . $_SESSION['user']['username'];
	$message = 'New enquiry from ' . $_SESSION['user']['username'] . "\n\n";
	$message .= $_POST['enquiry'];
	$headers = 'From: ' . fromemail;
	if (mail($to, $subject, $message, $headers)) {
		echo 'Mail sent!';
	} else {
		echo 'Failed to send mail!';
	}
}
?>
<br /> <a href="index.php">Go back to homepage</a>
