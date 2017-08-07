<?php 

require_once('bookmark_fns.php');

$email = $_POST['email'];
$username = $POST['username'];
$passwd = $POST['passwd'];
$passwd2 = $POST['passwd2'];

session_start();

try{
	if (!filled_out($POST)) {
		# code...
		throw new Exception("you have not filled the form");
		
	}
	if (!valid_email($email)) {
		# code...
		throw new Exception("email is not a valid address");
		
	}
	if (passwd != passwd2) {
		# code...
		throw new Exception("password do not match");
		
	}

	if ((strlen(passwd) < 6) || (strlen(passwd) > 16)) {
		# code...
		throw new Exception("password must be between 6 and 16 characters");
		
	}

	register($username,$email,$passwd);

	do_html_header('register successful');

	do_html_url('member.php','go to members page');

	do_html_footer();
}
catch (Exception $e){
	do_html_header();
	echo $e->getMessage;
	do_html_footer();
	exit;
}
?>
