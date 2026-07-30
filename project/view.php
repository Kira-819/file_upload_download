<?php

$file = basename($_GET["file"]);
$path = "uploads/" . $file;

if(!file_exists($path)){
    die("ファイルが存在しません");
}

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

switch($ext){
    case "pdf":
        header("Content-Type: application/pdf");
        break;

    case "jpg":
    case "jpeg":
        header("Content-Type: image/jpeg");
        break;

    case "png":
        header("Content-Type: image/png");
        break;

    case "gif":
        header("Content-Type: image/gif");
        break;

    case "txt":
        header("Content-Type: text/plain; charset=UTF-8");
        break;

    default:
        die("この形式のファイルはブラウザで表示できません");
}

readfile($path);
?>