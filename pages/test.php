<?php

if ($request_args[0] == "clear") {
	session_unset();
	echo "Session cleared!";
}

echo str_pad(rand(0,9999),4,"0",STR_PAD_LEFT);

?>