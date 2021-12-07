<script>
createCookie("gfg", 1000, "10");

// Function to create the cookie
function createCookie(name, value, days) {
	var expires;
	
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	}
	else {
		expires = "";
	}
	
	document.cookie = escape(name) + "=" +
		escape(value) + expires + "; path=/";
}

</script>

<?php

/*$money = "<script>document.writeln(money);</script>";
$int = (int)$money;
echo $int;
*/
//$var_value = $_SESSION['price'];

//echo $var_value;
$test = (int)$_COOKIE["gfg"];
echo $test;
echo gettype($test);
?>