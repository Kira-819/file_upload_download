<?php

$file = basename($_GET["file"]);
$path = "uploads/" . $file;

if(file_exists($path)){
    unlink($path);
    echo "ファイルを削除しました。<br>";
}else{
    echo "ファイルが存在しません。<br>";
}

echo "<a href='list.php'>ファイル一覧へ戻る</a>";

?>