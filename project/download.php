<?php

$file = basename($_GET["file"]);
$path = "uploads/" . $file;

if(file_exists($path)){

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . $file . "\"");
    header("Content-Length: " . filesize($path));

    readfile($path);
    exit;

}else{
    echo "ファイルが存在しません";
}

?>