<?php 
// エラーログの確認時に使用
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//1.対象のIDを取得
// GETで取得するので、GETに書き換え
$id   = $_GET['id'];
$img_filename = $_GET['img_filename'];
$file_path = "images/" . $img_filename;
$redirect = "detail.php?id=".$id;

//2.DB接続します
require_once('funcs.php');
$pdo = db_conn();


//3.削除SQLを作成
$stmt = $pdo->prepare('UPDATE gs_ecproducts SET img_filename = NULL WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//4.画像ファイルの削除
// ファイルが存在し、書き込み可能であることを確認
if (file_exists($file_path) && is_writable($file_path)) {
    // ファイルを削除
    unlink($file_path);
} else {
    echo "The file does not exist or is not writable.";
}


//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location:'.$redirect);
    exit();
}
?>