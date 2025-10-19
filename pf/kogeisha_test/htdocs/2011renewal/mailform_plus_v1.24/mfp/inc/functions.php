<?php
function agent(){
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match("/^DoCoMo\/[12]\.0/i", $userAgent)) {
		return 'i';
	} elseif(preg_match("/^(J\-PHONE|Vodafone|MOT\-[CV]980|SoftBank)\//i", $userAgent)) {
		return 's';
	} elseif(preg_match("/^KDDI\-/i", $userAgent) || preg_match("/UP\.Browser/i", $userAgent)) {
		return 'e';
	} elseif(preg_match("/^PDXGW/i", $userAgent) || preg_match("/(DDIPOCKET|WILLCOM);/i", $userAgent)) {
		return 'w';
	} elseif(preg_match("/^L\-mode/i", $userAgent)) {
		return 'i';
	} elseif(preg_match("/Windows CE/i", $userAgent) || preg_match("/WinCE/i", $userAgent)) {
		return 'wm';
	} else {
		return 'p';
	}
}

function ldelim() {
	return '-_,';
}
function rdelim() {
	return '+/=';
}

function h($str) {
	if(is_array($str)) {
		return array_map('h', $str);
	}
	return htmlspecialchars($str);
}

function stripslashes_deep($str) {
	$str = is_array($str) ? array_map('stripslashes_deep', $str) : stripslashes($str);
	return $str;
}

function formation($code, $str = false) {
	if($str) {
		return base64_decode(strtr($code, ldelim(), rdelim()));
	} else {
		eval(base64_decode(strtr($code, ldelim(), rdelim())));
	}
}

function inArray($value, $array) {
	if(!is_array($array)) return false;
	if(in_array($value, $array)) {
		return true;
	}
}
	
function validate($key, $str) {
	mb_regex_encoding('UTF-8');
	if($str == '' && $key != 'requires') return false;
	switch($key) {
	case 'requires':
		if(!isset($str) || $str == '') {
			return _ERROR_NULL;
		}
		break;
	case 'email':
		if(!preg_match("/^((\"[^\"\f\n\r\t\v\b]+\")|([\w\!\#\$\%\&\'\*\+\-\~\/\^\`\|\{\}]+(\.[\w\!\#\$\%\&\'\*\+\-\~\/\^\`\|\{\}]+)*))@((\[(((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9])))\])|(((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9]))\.((25[0-5])|(2[0-4][0-9])|([0-1]?[0-9]?[0-9])))|((([A-Za-z0-9\-])+\.)+[A-Za-z\-]+))$/", $str)) {
			return _ERROR_EMAIL;
		}
		$arr = split("@", $str);
		$mxhosts = array();
		if(getmxrr($arr[1], $mxhosts) == false) {
			return _ERROR_EMAIL;
		}
		break;
	case 'url':
		if(!preg_match('/^(https?|ftp):\/\/[\w\+\$\;\?\-\/\.%,!#~*:@&=]+$/', $str)) {
			return _ERROR_URL;
		}
		break;
	case 'zipcode':
		$str = preg_replace('(-|～)', '', $str);
		if(!preg_match('/^[0-9]{7}$/', $str)) {
			return _ERROR_ZIP;
		}
		break;
	case 'telephone':
		$str = preg_replace('(-|～)', '', $str);
		if(!preg_match('/^[0-9]{10,11}$/', $str)) {
			return _ERROR_TELEPHONE;
		}
		break;
	case 'japanese':
		if(mb_detect_encoding($str) == 'ASCII') {
			return _ERROR_JAPANESE;
		}
		break;
	case 'hiragana':
		if(!preg_match("/^[ぁ-ん]+$/u", $str)) {
			return _ERROR_HIRAGANA;
		}
		break;
	case 'katakana':
		if(!preg_match("/^[ァ-ヶー]+$/u", $str)) {
			return _ERROR_KATAKANA;
		}
		break;
	case 'numeric':
		if(!preg_match("/^[0-9]+$/", $str)) {
			return _ERROR_NUMERIC;
		}
		break;
	case 'alnum':
		if(!preg_match("/^[a-zA-Z0-9]+$/", $str)) {
			return _ERROR_ALNUM;
		}
		break;
	case 'alphabet':
		if(!preg_match("/^[a-zA-Z]+$/", $str)) {
			return _ERROR_ALPHABET;
		}
		break;
	case 'host':
		if(BAD_HOST) {
			foreach(explode(',', BAD_HOST) as $badHost) {
				if(ereg($badHost, gethostbyaddr($_SERVER['REMOTE_ADDR']))) {
					return _ERROR_HOST;
				}
			}
		}
		break;
	case 'words':
		if(BAD_WORDS) {
			foreach(explode(',', BAD_WORDS) as $badwords) {
				if(ereg($badwords, $str)) {
					return _ERROR_WORD;
				}
			}
		}
	}
}
?>