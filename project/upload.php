<?php

$dir = "uploads/";

if(!file_exists($dir)){
    mkdir($dir);
}

$file = $_FILES["upfile"];
$title = $_POST["title"];

/* ファイル未選択チェック */
if($file["error"] == UPLOAD_ERR_NO_FILE){
    die("ファイルが選択されていません。<br>
    <a href='upload.html'>戻る</a>");
}

$filename = basename($file["name"]);
$savepath = $dir . $filename;
if(file_exists($savepath)){
    die("同じファイル名のファイルが既に存在します。<br>ファイル名を変更してください<br>
    <a href='upload.html'>戻る</a>");
}

if(move_uploaded_file($file["tmp_name"], $savepath)){
    $title = trim($_POST["title"]);
    if($title == ""){
        $title = "(題名なし)";
    }
    // 題名を保存
    file_put_contents($dir.$filename.".title", $title);

    echo "アップロード成功<br>";
    echo "<a href='list.php'>ファイル一覧へ</a>";

}else{
    echo "アップロード失敗";
}

?>