<?php
/**
 * The base configurations of the WordPress.
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - こちらの情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', '_cokes_obhy0rbwe');

/** MySQL データベースのユーザー名 */
define('DB_USER', '_cokes_obhy0rbwe');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '9kgsws5f4n0l4m');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql89.heteml.jp');

/** データベースのテーブルを作成する際のデータベースのキャラクターセット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=WflFR#JzTY8zEU.#V}/`*x>apwM7pg;BC0lx3;nMnmB.|O;wr}.0<BQ5=737d+}');
define('SECURE_AUTH_KEY',  '99%x3?bG7Em,f@`S#Ye2o9Jk=Gd:%mN%mR2glU(j2stY$+,&hp8LpH<7su.wXa1A');
define('LOGGED_IN_KEY',    '.t9yD)X{zGy2P98=o6dUDtS<de#@`3VHnV`-cxHS_`Lo_J5$GYYoI,4&p6{%0vMe');
define('NONCE_KEY',        'Hmp$a<WyM!clKYpv<DZYNTe^Q5}Hro&>Ru]-!s9Otc@_@9+HCj9u]f*naG;I;@ah');
define('AUTH_SALT',        '&wt)ftWOLqngpw*.V+7so(WFMlrc6H~#_.,35gIHM;*]#<EX`CG%I7Jzj@Rgcvi1');
define('SECURE_AUTH_SALT', '7tu3P]B6IJ>KaX#z3J4CGD[,Ynq[YP.W}7Qr@vnc`5(zT*pMRjt2(&#fss0H|#7a');
define('LOGGED_IN_SALT',   '9OH?~;wY-2Oe9^-S64K$9Nis`Z?Xc<=cfZv8oiXza&Ub~f/`aY~Z&#HBbb3^s-zN');
define('NONCE_SALT',       'klLPJ$F%+3fJZti?I#sO%@tgvn3dyt,YVW*9aN$kHi/9Sw?4y#I3]]Z*9TmyDxN2');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが
 * wp-content/languages にインストールされている必要があります。例えば de_DE.mo を
 * wp-content/languages にインストールし WPLANG を 'de_DE' に設定することでドイツ語がサポートされます。
 */
define('WPLANG', 'ja');

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
//define('WP_DEBUG', false);
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
