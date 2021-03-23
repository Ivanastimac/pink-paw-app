<?php
	session_start();
	if (isset($_SESSION['login_user'])) {
        session_destroy();
        echo "<script>alert('You have successfully logged out!'); window.location.href = 'login.html'; </script>";
	}
?>