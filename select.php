<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_ecproducts;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<img src="' . 'images/' . $result['img_filename']. '" alt="' . $result['product_name'] . '">';
        $view .= '<p>';
        $view .= "{$result['product_name']}"; // 文字列は、ダブルクオーテーション利用すると変数展開可能
        $view .= '<br>';
        $view .= "{$result['category']}"; 
        $view .= '<br>';
        $view .= "{$result['discription']}"; 
        $view .= '<br>';
        $view .= "{$result['price']}"; 
        $view .= '<br>';
        $view .= '<a href=" '.$result['url'].' ">';
        $view .= 'url';
        $view .= '</a>';
        $view .= '<br>';
        $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        $view .= '[編集]';
        $view .= '</a>';
        $view .= '</br>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>商品一覧</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">商品登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
