<?php

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

// 1.select.phpから送られてくる対象のIDを取得
$id = $_GET['id'];

// 2.DB接続
require_once('funcs.php');
$pdo = db_conn();

//3．データ登録SQL作成
// WHERE id=:idを利用して、１つだけ情報を取得してください。
$stmt = $pdo->prepare('SELECT * FROM gs_ecproducts WHERE id=:id;');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$result = '';
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
}
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    
    <form method="POST" action="update.php" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>商品詳細</legend>
                <label>商品名：<input type="text" name="product_name" value="<?= $result['product_name'] ?>"></label><br>
                <img id="preview" src="images/<?= $result['img_filename'] ?>"><br>
                <a href="delete_photo.php?id=<?= $result['id'].'&img_filename='.$result['img_filename'] ?>" >[画像削除]</a><br>
                <label>商品画像：<input type="file" name="img" accept="image/*" onchange="previewFile(this);" /></label><br>
                <label>カテゴリ：
                    <select name="category">
                        <option value="ファッション" <?= $result['category'] == 'ファッション' ? 'selected' : '' ?>>ファッション</option>
                        <option value="ベビー・キッズ" <?= $result['category'] == 'ベビー・キッズ' ? 'selected' : '' ?>>ベビー・キッズ</option>
                        <option value="インテリア・住まい・小物" <?= $result['category'] == 'インテリア・住まい・小物' ? 'selected' : '' ?>>インテリア・住まい・小物</option>
                        <option value="本・音楽・ゲーム" <?= $result['category'] == '本・音楽・ゲーム' ? 'selected' : '' ?>>本・音楽・ゲーム</option>
                        <option value="おもちゃ・ホビー・グッズ" <?= $result['category'] == 'おもちゃ・ホビー・グッズ' ? 'selected' : '' ?>>おもちゃ・ホビー・グッズ</option>
                        <option value="コスメ・香水・美容" <?= $result['category'] == 'コスメ・香水・美容' ? 'selected' : '' ?>>コスメ・香水・美容</option>
                        <option value="家電・スマホ・カメラ" <?= $result['category'] == '家電・スマホ・カメラ' ? 'selected' : '' ?>>家電・スマホ・カメラ</option>
                        <option value="スポーツ・レジャー" <?= $result['category'] == 'スポーツ・レジャー' ? 'selected' : '' ?>>スポーツ・レジャー</option>
                        <option value="フラワー・ガーデニング" <?= $result['category'] == 'フラワー・ガーデニング' ? 'selected' : '' ?>>フラワー・ガーデニング</option>
                        <option value="ハンドメイド" <?= $result['category'] == 'ハンドメイド' ? 'selected' : '' ?>>ハンドメイド</option>
                        <option value="チケット" <?= $result['category'] == 'チケット' ? 'selected' : '' ?>>チケット</option>
                        <option value="自動車・オートバイ" <?= $result['category'] == '自動車・オートバイ' ? 'selected' : '' ?>>自動車・オートバイ</option>
                        <option value="食品" <?= $result['category'] == '食品' ? 'selected' : '' ?>>食品</option>
                        <option value="その他" <?= $result['category'] == 'その他' ? 'selected' : '' ?>>その他</option>
                    </select>
                </label><br>
                <label>商品説明：<textarea name="discription" rows="4" cols="40"><?= $result['discription'] ?></textarea></label><br>
                <label>金額：<input type="text" name="price" value="<?= $result['price'] ?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $result['url'] ?>"></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>"><br>
                <a href="delete_all.php?id=<?= $result['id'] ?>">[削除]</a><br>
                <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>
</body>
</html>

<script>
  function previewFile(event){
    var fileData = new FileReader(); //FileReaderオブジェクトを作成
    fileData.onload = (function() { //ファイル読み込み完了時のイベントハンドラ（ファイルの読み込みとはreadAsDataURLのこと）
       document.getElementById('preview').src = fileData.result; // 読み込んだ画像データでプレビュー画像を更新
    });
    fileData.readAsDataURL(event.files[0]); // 選択されたファイルをDataURLとして読み込む
  }
</script>