<?php
require_once( "setting.php" );
require_once( "connect.php" );

require_once("model.php");

// ***********************************
// グローバル変数( 重要 )
// ***********************************
$pdo = null;
$err_message = "";

// ***********************************
// 接続
// ***********************************
try {
    $pdo = new PDO( $GLOBALS["connect_string"], $GLOBALS["user"], $GLOBALS["password"] );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print "エラー : {$e->getMessage()}";
    exit();
}

if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    // ***********************************
    // 更新
    // ***********************************
    $result = check_data();
    $result = true;
    if ( $result == true ) {
        insert_data();
        $_POST["name"] = "";
        $_POST["level"] = "";
    }
    else {
    }
}

// ***********************************
// 終了処理
// ***********************************
$pdo = null;

// ***********************************
// 画面
// ***********************************
require_once("view.php");
?>
