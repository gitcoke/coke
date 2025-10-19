<?php
/* 
+----------------------------------------------------------------------+
| Script name : config.inc.php                                         |
| Version     : 1.24                                                   |
| Last Build  : 07/11/2010                                             |
| Description : Config file for Maiform+ Version:1.24                  |
+----------------------------------------------------------------------+
| Copyright (c) XTREC & XTROCK                                         |
| http://xtrock.com/                                                   |
| http://www.xtrec.com/                                                |
+----------------------------------------------------------------------+
| License                                                              |
| http://www.gnu.org/copyleft/lesser.html LGPL                         |
+----------------------------------------------------------------------+
| Authors: HISABO <info@xtrock.com>                                    |
+----------------------------------------------------------------------+
*/
define("SYSTEM_ROOT", dirname(__FILE__) . "/");
define("DATE_FORMAT", 'Y年m月d日 H:i:s');

//Setting of prohibition words and phrases.
define("BAD_WORDS", 'sex');

//Mail Sending prohibition host setting.
define("BAD_HOST", '');

include(SYSTEM_ROOT. 'inc/functions.php');
include(SYSTEM_ROOT. 'lib/class.mailform.php');

$carrier = agent();

error_reporting(E_ALL ^ E_NOTICE);

// ini
ini_set("default_charset", "UTF-8");
ini_set("mbstring.language", "Japanese");
ini_set("mbstring.internal_encoding", "UTF-8");
ini_set("mbstring.http_input", "pass");
ini_set("mbstring.http_output", "pass");
ini_set("mbstring.encoding_translation", "off");
ini_set("mbstring.substitute_character", "none");

//session
if($carrier != 'p') {
	ini_set('session.use_cookies', '0');
	ini_set('session.use_only_cookies', 0);
	ini_set('session.use_trans_sid', 1);
} else {
	ini_set('session.use_cookies', 1);
	ini_set('session.use_only_cookies', 1);
	ini_set('session.use_trans_sid', 0);
}
ini_set('session.gc_maxlifetime', 1800);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

session_save_path(SYSTEM_ROOT . 'tmp');
session_cache_limiter(' private_no_expire');
session_start();
$old_session_id = session_id(); 
session_regenerate_id(); 
unlink(session_save_path() . '/sess_' . $old_session_id);
?>