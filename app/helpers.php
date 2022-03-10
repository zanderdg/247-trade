<?php

if (!function_exists('isMobileDevice')) {
	/**
	* Checks for mobile device
	*
	* @return string
	*/
	function isMobileDevice()
	{
	    $cases = "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone";
	    $cases .= "|pie|tablet|up\.browser|up\.link|webos|wos)/i";
	    return preg_match($cases, $_SERVER["HTTP_USER_AGENT"]);
	}
}