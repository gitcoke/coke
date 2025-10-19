<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">td img {display: block;}body {margin-left: 0px;　margin-top: 0px;}</style>
<title>メールフォーム</title>
<link rel="stylesheet" href="form.css" type="text/css" media="all" />
<link href="2011.css" rel="stylesheet" type="text/css" />
</head>

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
</div>
</form>
<?php } else if($_SESSION['sendflg'] == 1) transmited(); ?>
<!--FORM END-->
</div>


<!--自由にHTMLを記述してください-->


</body>
</html>
