<?php

$dir = "uploads/";
$files = scandir($dir);

echo "<h2>アップロード済みファイル</h2>";

foreach($files as $file){

    if($file=="." || $file==".." || str_ends_with($file,".title")){
        continue;
    }

    $titlefile = $dir.$file.".title";

    if(file_exists($titlefile)){
        $title = file_get_contents($titlefile);
    }

    echo "<b>{$title}</b> （{$file}） ";
    echo "<a href='view.php?file=$file'><br>表示</a> ";
    echo "<a href='download.php?file=$file'>ダウンロード</a> ";
    echo "<a href='delete.php?file=$file'>削除</a><br><br>";
}

echo "<br><a href='upload.html'><b>ファイルをアップロード</b></a>";

?>