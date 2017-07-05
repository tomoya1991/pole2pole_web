<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'dev');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'N7>E5=Q#yoLR~$]Iz?m,+^;|qlte6Swyn#?5q|xeKM{p$EBgJpv9+V@B6+?!x5ZC');
define('SECURE_AUTH_KEY',  'Qx6(bxV]*lBx$[$(B=]2/[,JOpBImSGAQ* W;SSX[Bb)Ni[dj3:-9Xua?1b6fv6B');
define('LOGGED_IN_KEY',    'FUqJ9WW@<Qw;z4DEa:B7sdcd_m(mDQoXmZ]v%pH3BDTl6F+(?D;$yBRqQCH~~iKs');
define('NONCE_KEY',        ']bp)Jt@J -uYLLcg.h0!U;0I0P/c=Fo}LTu-}{~y%qu/1DhsH,yA$P!v$=ZiM;:W');
define('AUTH_SALT',        'y9`ajpog{CCd6=Sc<XKJm<7t]ZswE@:bDX Pi0otjDjzQR1qa~+=w1,&:fhx%UE]');
define('SECURE_AUTH_SALT', '~[,N2yS]1pJz2hWqjsf0fNg1_><@O;?72tNLu-@]5uLMzeC(|/*4~fhSkyu(}_j$');
define('LOGGED_IN_SALT',   'Vb XZ8lC@Opkq2B(<_1o4bg7XIVS;HD6*|~A-4Ya7y%+3-t1@F``4WIwS]_OD%+V');
define('NONCE_SALT',       'Yt9A:kA14|(j)5ga~]->]n/f^&{M4FbMoQLtu/s*+1&>I0;3u2r(v/9%6h$#`1(L');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'pole2pole_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
