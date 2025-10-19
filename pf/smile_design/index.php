<?php
/***********************************************************
SiteWin10 20 30（MySQL版）
S系表示用Program
	
2007/1/23 by songwei
***********************************************************/

//error_reporting (E_ALL);
//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting (E_ERROR | E_WARNING | E_PARSE);
ini_set('track_errors',1);
ini_set('display_errors',1);

// 読入設定File＆通常共用的處理Class和library
require_once('../common/config.php');
require_once("../common/lib/dbOpe.php");			// DB操作的Class和library
require_once("../common/lib/util_lib.php");			// 通常共用的處理Class和library


#=============================================================
# HTTP Header的輸出
#	文字Cod和と言語：EUC（日本語）
#	其他：ＪＳ和ＣＳＳ設定／有効期限：設定／Cash拒否：設定／Robot拒否
#=============================================================
utilLib::httpHeadersPrint("EUC-JP",true,false,true,false);

#=================================================================================
# POSTデータの受取と文字列処理（共通処理）	※汎用処理クラスライブラリを使用
#=================================================================================
// タグ、空白の除去／危険文字無効化／“\”を取る／半角カナを全角に変換
if($_GET)extract(utilLib::getRequestParams("get",array(8,7,1,4)));

/*
$cntsql = "SELECT COUNT(*) AS CNT FROM N3_WHATS_NEW WHERE (DISPLAY_FLG = '1') AND (DEL_FLG = 0)";
$fetchCNT = dbOpe::fetch($cntsql,DB_USER,DB_PASS,DB_NAME,DB_SERVER);

if(empty($page) or !is_numeric($page))$page=1;

$st = ($page-1) * TOPIC_MAX_NUM;
*/

$sql = "
	SELECT
		RES_ID,TITLE,CONTENT,
		YEAR(DISP_DATE) AS Y,
		MONTH(DISP_DATE) AS M,
		DAYOFMONTH(DISP_DATE) AS D,
		DISPLAY_FLG
	FROM
		N3_WHATSNEW
	WHERE
		(DISPLAY_FLG = '1')
	AND
		(DEL_FLG = '0')
	ORDER BY
		DISP_DATE DESC
";

// ＳＱＬを実行
$fetch = dbOpe::fetch($sql,DB_USER,DB_PASS,DB_NAME,DB_SERVER);

// 取得件数在HTML輸出
include("DISP_index.php");

?>