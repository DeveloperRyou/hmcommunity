<?php
require_once("config.php");
 
// 업로드 DIALOG 에서 전송된 값
$funcNum = $_GET['CKEditorFuncNum'];
$CKEditor = $_GET['CKEditor'];
$langCode = $_GET['langCode'];

$tempfile = $_FILES['upload']['tmp_name'];
$filename = $_FILES['upload']['name'];

$type = substr($filename, strrpos($filename, ".")+1);
$found = false;
switch ($type) {
    case "jpg":
    case "jpeg":
    case "gif":
    case "png":
        $found = true;
}

if ($found != true) {
    exit;
}

// 저장 파일 이름: 년월일시분초_렌덤문자
// 20140327125959_abcdefghi.jpg

$filename = cke_replace_filename($filename);
$savefile = SAVE_DIR . '/' . $filename;
$save_url = SAVE_URL . '/' . $filename;

move_uploaded_file($tempfile, $savefile);
$imgsize = getimagesize($savefile);
$filesize = filesize($savefile);

if (!$imgsize) {
    $filesize = 0;
    $random_name = '-ERR';
    unlink($savefile);
};

try {
    if(defined('G5_FILE_PERMISSION')) chmod($savefile, G5_FILE_PERMISSION);
} catch (Exception $e) {

}

echo "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$save_url', '업로드완료');</script>";
?>