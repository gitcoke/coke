<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="ja" lang="ja">
<head>
<meta name="Description" content="####" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />

    <link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
    <link href="../common/css/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/index.css" rel="stylesheet" type="text/css" media="all">

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
<style type="text/css">
.fix_submitbox{ margin:-48px 0 0 -64px !important;}
</style>
<body>





<div id="wrapper">
<div id="contact">
	        
  <div id="top_box" class="mlr_auto">
  <img id="logo_s" src="../common/images/logo_s.png" alt="工芸社ロゴ" width="151" height="48">
             <p class="top_txt_s">イベント、展示会、商業施設などの空間づくりは工芸社へ。企画・施工から演出・運営まで、なんでもお任せください。<img class="arrow01_s" src="../common/images/arrow.png" width="9" height="15">03-5684-7333</p>
              
            
            
                    <div id="menu_box" class="mt30">
                          <div id="menu01">
                           <a  href="../index.html">
                                    <img src="../common/images/menu01.png"  alt="HOME" width="42" height="14">
                                    <div class="green_bar01"></div>
                           </a>
                           <img class="shadow"  src="../common/images/navi_shadow.png" width="71" height="71">     
                      </div>   
                          <div id="menu02">
                           <a  href="../index.html?id=interview_a">
                                    <img src="../common/images/menu02.png"  alt="HOME" width="70" height="14">
                                    <div class="green_bar01"></div>
                           </a>
                           <img class="shadow"  src="../common/images/navi_shadow.png" width="71" height="71">     
                      </div>              
                          <div id="menu03">
                           <a  href="../index.html?id=creative_a">
                                    <img src="../common/images/menu03.png"  alt="HOME" width="84" height="14">
                                    <div class="green_bar01"></div>
                           </a>
                           <img  class="shadow"  src="../common/images/navi_shadow.png" width="71" height="71">     
                      </div>              
                          <div id="menu04">
                           <a  href="../service/index.html">
                                    <img src="../common/images/menu04.png"  alt="HOME" width="56" height="14">
                                    <div class="green_bar01"></div>
                           </a>
                           <img class="shadow"  src="../common/images/navi_shadow.png" width="71" height="71">     
                      </div>
                          <div id="menu05">
                           <a  href="../company/index.html">
                                    <img src="../common/images/menu05.png"  alt="HOME" width="56" height="14">
                                    <div class="green_bar01"></div>
                           </a>
                           <img  class="shadow"  src="../common/images/navi_shadow.png" width="71" height="71">     
                      </div>
                          <div id="menu06">
                           <a  href="index.html">
                                    <img src="../common/images/menu06_on.png"  alt="HOME" width="84" height="14">
                                    <div class="green_bar02"></div>
                           </a>
                           <img class="shadow" src="../common/images/navi_shadow.png" width="71" height="71">     
                      </div>                                 
                  	</div>    
                  </div>    
                  
        <div class="clearfix"></div>
        
        <div class="contact_title"></div>
        <div><img src="../common/images/shadow02.png" width="723" height="11" class="mlr_auto"></div>
    <div class="flow">
	  
      <div id="flowbox" class="mlr_auto">
			
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if($_SESSION['sendflg'] != 1) { ?>
<?php echo $explain; ?>
<form action="<?php echo $filename; ?>" method="post">

<div id="flowbox" class="mlr_auto">
	<ul>
		<?php confirm(); ?>
	</ul></div></div><div class="clearfix mb130"></div>
<?php confirm2(); ?>


<div class="btm_btn_cont">
<?php submit(); ?>
</form>
<?php } else if($_SESSION['sendflg'] == 1) transmited(); ?>
</div></li></ul>

     <div class="clearfix"></div>
      </div>
            
           
    </div> 
    
  </div>

<div id="footer_container" class=" mlr_auto z5"> 

    <p class="footer_txt_color" id="footer_txt01">イベント、展示会、商業施設などの空間づくりは工芸社へ。<br>
    企画・施工から演出・運営まで、なんでもお任せください。</p>
    <p class="footer_txt_color" id="footer_txt02">空間づくりに関することでしたら、どのような内容でもお気軽にご相談下さい。<br>
専門スタッフが丁寧に分かりやすくお答え致します。</p>
	<p  class="footer_txt_color" id="footer_txt03"> 〒113-0033 東京都文京区本郷6丁目17-5</p>
    
    <div id="footer_btn_container" >
           <div id="footer_btn_on01" ><a href="../contact/index.html"><img src="../common/images/btn02.png" width="320" height="59" alt="webでのお問い合わせはこちら"></a></div>
           <div id="footer_btn_on02"><img src="../common/images/btn03.png" width="357" height="59" alt="お電話でのお問い合わせはこちら"></div>
           <div class="clearfix"></div>
 	</div>
    
<div id="footer_menu_container">
    		<ul>
         	<li id="footer_menu01" ><a href="../index.html"><img src="../common/images/footer_txt01.png" alt="HOME" width="42" height="14"></a></li>
         	<li id="footer_menu02" ><a  href="../index.html?id=interview_a"><img src="../common/images/footer_txt02.png" alt="HOME" width="70" height="14"></a></li>
         	<li id="footer_menu03" ><a  href="../index.html?id=creative_a"><img src="../common/images/footer_txt03.png" alt="HOME" width="84" height="14"></a></li>
            <li id="footer_menu04" ><a href="../service/index.html"><img src="../common/images/footer_txt04.png" alt="HOME" width="56" height="14"></a></li>
            <li id="footer_menu05" ><a href="index.html"><img src="../common/images/footer_txt05.png" alt="HOME" width="56" height="14"></a></li>
            <li id="footer_menu06" ><a href="../contact/index.html"><img src="../common/images/footer_txt06.png" alt="HOME" width="84" height="14"></a></li>
         </ul>
   </div> 
   
   <p class="footer_txt_color" id="copy_wright">Copyright(C) 2002-2015 KOGEISHA co,.ltd All rights Reserved</p>
        
  </div>
  
</div>

<!--自由にHTMLを記述してください-->

<div class="form">
<!--FORM START 以下オリジナル src　未使用>

<?/*php if($_SESSION['sendflg'] != 1) { ?>
<?/*php echo $explain; ?>
<form action="<?/*php echo $filename; ?>" method="post">
<table>
<?/*php confirm(); ?>
<tr>
<td colspan="2" class="submit"><?/*php submit(); ?></td>
</tr>
</table>
</form>
<?/*php } else if($_SESSION['sendflg'] == 1) transmited(); ?>
<!--FORM END-->
</div>

<!--自由にHTMLを記述してください-->


</body>
</html>
