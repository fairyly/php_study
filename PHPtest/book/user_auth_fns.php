<?php

function login($username, $password) {
	$conn = db_connect();
	$result = $conn->query("select * from user where username='".$username."' and passwd = sha1('".$password."')");

	if(!$result) {
		throw new Exception('could not log you in!');
	}
	if($result->num_rows > 0) {
		return true;
	} else {
		throw new Exception('could not log you in!');
	}
}

function check_valid_user() {
	if (isset($_SESSION['valid_user'])) {
		# code...
		echo "logged in as ".$_SESSION['valid_user']."<br/>";
	} else {
		do_html_header('problem:');
		do_html_url('login.php','login');
		do_html_footer();
	}
}

function register($username, $email, $password) {
	$conn = db_connect();
	$result = $conn->query("select * from user where username='".$username."'");

	if(!$result) {
		throw new Exception('could not execute query!');
	}
	if($result->num_rows > 0) {
		throw new Exception('that username is taken!');
	}

	$result = $conn->query("insert into user values('".$username."',shal('".$password."'),'".$email."')");
	if(!$result) {
		throw new Exception('could not register!');
	}
	return true;
}