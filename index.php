<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    mb_internal_encoding("utf8");

    require "DB.php";
    $dbcoonect = new DB();
    
    $pdo = $dbcoonect->connect();
    $stmt = $pdo->prepare($dbcoonect->select());

    $stmt->execute();

    ?>


    <header>
        <img src="4eachblog_logo.jpg" class="logo">
        <div class="menu">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
            </ul>
        </div>
    </header>
    <main>
        <div class="main_conteiner">
            <div class="left">
                <h1 class="title">プログラミングに役立つ掲示板</h1>
                <div class="box">

                    <form method="post" action="insert.php">
                        <h2>入力フォーム</h2>
                        <div>
                            <label>ハンドルネーム</label>
                            <br>
                            <input type="text" class="text" size="35" name="handlname">
                        </div>
                        <div>
                            <label>タイトル</label>
                            <br>
                            <input type="text" class="text" size="35" name="title">
                        </div>
                        <div>
                            <label>コメント</label>
                            <br>
                            <textarea cols="35" rows="7" name="comments"></textarea>
                        </div>
                        <div>
                            <input type="submit" class="submit" value="送信する">
                        </div>
                    </form>
             
                        <?php
                        while ($row = $stmt->fetch()) {
                            echo "<div class='kiji'>";
                            echo "<h3>" . $row['title'] . "</h3>";
                            echo "<div class='contents'>";
                            echo $row['comments'];
                            echo "<div class='handlname'>posted by " . $row['handlname'] . "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>

                </div>



            </div>
            <div class="right">
                <p>人気の記事</p>
                <ul>
                    <li> PHPオススメ本</li>
                    <li> PHP Myadminの使い方</li>
                    <li> いま人気のエディエタTop5</li>
                    <li> HTMLの基礎</li>
                </ul>
                <p>オススメリンク</p>
                <ul>
                    <li> インターノウス株式会社</li>
                    <li> XAMPPのダウンロード</li>
                    <li> Eclipceのダウンロード</li>
                    <li> Braketsのダウンロード</li>
                </ul>
                <p>カテゴリ</p>
                <ul>
                    <li> HTML</li>
                    <li> PHP</li>
                    <li> MySQL</li>
                    <li> JavaScript</li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        copyright©internous|4each blod the which provides A to Z about programing.
    </footer>


</body>

</html>