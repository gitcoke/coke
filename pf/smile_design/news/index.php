<?php
/***********************************************************
SiteWin10 20 30��MySQL�ǡ�
S��ɽ����Program
	
2007/1/23 by songwei
***********************************************************/

//error_reporting (E_ALL);
//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting (E_ERROR | E_WARNING | E_PARSE);
ini_set('track_errors',1);
ini_set('display_errors',1);

// ��������File���̾ﶦ��Ū����Class��library
require_once('../common/config.php');
require_once("../common/lib/dbOpe.php");			// DB���ŪClass��library
require_once("../common/lib/util_lib.php");			// �̾ﶦ��Ū����Class��library


#=============================================================
# HTTP HeaderŪ͢��
#	ʸ��Cod�¤ȸ��졧EUC�����ܸ��
#	¶¾���ʣ��£ãӣ����꡿ͭ�����¡����꡿Cash���ݡ����꡿Robot����
#=============================================================
utilLib::httpHeadersPrint("EUC-JP",true,false,true,false);

#=================================================================================
# POST�ǡ����μ����ʸ��������ʶ��̽�����	�����ѽ������饹�饤�֥������
#=================================================================================
// ����������ν����ʸ��̵��������\�ɤ��롿Ⱦ�ѥ��ʤ����Ѥ��Ѵ�
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

// �ӣѣ̤�¹�
$fetch = dbOpe::fetch($sql,DB_USER,DB_PASS,DB_NAME,DB_SERVER);

// ���������HTML͢��
include("DISP_index.php");

?>