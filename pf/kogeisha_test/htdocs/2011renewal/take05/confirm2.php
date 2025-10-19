<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="ja" lang="ja">
<head>
<meta name="Description" content="####" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rev="MADE" href="mailto:info@kogeisha.co.jp" />
<title>メールフォーム</title>
<link rel="stylesheet" href="form.css" type="text/css" media="all" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-535907-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script></head>

<body>


<!--自由にHTMLを記述してください-->


<div class="form">
<!--FORM START-->
<?php if($_SESSION['sendflg'] != 1) { ?>
<?php echo $explain; ?>
<form action="<?php echo $filename; ?>" method="post">
<table>
<?php confirm(); ?>
<tr>
<td colspan="2" class="submit"><?php submit(); ?></td>
</tr>
</table>
</form>
<?php } else if($_SESSION['sendflg'] == 1) transmited(); ?>
<!--FORM END-->
</div>


<!--自由にHTMLを記述してください-->


</body>
</html>
