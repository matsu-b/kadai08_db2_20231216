<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">商品一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="POST" action="insert.php" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>新規商品登録</legend>
                <label>商品名：<input type="text" name="product_name"></label><br>
                <img id="preview"><br>
                <label>商品画像：<input type="file" name="img" accept="image/*" onchange="previewFile(this);" /></label><br>
                <label>カテゴリ：</label>
                    <select id="category" name="category">
                        <option value=""></option>
                        <option value="ファッション">ファッション</option>
                        <option value="ベビー・キッズ">ベビー・キッズ</option>
                        <option value="インテリア・住まい・小物">インテリア・住まい・小物</option>
                        <option value="本・音楽・ゲーム">本・音楽・ゲーム</option>
                        <option value="おもちゃ・ホビー・グッズ">おもちゃ・ホビー・グッズ</option>
                        <option value="コスメ・香水・美容">コスメ・香水・美容</option>
                        <option value="家電・スマホ・カメラ">家電・スマホ・カメラ</option>
                        <option value="スポーツ・レジャー">スポーツ・レジャー</option>
                        <option value="フラワー・ガーデニング">フラワー・ガーデニング</option>
                        <option value="ハンドメイド">ハンドメイド</option>
                        <option value="チケット">チケット</option>
                        <option value="自動車・オートバイ">自動車・オートバイ</option>
                        <option value="食品">食品</option>
                        <option value="その他">その他</option>
                    </select><br>
                <label>商品説明：<textarea name="discription" rows="4" cols="40"></textarea></label><br>
                <label>金額：<input type="text" name="price"></label><br>
                <label>URL：<input type="text" name="url"></label><br>
                <input type="submit" value="登録">
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