<?php
session_start();


//文字コード
$charset = "utf-8";


//自動返信用メールアドレス(210行目[mailAdd]で自動入力)
$remailAdd = "";


//フラグ
$errorflg = 0;
$_SESSION['sendflg'] = 0;
if(@$_POST['genzouform'] == "genzouform") $_SESSION['sendflg'] = 1;


//HTMLのエスケープ処理、バックスラッシュ処理

function escString($value) {
	if(get_magic_quotes_gpc() == 1) {
		$var = stripslashes($value);
		return htmlspecialchars($var, ENT_QUOTES);
	} else {
		return htmlspecialchars($value, ENT_QUOTES);
	}
}


//送信ボタンを表示、エラー処理後の全POSTを出力

function submit() {
	if($GLOBALS['errorflg'] == 1) {
		echo $GLOBALS['errorBtn'];
	}
	else {
		$_SESSION['contents'] = $GLOBALS['post'];
		$_SESSION['mailflg'] = 1;
		$_SESSION['remailflg'] = $GLOBALS['remailflg'];
		$_SESSION['remail'] = $GLOBALS['remailAdd'];
		echo $GLOBALS['confirmBtn']."<input type='hidden' value='genzouform' name='genzouform' />";
	}
}


//必須エラー（テキスト入力）

function absErr() {
	$GLOBALS['errorflg'] = 1;
	return "<span style='color:{$GLOBALS['color']};'>{$GLOBALS['absErr']}</span>";
}


//入力エラー

function inputErr() {
	$GLOBALS['errorflg'] = 1;
	return "<span style='padding-left: 15px; color:{$GLOBALS['color']};'>{$GLOBALS['inputErr']}</span>";
}


//メールエラー

function mailErr() {
	$GLOBALS['errorflg'] = 1;
	return "<span style='padding-left: 15px; color:{$GLOBALS['color']};'>{$GLOBALS['mailErr']}</span>";
}


//半角数字エラー

function fontErr() {
	$GLOBALS['errorflg'] = 1;
	return "<span style='padding-left: 15px; color:{$GLOBALS['color']};'>{$GLOBALS['fontErr']}</span>";
}


//確認画面、エラー画面表示

function confirm() {
	foreach($GLOBALS['post'] as $key => $value) {
		$brValue = nl2br($value);
		echo "<tr>\n<th>".$key."</th>\n<td>".$brValue."</td>\n</tr>\n";
	}
}


//名前入力結果を表示

function name($value1="", $value2="", $abs="true") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);

	$str = $post1." ".$post2;
	
	if($post1 == "" && $post2 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else if($post1 == "" || $post2 == "") {
		return $str.inputErr();
	}
	else {
		return $str;
	}
}

//生年月日(日付)を表示

function birthday($value1="", $value2="", $value3="", $abs="false", $sec0="") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);
	$post3 = escString(@$_POST[$value3]);
	
	$str = $sec0.$post1."年".$post2."月".$post3."日";

	if($post1 == "" && $post2 == "" && $post3 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else if($post1 == "" || $post2 == "" || $post3 == "") {
		return $str.inputErr();
	}
	else {
		return $str;
	}
}


//郵便番号入力結果を表示

function postcode($value1="", $value2="", $abs="false") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);

	$str = $post1."-".$post2;

	if($post1 == "" && $post2 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else if($post1 != "" && $post2 != "") {
		if(preg_match("/^[0-9]+$/", $post1) && preg_match("/^[0-9]+$/", $post2)) {
			if(preg_match("/^\d{3}$/", $post1) && preg_match("/^\d{4}$/", $post2)) {
				return $str;
			}
			else {
				return $str.inputErr();
			}
		}
		else {
			return $str.fontErr();
		}			
	}
	else {
		return $str.inputErr();
	}
}


//電話番号入力結果を表示

function tel($value1="", $value2="", $value3="", $abs="false") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);
	$post3 = escString(@$_POST[$value3]);

	$str = $post1."-".$post2."-".$post3;

	if($post1 == "" && $post2 == "" && $post3 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else if($post1 != "" && $post2 != "" && $post3 != "") {
		if(preg_match("/^[0-9]+$/", $post1) && preg_match("/^[0-9]+$/", $post2) && preg_match("/^[0-9]+$/", $post3)) {
			if(preg_match("/^\d{2,4}$/", $post1) && preg_match("/^\d{2,4}$/", $post2) && preg_match("/^\d{3,4}$/", $post3)) {
				return $str;
			}
			else {
				return $str.inputErr();
			}
		}
		else {
			return $str.fontErr();
		}			
	}
	else {
		return $str.inputErr();
	}
}


//メールアドレス入力結果を表示

function mailAdd($value1="", $value2="", $abs="true") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);

	if($post2 == "") {
		if($post1 == "") {
			if($abs == "true") {
				return absErr();
			}
			else {
				return "";
			}
		}
		else if($post1 != "") {
			if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $post1)) {
				$GLOBALS['remailAdd'] = $post1;
				return $post1;
			}
			else {
				return $post1.inputErr();
			}
		}
	}
	else {
		if($post1 == "") {
			if($abs == "true") {
				return absErr();
			}
			else {
				return "";
			}
		}
		else if($post1 != $post2) {
			return $post1.mailErr();
		}
		else if($post1 == $post2) {
			if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $post1)) {
				$GLOBALS['remailAdd'] = $post1;
				return $post1;
			}
			else {
				return $post1.inputErr();
			}
		}
	}
}


//チェックボックス入力結果を表示

function checkBox($value="", $sec0="", $abs="false") {
	$post1 = @$_POST[$value];

	$connect = @implode($sec0,$post1);
	$str = $connect;

	if($post1 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else {
		return $str;
	}
}


//汎用テキスト入力結果を表示

function output($value="", $abs="false", $sec0="", $sec1="") {
	$post1 = escString(@$_POST[$value]);

	$str = $sec0.$post1.$sec1;

	if($post1 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else {
		return $str;
	}
}


//input連結用(2個)入力結果を表示

function connect($value1="", $value2="", $abs="false", $sec0="", $sec1="", $sec2="") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);

	$str = $sec0.$post1.$sec1.$post2.$sec2;

	if($post1 == "" && $post2 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else if($post1 == "" || $post2 == "") {
		return $str.inputErr();
	}
	else {
		return $str;
	}
}


//input連結用(3個)入力結果を表示

function multi($value1="", $value2="", $value3="", $abs="false", $sec0="", $sec1="", $sec2="", $sec3="") {
	$post1 = escString(@$_POST[$value1]);
	$post2 = escString(@$_POST[$value2]);
	$post3 = escString(@$_POST[$value3]);

	$str = $sec0.$post1.$sec1.$post2.$sec2.$post3.$sec3;

	if($post1 == "" && $post2 == "" && $post3 == "") {
		if($abs == "true") {
			return absErr();
		}
		else {
			return "";
		}
	}
	else if($post1 == "" || $post2 == "" || $post3 == "") {
		return $str.inputErr();
	}
	else {
		return $str;
	}
}


//メールを送信、セッションを削除

function transmited() {
	if($_SESSION['remailflg'] == 1) remail();
	if($_SESSION['mailflg'] == 1) sendmail();

	echo "<form action='{$GLOBALS['returnPath']}' method='get'>".$GLOBALS['returnBtn']."</form>\n";

	session_destroy();
}


//管理者受信メール内容

function sendmail() {
	mb_language("japanese");
	mb_internal_encoding($GLOBALS['charset']);

	$encSender = mb_convert_kana(escString($GLOBALS['sender']), "rnasK", $GLOBALS['charset']);
	$to = $GLOBALS['myMail'];
	$subject = $GLOBALS['mailTitle'];
	$header = "From:".mb_encode_mimeheader($encSender, "ISO-2022-JP")."<".$_SESSION['remail'].">";

	$message = $GLOBALS['mailText']."\n\n";
	foreach($_SESSION['contents'] as $key => $value) {
		$message .= escString($key). " ： " .$value."\n";
	}
	$message .= "\n\n送信日時 ： ".date( "Y/m/d (D) H:i:s", time() )."\n";
	$message .= "ホスト名 ： ".getHostByAddr(getenv('REMOTE_ADDR'))."\n\n";
	
	$encMsg = mb_convert_kana($message, "rnasK", $GLOBALS['charset']);

	if(mb_send_mail($to, $subject, $encMsg, $header)) {
		echo $GLOBALS['thanks'];
	} else {
		echo $GLOBALS['errorMsg'];
	}
}


//自動返信メール内容

function remail() {
	mb_language("japanese");
	mb_internal_encoding($GLOBALS['charset']);

	$encSender = mb_convert_kana(escString($GLOBALS['sender']), "rnasK", $GLOBALS['charset']);
	$to = $_SESSION['remail'];
	$subject = $GLOBALS['remailTitle'];
	$header = "From:".mb_encode_mimeheader($encSender, "ISO-2022-JP")."<".$GLOBALS['myMail'].">";

	$message = $GLOBALS['remailTop']."\n\n";
	foreach($_SESSION["contents"] as $key => $value) {
		$message .= escString($key). " ： " .$value."\n";
	}
	$message .= "\n\n".$GLOBALS['remailBottom'];
	$message .= "\n\n".$GLOBALS['sign'];

	$encMsg = mb_convert_kana($message, "rnasK", $GLOBALS['charset']);
	
	mb_send_mail($to, $subject, $encMsg, $header);
}


?>

