<?php
//サンプルフォーム

//まずmfp/config.inc.phpを呼び出します。相対/絶対パス問わず。
include(getcwd().'/mfp/config.inc.php');

//メールフォームの設定
$config = array(
				//メールフォームのURL
				'form_url' 		=> 'http://www.cokes.jp/kogeisha_test/htdocs/2011renewal/mailform_plus_v1.24/',
				//サイト名。※メール送信時に使用
				'sitename'  	=> '株式会社　工芸社',
				//受信メールアドレス(自動返信機能をつけた場合このメールアドレスを使用してユーザーへ送信します)
				'recipient'  	=> 'info@cokes.jp',
				//フォームテンプレートまでのパスを指定
				'template'  	=> SYSTEM_ROOT.'template/',
				//フォームの設置した入力欄のネーム属性を指定
				'post_name'  	=> "name,furigana,email,subject,body,drink",
				//設置した入力欄でのメールアドレス項目のネーム属性を指定（メール送信時に使用）
				'from_email' 	=> 'isoda@cokes.jp',
				//設置した入力欄でのお名前項目のネーム属性を指定（メール送信時に使用）
				'from_name' 	=> 'coke_master',
				//自動返信機能の有無。trueで有、falseで無
				'reply' 		=> true,
				//二重投稿防止のための制限時間(分数)　※0または設定なしで解除
				'limit'			=> "0",
				//出力先の文字コードを指定
				'charset'		=> $carrier != 'p' ? "SJIS" : "UTF-8",
				//入力チェック機能。詳細はreadme.htmlを参照
				'valid'			=> array(
										"requires" => 'name,furigana,email,subject,body',
										"email" => '@',
										"japanese" => 'furigana,body',
										'words' => 'body'
										)
				
				);
//設定情報をプログラムへ渡します
$mailform = new MailFormPlus($config, 1);


//HTML出力
if($carrier == 'p') {
	include("pc.php");
} else {
	include("mb.php");
}
?>