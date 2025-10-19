<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ラジオボタンのデータの受信</title>
</head>
<body>
<?php
   if(isset($_POST['fRadio'])==false){
      echo "ラジオボタンが選択されていません。\n";
   }
   else{
      echo ラジオボタン"{$_POST['fRadio']}が選択されました。\n";
   }
?> 
</body>
</html>