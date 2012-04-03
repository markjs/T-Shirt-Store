<?php

if ($request_args[0] == "clear") {
	session_unset();
	echo "Session cleared!";
}

?>

<input type="number">