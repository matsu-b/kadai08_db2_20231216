<?php

//1. POSTデータ取得
$product_name   = $_POST['product_name'];
$category    = $_POST['category'];
$discription = $_POST['discription'];
$price = $_POST['price'];
$url = $_POST['url'];


// 画像ファイルの取得
$img_file  = $_FILES['img'];
$img_filename = basename($img_file['name']);
$tmp_path = $img_file['tmp_name'];
$upload_dir = 'images/';
$filetype = pathinfo($img_filename, PATHINFO_EXTENSION);

//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo = db_conn();

//３．画像のファイル保存＆DB登録
if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($tmp_path)) {
    $arrImageTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf','JPG','HEIF');
    // まずは画像をフォルダにアップする
    if (in_array($filetype, $arrImageTypes)) {
        $postImageForServer = move_uploaded_file($tmp_path, $upload_dir.$img_filename);
        } else {
            echo "File type not allowed.";
        }
        } else {
            echo "No file uploaded.";
        };

// 4. データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
        gs_ecproducts(
            product_name, img_filename, category, discription, price, url 
            )
        VALUES (
            :product_name, :img_filename, :category, :discription, :price, :url
            );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
$stmt->bindValue(':img_filename', $img_filename, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':discription', $discription, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//5．データ登録処理後
// if ($status === false) {
//     sql_error($stmt);
// } else {
//     redirect('index.php');
// }