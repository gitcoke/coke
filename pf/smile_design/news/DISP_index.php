<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<title>news</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-size:12px;
	line-height:normal;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<!--google関連src 2014/10/04から↓-->
<script type="text/javascript" src="http://www.cokes.jp/js/google20141004.js"></script>
</head>

<body onLoad="MM_preloadImages('img/close_down.gif')">
<table width="435" height="403" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td width="10" rowspan="2" bgcolor="#B3D335"><img src="img/spacer.gif"></td>
    <td height="14" colspan="2"><img src="img/spacer.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="261" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?php if(!$fetch):?>
      <tr>
        <td height="38" align="center"><p><b>只今準備中のため、もうしばらくお待ち下さい。</b></p></td>
        </tr>
  <?php else:?>
  <?php for($i=0;$i<count($fetch);$i++):?>
      <tr>
        <td align="left"><p>●<?php echo $fetch[$i]["Y"]."/".$fetch[$i]["M"]."/".$fetch[$i]["D"];?></p>
    <p><?=(empty($fetch[$i]["TITLE"])?"":$fetch[$i]["TITLE"]);?><br><?=nl2br($fetch[$i]["CONTENT"]);?><br><br></p></td>
      </tr>
  <?php endfor;?>
  <?php endif;?>
    </table>
	</td>
    <td width="164" colspan="3" align="right" valign="top">	
	<div style="margin-top:80px;"><img src="img/news_logo.gif" width="164" height="134"></div></td>
  </tr>
  <tr align="right">
    <td colspan="3"><a href="JavaScript:close();" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('close','','img/close_down.gif',1)"><img src="img/close_up.gif" alt="閉じる" name="close" width="36" height="11" border="0"></a></td>
  </tr>
</table>
</body>
<script language="javascript">
<!--
document.write('<img src="../back_office/w3a/writelog.php?ref='+document.referrer+'" width="1" height="1">');
// -->
</script>
</html>
