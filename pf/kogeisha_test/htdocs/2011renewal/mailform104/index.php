<?php
//================================================================================
//���[���t�H�[��	Ver.103
//����E���쌠���L�F�g�уT�C�gnet�iCopyright(c) http://www.keitai-site.net/�j
//================================================================================
/////////////////////////////////////////���ϐ���`��
$conf['a_id'] = "cokemin";								//�Ǘ��p�h�c�i�K���ύX���ĉ������j
$conf['a_pw'] = "cokemin";								//�Ǘ��p�p�X���[�h�i�K���ύX���ĉ������j
$conf['sitename'] = "���Ȃ��̃T�C�g��";						//�T�C�g���i�K���ύX���ĉ������j
$conf['pagename'] = "���₢���킹";						//�y�[�W��
$conf['metakey'] = "���[���t�H�[��,�t�H�[�����[��";					//meta�L�[���[�h
$conf['metadesc'] = "���₢���킹���[���t�H�[���ł��B";				//meta����
$conf['dir'] = "/kogeisha_test/htdocs/2011renewal/mailform104/";							//�ݒu����f�B���N�g��
$conf['fname1'] = "./log1.csv";							//���₢���킹�f�[�^
$conf['css'] = "./mailform.css";							//�X�^�C���V�[�g
$conf['line_page'] = 15;								//���₢���킹�f�[�^�̂P�y�[�W����̕\������
$conf['mailto'] = "info@cokes.jp";							//�Ǘ��҃��[���A�h���X
$conf['mailon'] = "1";								//���[�U�[�ւ̎����ԐM���[���@�\���g�p�F"1"�A�s�g�p�F"0"
$conf['attach'] = "1";								//�t�@�C���Y�t�@�\���g�p�F"1"�A�s�g�p�F"0"
$conf['maxsize'] = 100000;							//�Y�t�t�@�C���̐����T�C�Y
	//�t�@�C���T�C�Y��php.ini��upload_max_filesize�����post_max_size�Ɉˑ�����̂ŁA�����̃T�C�Y�𒴂��Ȃ��l���w�肵�Ă��������B
$conf['maxdata'] = 300;								//�ۑ��ł��邨�₢���킹�����̏������

/////////////////////////////////////////���ϐ���`�I�[��
/////////////////////////////////////////������������
$fp1 = @fopen($conf['fname1'],"r");					//�ǂݍ��ݐ�p�I�[�v��
$aryfl1 = @file($conf['fname1']);
@fclose($fp1);
$line_total = count($aryfl1);						//�t�@�C���̑��s���擾
$page_total = floor($line_total/$conf['line_page']);			//���y�[�W��
if(fmod($line_total,$conf['line_page']) > 0){$page_total++;}		//���y�[�W���̗]�肪����΁{�P�y�[�W
$from = @array_fill(0,$page_total,TRUE);					//�y�[�W�����̔z�񐶐�
$page = @array_fill(0,$page_total,TRUE);					//�y�[�W�����̔z�񐶐�
$admin = $_REQUEST['admin'];
$msg = @array_fill(0,20,NULL);						//���b�Z�[�W�p�̔z�񐶐�
/////////////////////////////////////////�����������I�[��
/////////////////////////////////////////���g�є��ʁ�
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if(eregi("DoCoMo",$user_agent)){$ua = "docomo";}
elseif(eregi("UP\.Browser",$user_agent)){$ua = "au";}
elseif(eregi("J-PHONE",$user_agent)){$ua = "softbank";}
elseif(eregi("Vodafone",$user_agent)){$ua = "softbank";}
elseif(eregi("SoftBank",$user_agent)){$ua = "softbank";}
elseif(eregi("J-EMULATOR",$user_agent)){$ua = "softbank";}
else{$ua = "pc";}
/////////////////////////////////////////���g�є��ʏI�[��
/////////////////////////////////////////�����C�����[�`���J�n��
switch($_REQUEST['act']){

case 'login':				//��login
head1();
login();
foot1();
break;

case 'admin':				//��admin
head1();
if($_REQUEST['a_id'] == $conf['a_id'] && $_REQUEST['a_pw'] == $conf['a_pw']){
admin();
}
else{$msg[1] = "�F�؂͔F�߂��܂���ł����B";msg();login();}
foot1();
break;

case 'form_reg':			//��form_reg
head1();
form_reg();
foot1();
break;

case 'form_del_a':			//��form_del_a
head1();
admin();
form_del_a();
foot1();
break;

case 'delete':			//��delete
delete();
head1();
admin();
msg();
foot1();
break;

case 'regist':			//��regist
regist();
head1();
if($admin == 1){admin();}
msg();
foot1();
break;

default:				//��default
head1();
form_reg();
foot1();
}
/////////////////////////////////////////�����C�����[�`���I�[��
/////////////////////////////////////////���֐���

function login(){								//��login
global $conf,$aryfl1,$ua,$admin,$msg;

print <<<END
<h2>{$conf['pagename']}</h2>
<form action="{$_SERVER[REQUEST_URI]}" method="post">
<input type="hidden" name="act" value="admin" />
<p>���[�U���F<input type="text" name="a_id" size="10"><br />
�p�X���[�h�F<input type="password" name="a_pw" size="10"></p>
<input type="submit" value="���O�C��">
</form>
END;
}

function admin(){								//��admin
global $conf,$aryfl1,$ua,$admin,$msg;

print <<<END
<h2>�Ǘ����j���[</h2>
<form action="{$_SERVER[REQUEST_URI]}" method="post">
<input type="hidden" name="act" value="form_del_a" />
<input type="hidden" name="admin" value="1" />
<input type="submit" value="�Ǘ��ҍ폜�t�H�[��">
</form>
<form action="{$_SERVER[REQUEST_URI]}" method="post">
<input type="submit" value="���O�A�E�g">
</form>
<br />
END;
}

function form_reg(){								//��form_reg
global $conf,$aryfl1,$ua,$admin,$msg;

print <<<END
<h2>{$conf['pagename']}</h2>
END;
$vol = $conf['maxsize'];
if($vol < 1000000){$vol = round($vol/1000,1)."KB";}else{$vol = round($vol/1000000,1)."MB";}
print <<<END
<!--
-->
<form action="{$_SERVER[REQUEST_URI]}" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="{$conf['maxsize']}" />
<input type="hidden" name="act" value="regist" />
<ul>
<li>�����O�i�S�p�Q�T�����ȓ��j<input type="text" name="name" size="35">�K�{</li>
<li>���[���i���p�W�O�����ȓ��j<input type="text" name="mail" size="35">�K�{</li>
<li>�����i�S�p�R�O�����ȓ��j<input type="text" name="title" size="45">�K�{</li>
<li>���₢���킹���e�i�S�p�Q�O�O�O�����ȓ��j<br /><textarea name="comment" cols="50" rows="5"></textarea>�K�{</li>
END;
if($conf['attach'] == 1){
print <<<END
<li>�Y�t�t�@�C���i���p�W�O�����ȓ��j<input type="file" name="upfile" size="50"><br />�Y�t�\�ȃt�@�C���T�C�Y�F$vol
</li>
END;
}
print <<<END
</ul>
<input type="submit" value="���M"> 
</form>
<hr />
END;
}

function mojifilter(&$str){							//��mojifilter
//$str = ereg_replace("\r\n\|\r|\n","",$str);			//�����g�p���Ȃ�������
$str = ereg_replace("[\r\n\]","",$str);				//���s�����i�����ԁj
$str = trim($str);							//�󔒏���
$str = str_replace('\"','�h',$str);				//�_�u���N�I�[�g�u��
$str = str_replace('\'','�f',$str);				//�V���O���N�I�[�g�u��
$str = str_replace(',','�C',$str);					//�J���}�u��
$str = mb_convert_kana($str,"KV","SJIS");				//���p�J�i�ϊ�
if(get_magic_quotes_gpc()){$str = stripslashes($str);}		//������
return $str;
}

function regist(){								//��regist
global $conf,$aryfl1,$ua,$admin,$msg;

$in_check_ok = TRUE;
$reg_time = time();
$name = $_REQUEST['name'];
$mail = $_REQUEST['mail'];
$url = $_REQUEST['url'];
$title = $_REQUEST['title'];
$comment = $_REQUEST['comment'];
$upfile = $_FILES['upfile']['name'];
$vol = $_FILES['upfile']['size'];
$dllimit = $_REQUEST['dllimit'];
if($dllimit > 0 && is_numeric($dllimit)){$zan = $dllimit - $dlcount;}
else{$zan = "-"; $dllimit = "-";}
$dlkey = $_REQUEST['dlkey'];
//eregi("(\jpg|\jpeg|\png|\bmp|\gif)$",$_FILES['upfile']['name'],$ext);		//���[�U�t�@�C��������g���q���o��
preg_match("/\.[^.]*$/i",$_FILES['upfile']['name'],$ext);		//���[�U�t�@�C��������g���q���o��

$pass = $_REQUEST['pass'];
$dlcount = 0;
$host = $_SERVER['REMOTE_ADDR'];

mojifilter($title);
mojifilter($comment);

if($name == ""){$in_check_ok = FALSE; $msg[2] = "�����O�����͂���Ă��Ȃ��悤�ł��B";}
else{if(strlen($name) > 50){$in_check_ok = FALSE; $msg[2] = "�����O���Q�T�����𒴂��Ă��܂��B";}}
if($name == ""){$in_check_ok = FALSE; $msg[3] = "���[���A�h���X�����͂���Ă��Ȃ��悤�ł��B";}
else{if(strlen($mail) > 80){$in_check_ok = FALSE; $msg[3] = "���[���A�h���X���W�O�����𒴂��Ă��܂��B";}}
if($title == ""){$in_check_ok = FALSE; $msg[5] = "���������͂���Ă��Ȃ��悤�ł��B";}
else{if(strlen($title) > 60){$in_check_ok = FALSE; $msg[5] = "�������R�O�����𒴂��Ă��܂��B";}}

if($comment == ""){$in_check_ok = FALSE; $msg[6] = "���₢���킹���e�����͂���Ă��Ȃ��悤�ł��B";}
else{if(strlen($comment) > 4000){$in_check_ok = FALSE; $msg[6] = "���₢���킹���e���Q�O�O�O�����𒴂��Ă��܂��B";}}
if($conf['attach'] == 1){
if($_FILES['upfile']['size'] > $conf['maxsize']){$in_check_ok = FALSE; $msg[7] = "�Y�t�t�@�C�����傫�߂��܂��B";}
}

if($aryfl1 == ""){							//�t�@�C���Ȃ��̏ꍇ�V�K�쐬
	$id1 = 1;
	$fp1 = @fopen($conf['fname1'],"a");	
	@chmod($conf['fname1'],0606);
	@fclose($fp1);
}
else{									//�t�@�C������̏ꍇ�����[�h�΍􏈗�
	foreach($aryfl1 as $value){list($id1,,,,$name_prev,,,,,,,,,,,,,$host_prev) = explode(",",mb_convert_encoding($value,"SJIS","ASCII,JIS,UTF-8,EUC-JP,SJIS"));}						//�ŏI�s��ǂݍ���
	if(strcmp($name_prev,$name) == 0){				//�Ǘ��ґ��M�̏ꍇ�`�F�b�N���Ȃ�
		if($admin != 1){$in_check_ok = FALSE; $msg[1] = "���łɑ��M����Ă��܂��B";}else{$id1 += 1;}
	}
	else{$id1 += 1;}
}

if($in_check_ok){	//�������G���[������΍X�V����������
//����������������
if($conf['maxdata'] <= count($aryfl1)){
$i = 0;
foreach($aryfl1 as $value){list(,,,,,,,,,$upfiledel,,,,,$thumbfiledel,,,) = explode(",",mb_convert_encoding($value,"SJIS","ASCII,JIS,UTF-8,EUC-JP,SJIS"));
	if($i == 0){
		unset($aryfl1[$i]);					//�擪�f�[�^�s�폜
		@unlink('uf/'.$upfiledel);				//�A�b�v���[�h�t�@�C���폜
		@unlink('uf/'.$thumbfiledel);			//�T���l�C���t�@�C���폜
	}
	$fp1 = @fopen($conf['fname1'],"w");			//�������݃I�[�v��
	@flock($fp1,LOCK_EX);
	foreach($aryfl1 as $line){@fwrite($fp1, $line);}
	@flock($fp1,LOCK_UN);
	@fclose($fp1);
	$i++;
}
}

//���A�b�v���[�h������
if($conf['attach'] == 1){
if(is_file("{$_FILES['upfile']['tmp_name']}")){
$upfile = date("YmdHis",$reg_time).$ext[0];					//�ۑ��p�t�@�C��������
@move_uploaded_file($_FILES['upfile']['tmp_name'],'uf/'.$upfile);		//�e���|�����f�B���N�g������̈ړ�����
}
}

//���f�[�^�X�V������
$adddata = array($id1,$id2,$id3,$reg_time,$name,$mail,$url,$title,$comment,$upfile,$dllimit,$dlkey,$pass,$vol,$thumbfile,$dlcount,$zan,$host);	//�ϐ��Q����z�񐶐�
$adddata = implode(",",$adddata);					//�z��v�f���J���}�ŘA��
$adddata = mb_convert_encoding($adddata,"SJIS","ASCII,JIS,UTF-8,EUC-JP,SJIS");
$fp1 = @fopen($conf['fname1'],"a");				//�ǉ��������݃I�[�v��
@flock($fp1,LOCK_EX);
@fwrite($fp1,$adddata."\r\n");
@flock($fp1,LOCK_UN);
@fclose($fp1);
$msg[0] = "���M����";
$msg[1] = "���M���������܂����B";

//�����[���ʒm�����i�Ǘ��҈��j��
$mail_str = "�ȉ��̂��₢���킹������܂���\n\n";
$mail_str .= "�����O�F".$name."�@�l\n";
$mail_str .= "���[���A�h���X�F".$mail."\n";
$mail_str .= "���₢���킹�����F".$title."\n";
$mail_str .= "���₢���킹���e�F".$comment."\n";
$mail_str .= "���M���ԁF".date('Y/m/d (D) H:i')."\n";
$mail_str .= "�z�X�g�F".$host."\n";
$mail_str .= "���[�U�[�G�[�W�F���g�F".$_SERVER['HTTP_USER_AGENT']."\n\n";
mb_language("Ja");
mb_internal_encoding("sjis");
@mb_send_mail($conf['mailto'],$title,$mail_str,'From:'.mb_encode_mimeheader("{$conf['sitename']}").$conf['mailto']);
//�����[���ʒm�����i���[�U�[���j��
//if(!$admin && $conf['mailon'] == "1"){
if($conf['mailon'] == "1"){
$subject = "���₢���킹�m�F���[��";
$mail_str = "���₢���킹���肪�Ƃ��������܂����B\n";
$mail_str .= "�ȉ��̓��e�ɂď���܂����B\n\n";
$mail_str .= "�����O�F".$name."�@�l\n";
$mail_str .= "���[���A�h���X�F".$mail."\n";
$mail_str .= "���₢���킹�����F".$title."\n";
$mail_str .= "���₢���킹���e�F".$comment."\n";
$mail_str .= "���M���ԁF".date('Y/m/d (D) H:i')."\n\n";
$mail_str .= "----------------------------------------------------\n";
$mail_str .= "{$conf['sitename']}\n";
$mail_str .= "----------------------------------------------------\n";
mb_language("Ja");
mb_internal_encoding("sjis");
@mb_send_mail($mail,$subject,$mail_str,'From:'.mb_encode_mimeheader("{$conf['sitename']}").$conf['mailto']);
}

}
else{$msg[0] = "���M�ł��܂���ł����B";$msg[16] = "�ē��͂̓u���E�U�̖߂�{�^���������Ă��������B";}

}

function delete(){								//��delete
global $conf,$aryfl1,$ua,$admin,$msg;

if(is_numeric($_REQUEST['del_id'])){
$del_id = $_REQUEST['del_id'];
$i = 0;
foreach($aryfl1 as $value){list($id1,$id2,$id3,$reg_time,$name,$mail,$url,$title,$comment,$upfile,$dllimit,$dlkey,$pass,$vol,$thumbfile,$dlcount,$zan,$host) = explode(",",mb_convert_encoding($value,"SJIS","ASCII,JIS,UTF-8,EUC-JP,SJIS"));
if(strcmp($id1,$del_id) == 0){
	unset($aryfl1[$i]);				//�w��f�[�^�s�폜
	@unlink('uf/'.$upfile);			//�A�b�v���[�h�t�@�C���폜
	@unlink('uf/'.$thumbfile);			//�T���l�C���t�@�C���폜
}
$i++;
}

$fp1 = @fopen($conf['fname1'],"w");				//�������݃I�[�v��
@flock($fp1,LOCK_EX);
foreach($aryfl1 as $line){@fwrite($fp1, $line);}
@flock($fp1,LOCK_UN);
@fclose($fp1);

$msg[0] = "�폜����";
$msg[1] = "�f�[�^�폜���������܂����B";
}
else{
$msg[0] = "�폜������";
$msg[1] = "���͒l�����l�ł͂���܂���B";
}
}

function form_del_a(){							//��form_del_a
global $conf,$aryfl1,$ua,$admin,$msg;
global $line_total,$page_total,$page,$from;

print <<<END
<h2>{$conf['pagename']}</h2>
<p>�폜�������o�^ID���w�肵�Ă��������B</p>
<form action="{$_SERVER[REQUEST_URI]}" method="post">
<input type="hidden" name="act" value="delete" />
<input type="hidden" name="admin" value="1" />
<p>�폜�������o�^ID�F<input type="text" name="del_id" size="20">
<input type="submit" value="�폜����"></p>
</form>
END;

if($_REQUEST['from']){$line_from = $_REQUEST['from'];}
else{$line_from = $line_total;}
$line_to = $line_from - $conf['line_page'];
if($line_from < $conf['line_page']){$line_to = 0;}
print <<<END
<br />�V�����F�S $line_total ���� $line_from - $line_to ����<br /><br />
<hr />
END;

for($i=$line_from;$i>$line_to;$i--){
list($id1,$id2,$id3,$reg_time,$name,$mail,$url,$title,$comment,$upfile,$dllimit,$dlkey,$pass,$vol,$thumbfile,$dlcount,$zan,$host) = explode(",",mb_convert_encoding($aryfl1[$i-1],"SJIS","ASCII,JIS,UTF-8,EUC-JP,SJIS"));
$reg_time = date("Y/m/d H:i:s",$reg_time);
$path = $conf['dir'].'uf/';
print <<<END
�o�^ID�F$id1<br />
�����O�F$name ���[���F$mail �����F$title<br />
���₢���킹���e�F$comment<br />
�Y�t�t�@�C���F<a href="$path$upfile">$upfile</a><br />�����F$reg_time<br />
�z�X�g�F $host
<hr />
END;
}

/////�����y�[�W������
echo "�y�[�W�F";
$line_prev = $line_from + $conf['line_page'];			//�y�[�W�O��
if($line_prev <= $line_total){
print <<<END
<form action="{$_SERVER[REQUEST_URI]}" method="post">
<input type="hidden" name="act" value="form_del_a" />
<input type="hidden" name="from" value="$line_prev" />
<input type="hidden" name="admin" value="1" />
<input type="submit" value="�O�y�[�W $line_prev ����"></p>
</form>
END;
}

$line_next = $line_from - $conf['line_page'];			//�y�[�W����
if($line_next > 0){
print <<<END
<form action="{$_SERVER[REQUEST_URI]}" method="post">
<input type="hidden" name="act" value="form_del_a" />
<input type="hidden" name="from" value="$line_next" />
<input type="hidden" name="admin" value="1" />
<input type="submit" value="���y�[�W $line_next ����"></p>
</form>
END;
}
/////�����y�[�W������

print <<<END
<hr />
END;
}

function head1(){								//��head1
global $conf,$aryfl1,$ua,$admin,$msg;

/////////////////////////////////////////���g�є��ʁ�
$DOCTYPE = array(
"pc"=>"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">",
"docomo"=>"<!DOCTYPE html PUBLIC \"-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.1) 1.0//EN\" \"i-xhtml_4ja_10.dtd\">",
"au"=>"<!DOCTYPE html PUBLIC \"-//OPENWAVE//DTD XHTML 1.0//EN\" \"http://www.openwave.com/DTD/xhtml-basic.dtd\">",
"softbank"=>"<!DOCTYPE html PUBLIC \"-//J-PHONE//DTD XHTML Basic 1.0 Plus//EN\" \"xhtml-Basic10-Plus.dtd\">"
);
/////////////////////////////////////////���g�є��ʏI�[��

$currenturl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$title = $conf['sitename']." - ".$conf['pagename'];		//title�̃f�t�H���g�ݒ�

print <<<END
$DOCTYPE[$ua]
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<title>$title</title>
<meta http-equiv="content-type" content="text/html; charset=Shift_JIS" />
<meta http-equiv="content-style-type" content="text/css" />
<meta name="keywords" content="{$conf['metakey']}" />
<meta name="description" content="{$conf['metadesc']}" />
<link rel="start" href="http://{$_SERVER[HTTP_HOST]}/" title="{$conf['sitename']}" />
<link rel="stylesheet" href="{$conf['css']}" type="text/css" />
</head>
<!--
-->

<body>
<!--��layer1��--><div id="layer1">
<!--��header��--><div id="header">
<a id="top" class="aname"></a>
<h1>{$conf['pagename']}</h1>
<div id="sitename"><a href="/" title="{$conf['sitename']}">{$conf['sitename']}</a></div>
<!--��header��--></div>
<!--��layer2��--><div id="layer2">
<!--��contents��--><div id="contents">
END;

}

function foot1(){								//��foot1
global $conf,$aryfl1,$ua,$admin,$msg;

$d = htmlentities(urlencode('http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]));
$currenturl = 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
if($conf['pagename'] == ""){$top = $conf['sitename'];}
else{$top = $conf['pagename'];}

print <<<END
<!--��contents��--></div>

<!--��navi1��--><div id="navi1">
<div class="subj">�l�d�m�t</div>
<div class="link"><a href="/" title="{$conf['sitename']}">{$conf['sitename']}</a></div>
<div class="link"><a href="{$conf['dir']}">���₢���킹</a></div>
<div class="link"><a href="{$conf['dir']}?act=login">�Ǘ�</a></div>
<div class="com">
</div>
<!--��navi1��--></div>
<!--��layer2��--></div>

<!--��navi2��--><div id="navi2">
<!--��navi2��--></div>

<!--��footer��--><div id="footer">
<div class="pagetop"><a href="$currenturl" title="$top �y�[�W�g�b�v��">���y�[�W�g�b�v��</a></div>
<div class="pagetop">Powered by <a href="http://www.keitai-site.net/php/mailform_php/" title="���[���t�H�[��">���[���t�H�[��</a></div>
<!--��footer��--></div>
<!--��layer1��--></div>
</body>
</html>
END;
}

function msg(){								//��msg
global $conf,$aryfl1,$ua,$admin,$msg;

$num = count($msg);
print <<<END
<h2>$msg[0]</h2>
END;
for($i=1;$i<=$num;$i++){
if($msg[$i] != NULL){print("<p>$msg[$i]</p>");}
}
print <<<END
<br />
<p><a href="{$conf['dir']}">{$conf['pagename']}</a>�֖߂�</p>
END;
}
/////////////////////////////////////////���֐��I�[��
?>
