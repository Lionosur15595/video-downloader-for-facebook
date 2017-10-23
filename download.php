<?php 
session_start();

$source = $_SESSION['url'];

$rand = str_shuffle("128743875388568");

header("Content-Type: video/mp4");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=downloaded_by_lionosur_video_downloader_$rand.mp4"); 
echo readfile($source);

session_destroy();

echo "download has been completed";


?>