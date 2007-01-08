<?php
/**
 * Encode email addresses to make it harder for spammers to harvest them.
 *
 * Spam-me-not PHP version by Rolf Offermanns
 * inspired by the Spam-me-not JavaScript by Andreas Neudecker
 *
 * version: 2003-09-28
 *
 * Spam-me-not Javascript Homepage:
 *
 *     http://www.zapyon.de/
 *
 */
	function encodeString ($originalString, $mode = 1) {
		$encodedString = "";
		$nowCodeString = "";
		$randomNumber = -1;

		$originalLength = strlen($originalString);
		$encodeMode = $mode;
		
		for ( $i = 0; $i < $originalLength; $i++) {
			if ($mode == 3) $encodeMode = rand(1,2);
			switch ($encodeMode) {
				case 1: // Decimal code
					$nowCodeString = "&#" . ord($originalString[$i]) . ";";
					break;
				case 2: // Hexadecimal code
					$nowCodeString = "&#x" . dechex(ord($originalString[$i])) . ";";
					break;
				default:
					return "ERROR: wrong encoding mode.";
			}
			$encodedString .= $nowCodeString;
		}
		return $encodedString;
	}

	function email($email, $mode = 1) {
		$obfuscatedEMail = encodeString($email, $mode);
		return "<a href=\"mailto:$obfuscatedEMail\">$obfuscatedEMail</a>";
	}
  
  ?>