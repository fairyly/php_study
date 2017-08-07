<?php
error_reporting(0);
require_once('bookmark_fns.php');

session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

do_html_header('login out');

if (!empty($old_user)) {
	# code...
	if ($result_dest) {
		# code...
		echo "login out";
		do_html_url('login.html','login');
	} else {
		echo 'could not log out';
	}
} else {
	echo "you not logged in";
	do_html_url('login.html','login');
}

do_html_footer();
?>